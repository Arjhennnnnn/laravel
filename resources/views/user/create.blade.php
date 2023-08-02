@include('partials.__header')
<div class="row mt-5">
    <div class="col-4 py-3 offset-4 bg-secondary rounded-2">
    <h1 class="text-white text-center mb-3">Create New Employee</h1>
    <form action="/store" method="post">
        @csrf
        <input type="text" class="form-control mt-2" name="firstname" placeholder="Firstname" value="{{old('firstname')}}">
        @error('firstname')
            <small class="ms-2">{{ $message }}</small>
        @enderror

        <input type="text" class="form-control mt-2" name="middlename" placeholder="Middlename" value="{{old('middlename')}}">
        @error('middlename')
            <small class="ms-2">{{ $message }}</small>
        @enderror

        <input type="text" class="form-control mt-2" name="lastname" placeholder="Lastname" value="{{old('lastname')}}">
        @error('lastname')
            <small class="ms-2">{{ $message }}</small>
        @enderror

        <input type="email" class="form-control mt-2" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        
        <input type="number" class="form-control mt-2" name="contactnumber" placeholder="Contact Number" value="{{old('contactnumber')}}">
        @error('contactnumber')
            <small class="ms-2">{{ $message }}</small>
        @enderror

        <button type="submit" class="btn btn-success w-100 mt-2">Add New</button>
    </form>

    
        <a href="/"><button type="button" class="btn btn-danger w-100 mt-2">Back</button></a>
 
    </div>
</div>

@include('partials.__footer')