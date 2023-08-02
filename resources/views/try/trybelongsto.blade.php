@include('partials.__header')

<x-alert>
    
</x-alert>


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
                <th>Contact Number</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{ $employees->name }}</td>
                <td>{{ $employees->email }}</td>
                <td>{{ $employees->contactnumber }}</td>
                <td>
                    <form action="/edit/{{ $employees->id }}" method="post">
                    @csrf
                        <button type="submit" class="btn btn-success w-100">View</button>
                    </form>
                </td>

                </tr>
            </tbody>
        </table>

    </div>  

    
</div>


@include('partials.__footer')