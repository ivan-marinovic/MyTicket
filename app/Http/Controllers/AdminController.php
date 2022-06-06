<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $data=category::all();
                return view('admin.category',compact('data'));
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function add_category(Request $request)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $data = new category;
                $data->category_name=$request->category;
                $data->save();

                return redirect()->back()->with('message','Category Added Successfully');
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function delete_category($id)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $data = category::find($id);
                $data->delete();
                return redirect()->back()->with('message','Category Deleted Successfully');
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function view_event()
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $category = category::all();
                return view('admin.event',compact('category'));
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function add_event(Request $request)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $event = new event;
                $event->title=$request->title;
                $event->description=$request->description;
                $event->category=$request->category;
                $event->quantity=$request->quantity;
                $event->price=$request->price;
                $event->location=$request->location;
                $event->date=$request->date;

                $image=$request->image;
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('event',$imagename);
                $event->image=$imagename;

                $event->save();
                return redirect()->back()->with('message','Product added Successfully');
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function show_event()
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $event = event::all();
                return view('admin.show_event', compact('event'));
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }
    }

    public function delete_event($id)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $event = event::find($id);
                $event->delete();
                return redirect()->back()->with('message','Product Deleted Successfully');
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function update_event($id)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $event = event::find($id);
                $category = category::all();
                return view('admin.update_event',compact('event','category'));
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }

    }

    public function update_event_confirm(Request $request, $id)
    {
        if(Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 1) {
                $event = event::find($id);

                $event->title=$request->title;
                $event->description=$request->description;
                $event->category=$request->category;
                $event->quantity=$request->quantity;
                $event->price=$request->price;
                $event->location=$request->location;
                $event->date=$request->date;


                $image=$request->image;


                if($image)
                {
                    $imagename = time().'.'.$image->getClientOriginalExtension();
                    $request->image->move('event',$imagename);
                    $event->image=$imagename;
                }


                $event->save();

                return redirect()->back()->with('message','Event Updated Successfully');
            } else{
                return abort(403);
            }
        }
        else{
            return abort(403);
        }


    }

}
