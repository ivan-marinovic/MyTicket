<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MyTicket</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="home/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
@include('home.navigation')

    <h2 style="text-align: center;margin-top: 10px;">EVENT DETAILS</h2>
    <div class="row">
        <div class="col-sm-4" style="border: grey solid 1px">
            <!-- Product image-->
            <img class="card-img-top" src="event/{{$event->image}}" alt="">
        </div>
        <div class="col-sm-8" style="border: grey solid 1px">
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h4 class="fw-bolder">Title: {{$event->title}}</h4>
                    <!-- Product price-->
                    <h4 class="fw-bolder">Price: {{$event->price}}€</h4>
                    <h4 class="fw-bolder">Category: {{$event->category}}</h4>
                    <h4 class="fw-bolder">Quantity: {{$event->quantity}}</h4>
                    <h4 class="fw-bolder">Location: {{$event->location}}</h4>
                    <h4 class="fw-bolder">Date: {{$event->date}}</h4>
                    <h4 class="fw-bolder">Description: {{$event->description}}</h4>
                </div>
            </div>
            <!-- Product actions-->
            <div style="margin-top: 10px" class="text-center">
                <form action="{{url('add_cart',$event->id)}}" method="Post">
                    @csrf
                    <?php  $currentDate=date("Y-m-d"); ?>
                    @if($currentDate < $event->date)
                        <div>
                            <input type="number" name="quantity" value="1" min="1" max="{{$event->quantity}}" style="width: 60px;margin-bottom: 2px">
                        </div>
                        <div style="margin-bottom: 10px">
                            <input type="submit" value="Add to Cart" style="margin-top: 2px;margin-bottom: 10px">
                        </div>
                    @else
                        <label class="btn btn-danger" style="margin-bottom: 20px">Event is closed</label>
                    @endif
                </form>
            </div>
        </div>
    </div>




<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="home/js/scripts.js"></script>
</body>
</html>
