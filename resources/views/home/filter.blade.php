

<form action="{{url('/search')}}" method="get">
    @csrf
    <input type="text" name="search">
    <input type="submit" value="Search" class="btn btn-success">
</form>


