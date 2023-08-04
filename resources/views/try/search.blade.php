<x-layout>
    <form action="/search/request" method="get">
        @csrf
        <div class="row">
            <div class="col-2 offset-2">
                <input type="text" class="form-control mt-2" placeholder="Search" name="search">
            </div>
            <div class="col-1">
                <button class="btn btn-primary mt-2">Seearch</button>
            </div>
        </div>
    </form>

    <form action="/category/request" method="get">
        @csrf
        <div class="row">
            <div class="col-2 offset-2">
                <input type="text" class="form-control mt-2" placeholder="Category" name="category">
            </div>
            <div class="col-1">
                <button class="btn btn-primary mt-2">Category</button>
            </div>
        </div>
    </form>
</x-layout>
