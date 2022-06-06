<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: 20%;
            border: 2px solid white;
            text-align: center;
            margin-top: 30px;

        }
        .font_size{
            text-align: center;
            font-size: 30px;
            padding-top: 15px;
        }
        .img_size{
            width: 150px;
            height: 150px;
        }
        .th_color{
            background-color: skyblue;
        }
        .th_deg{
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container-scroller">


@include('admin.sidebar')

@include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                @endif

            <h2 class="font_size">All Events</h2>
        <div class="table-responsive">
            <table class="center">
                <tr class="th_color">
                    <th class="th_deg">Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Category</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Location</th>
                    <th class="th_deg">Date</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Update</th>
                </tr>

                @foreach($event as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->category}}</td>
                    <td>{{$event->quantity}}</td>
                    <td>{{$event->price}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->date}}</td>
                    <td>
                        <img class="img_size" src="/event/{{$event->image}}">
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this')" href="{{url('delete_event',$event->id)}}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_event',$event->id)}}">Update</a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>

        </div>
    </div>

<!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
</body>
</html>
