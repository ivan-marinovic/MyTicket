
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Ticket</title>
</head>
<body>
<div class="container mt-3">
    <h2 style="text-align: center;font-size: 22px;margin-bottom: 7px">cut out your tickets for use</h2>
        @foreach($ticket as $ticket)
    @for ($i = 0; $i < $ticket->quantity; $i++)
            <div style="border: black 2px solid;margin-bottom: 10px;width: 70%">
                <h3>Event title: {{$ticket->event_title}}</h3>
                <h4>Location: {{$ticket->location}}</h4>
                <h4>Location: {{$ticket->date}}</h4>
                <h4>Price: {{$ticket->price}}€</h4>
                <h4>*by MyTicket*</h4>
            </div>
        @endfor
        @endforeach
    </div>
</body>
</html>
