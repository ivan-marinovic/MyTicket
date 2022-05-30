<!DOCTYPE html>
<html lang="en">
<head>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="home/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
@include('home.navigation')


<div class="container mt-3">
    <h1 style="text-align: center;font-size: 22px;margin-bottom: 7px">YOUR CART</h1>
    <table class="table">
        <tr style="background-color: skyblue">
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php $totalPrice=0; ?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->event_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}}€</td>
            <td><a class="btn btn-primary" href="{{url('remove_cart',$cart->id)}}">Remove</a></td>
        </tr>
        <?php $totalPrice=$totalPrice + $cart->price * $cart->quantity ?>
        @endforeach
    </table>
    <div style="text-align: center">
        <h1 style="margin-top: 15px;margin-bottom: 5px">Total price: {{$totalPrice}}€ </h1>
        @if($totalPrice >= 1)
            <a  href="{{url('stripe',$totalPrice)}}" class="btn btn-success" style="margin-top: 15px;margin-bottom: 20px">Pay Using Card</a>
        @endif
    </div>
</div>




<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="home/js/scripts.js"></script>
</body>
</html>
