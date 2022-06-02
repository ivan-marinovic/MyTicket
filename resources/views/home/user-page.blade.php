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
    <link href="home/css/styles.css" rel="stylesheet" />
    <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
<!-- Navigation-->
@include('home.navigation')

<!-- Header-->
@include('home.header')

<!--search-->
@include('home.filter')

<!-- Section-->
@include('home.section')

<!-- Footer-->
@include('home.footer')


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="home/js/scripts.js"></script>
</body>
</html>
