

<div style="margin-top: 10px;margin-left: 5px">


    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="background-color: blue">
        Sort by:
    </button>
    <ul class="dropdown-menu">
        <li><a style="text-decoration: none;background-color: whitesmoke;color: black" href="{{route('user-page.sorting',['sort' =>'low-to-high'])}}">Price -Low to High</a></li>
        <li><a style="text-decoration: none;background-color: whitesmoke;color: black" href="{{route('user-page.sorting',['sort'=>'high-to-low'])}}">Price -High to Low</a></li>
        <li><a style="text-decoration: none;background-color: whitesmoke;color: black" href="{{route('user-page.sorting',['sort'=>'new'])}}">Date nearest</a></li>
        <li><a style="text-decoration: none;background-color: whitesmoke;color: black" href="{{route('user-page.sorting',['sort'=>'old'])}}">Date farthest</a></li>
        <li><a style="text-decoration: none;background-color: whitesmoke;color: black" href="{{route('user-page.sorting',['sort'=>'abc'])}}">A-Z</a></li>
    </ul>


</div>








