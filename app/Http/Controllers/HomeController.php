<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Event;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Category;

use Illuminate\Support\Facades\DB;
use mysql_xdevapi\TableUpdate;
use Session;

use Stripe;





class HomeController extends Controller
{

    public function index()
    {
       $event = Event::paginate(4);
       $category=Category::all();
       $data=Event::all();

        if (request()->sort=='asc')
        {
            $data=Event::orderBy('price','ASC')->get();
        }

        if (request()->sort=='desc')
        {
            $data=Event::orderBy('price','DESC')->get();
        }


        return view('home.user-page',compact('event','category','data'));
    }



    public function redirect()
    {

        $usertype = Auth::user()->usertype;

        if ($usertype=='1')
        {
            return view('admin.home');
        }
        else {
            $event = Event::paginate(4);
            $category = Category::all();
            return view('home.user-page',compact('event','category'));
        }
    }
    public function event_details($id)
    {
        $event=event::find($id);
        return view('home.event_details',compact('event'));
    }
    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $event = event::find($id);
            $cart = new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->user_id=$user->id;
            $cart->event_title=$event->title;
            $cart->price=$event->price;
            $cart->date=$event->date;
            $cart->location=$event->location;
            $cart->event_id=$event->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function about()
    {
        return view('home.about');
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function stripe($totalPrice)
    {
        return view('home.stripe',compact('totalPrice'));
    }

    public function stripePost(Request $request,$totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);

        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach ($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->user_id=$data->user_id;
            $order->price=$data->price;
            $order->location=$data->location;
            $order->date=$data->date;
            $order->quantity=$data->quantity;
            $order->event_title=$data->event_title;
            $order->event_id=$data->event_id;
            $order->payment_status='paid';
            $order->save();




            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


        }

        Session::flash('success', 'Payment successful!');

        return back();


    }



}
