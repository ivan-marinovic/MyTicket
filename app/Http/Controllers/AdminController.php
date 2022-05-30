<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;


class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name=$request->category;
        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    public function view_event()
    {
        $category = category::all();
        return view('admin.event',compact('category'));
    }

    public function add_event(Request $request)
    {
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
    }

    public function show_event()
    {
        $event = event::all();
        return view('admin.show_event',compact('event'));
    }

    public function delete_event($id)
    {
        $event = event::find($id);
        $event->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_event($id)
    {
        $event = event::find($id);
        $category = category::all();
        return view('admin.update_event',compact('event','category'));
    }

    public function update_event_confirm(Request $request, $id)
    {
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

    }

}
