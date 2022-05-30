<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 30px;
        }
        .font_size{
            font-size: 30px;
            padding-bottom: 30px;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }

        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 10px;
        }
    </style>

</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
@include('admin.header')
<!-- page-body-wrapper ends -->

    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="div_center">
                <h1 class="font_size">Add Event</h1>

                <form action="{{url('/add_event')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                <label>Event Title:</label>
                <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                </div>
                <div class="div_design">
                    <label>Event Description :</label>
                    <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                </div>
                <div class="div_design">
                    <label>Event Image:</label>
                    <input class="text_color" type="file" name="image" required="">
                </div>
                <div class="div_design">
                    <label>Event Category:</label>
                    <select class="text_color" name="category" required="">
                        <option value="" selected="">Add Category</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="div_design">
                    <label>Event Quantity:</label>
                    <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="">
                </div>
                <div class="div_design">
                    <label>Event Price:</label>
                    <input class="text_color" type="number" min="1" name="price" placeholder="Write a price" required="">
                </div>
                <div class="div_design">
                    <label>Event Location:</label>
                    <input class="text_color" type="text" name="location" placeholder="Write a location" required="">
                </div>
                <div class="div_design">
                    <label>Event Date:</label>
                    <input class="text_color" type="date"  name="date" placeholder="Write a date" required="" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="div_design">
                    <input type="submit" value="Add Event" class="btn btn-primary">
                </div>
                </form>


            </div>
        </div>
    </div>

<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
