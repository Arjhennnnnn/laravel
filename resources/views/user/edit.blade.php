@include('partials.__header')
<x-alert>
    
</x-alert>

<div class="row mt-5">
    <div class="col-4 py-3 offset-4 bg-secondary rounded-2">
    <h1 class="text-white text-center mb-3">Update <span class="text-dark">{{ $edit->firstname }} {{ $edit->lastname }}</span> Details</h1>


    <form action="/update/{{$edit->id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" class="form-control mt-2" name="firstname" placeholder="Firstname" value="{{ $edit->firstname }}">
        @error('firstname')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="text" class="form-control mt-2" name="middlename" placeholder="Middlename" value="{{ $edit->middlename }}">
        @error('middlename')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="text" class="form-control mt-2" name="lastname" placeholder="Lastname" value="{{ $edit->lastname }} ">
        @error('lastname')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="email" class="form-control mt-2" name="email" placeholder="Email" value="{{ $edit->email }}">
        @error('email')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="text" class="form-control mt-2" name="contactnumber" placeholder="Contact Number" value="{{ $edit->contactnumber }}">
        @error('contactnumber')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <button type="submit" class="btn btn-primary w-100 mt-2">Update</button>

    </form>
    <form action="/delete/{{$edit->id}}" method="post">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger w-100 mt-2">Delete</button>
        </form>

    <a href="/"><button type="button" class="btn btn-light w-100 mt-2">Back</button></a>
    
    </div>
</div>


@include('partials.__footer')