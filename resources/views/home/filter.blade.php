

<div style="margin-top: 10px;margin-left: 5px">

    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="background-color: blue">
        Sort by:
    </button>
    <ul class="dropdown-menu">
        <li><a href="{{route('user-page.index',['sort' =>'asc'])}}">Price -Low to High</a></li>
        <li><a href="{{route('user-page.index',['sort'=>'desc'])}}">Price -High to Low</a></li>
        <li><a href="{{route('user-page.index',['sort'=>'new'])}}">Date closest</a></li>
        <li><a href="{{route('user-page.index',['sort'=>'old'])}}">Date farest</a></li>
        <li><a href="{{route('user-page.index',['sort'=>'abc'])}}">A-Z</a></li>
    </ul>


</div>

<span>
    {!!$event->withQueryString()->links('pagination::bootstrap-5')!!}
</span>





