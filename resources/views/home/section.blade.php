<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach($event as $events)

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="event/{{$events->image}}" alt="">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$events->title}}</h5>
                            <!-- Product price-->
                            <h6>{{$events->price}} €</h6>
                            <h6>{{$events->location}}</h6>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div style="margin-top: 10px" class="text-center">
                            <form action="{{url('add_cart',$events->id)}}" method="Post">
                                @csrf
                                <?php  $currentDate=date("Y-m-d"); ?>
                                @if($currentDate < $events->date)
                                <div>
                                    <input type="number" name="quantity" value="1" min="1" style="width: 60px;margin-bottom: 2px">
                                </div>
                                <div style="margin-bottom: 10px">
                                    <input type="submit" value="Add to Cart" style="margin-top: 2px;margin-bottom: 10px">
                                </div>
                                @else
                                    <label class="btn btn-danger" style="margin-bottom: 20px">EXPIRED EVENT</label>
                                @endif
                            </form>
                        </div>
                        <div style="margin-top: 5px" class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('event_details',$events->id)}}">View details</a></div>
                    </div>
                </div>
            </div>

            @endforeach
            <span>
            {!!$event->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>


        </div>
    </div>
</section>
