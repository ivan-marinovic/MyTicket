

<div style="margin-top: 10px;margin-left: 5px">

    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="background-color: blue">
        Category:
    </button>
    <ul class="dropdown-menu">
        @foreach($category as $categories)
        <li><a class="dropdown-item" href="">{{$categories->category_name}}</a></li>
        @endforeach
    </ul>


    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="background-color: blue">
        Sort by:
    </button>
    <ul class="dropdown-menu">
        <li><a href="{{route('user-page.index',['sort'=>'asc'])}}">Price -Low to High</a></li>
        <li><a href="{{route('user-page.index',['sort'=>'desc'])}}">Price -High to Low</a></li>
    </ul>
</div>




