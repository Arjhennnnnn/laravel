@include('partials.__header')
<x-alert>
    
</x-alert>
<x-navbar>
</x-navbar>

    <div class="row">
        <h1 class="text-center mt-2 fw-bold text-secondary">Supervisor List</h1>
    </div>

    <form action="/search" class="row mt-5" method="post">
        @csrf
        <div class="col-2 offset-2">
            <input type="text" class="form-control mt-2" placeholder="Search" name="search">
        </div>
        <div class="col-1">
            <button class="btn btn-primary mt-2" type="submit">Search</button>
        </div>
    </form>

    <div class="row">
        <div class="col-1 offset-9">
            <a href="/create"><button class="btn btn-primary  w-100" id="add_new">Add New</button></a>
        </div>
    </div>        
    </div>

    <div class="row mt-2">
        <div class="col-8 offset-2">
        <table class="table">
            <thead class="table-primary">
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>        
            @foreach($supervisors as $supervisor)
                <tr>
                <td>{{ $supervisor->name }}</td>
                <td>{{ $supervisor->email }}</td>


                <td>
                    <form action="/view/member/{{ $supervisor->id }}" method="post">
                    @csrf
                        <button type="submit" class="btn btn-success w-100">View</button>
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>  

    
</div>


@include('partials.__footer')