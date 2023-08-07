{{-- @include('partials.__header') --}}
<x-layout>
    


<div class="row mt-5">
    <div class="col-4 py-3 offset-4 bg-secondary bg-opacity-25 rounded-2">
    <h1 class="text-white text-center mb-3"> {{ $title }} </h1>
    <p>Sign in account <a class="text-white" href="{{ url('userlogin') }}">here</a></p>


    <form action="/create_account" method="post">
        @csrf
        <input type="text" class="form-control mt-2" name="name" placeholder="Name" value="{{ old('name') }}">
        @error('name')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="email" class="form-control mt-2" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="password" class="form-control mt-2" name="password" placeholder="Password">
        @error('password')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="password" class="form-control mt-2" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
            <small class="ms-2">{{ $message }}</small>
        @enderror
    
        <button type="submit" class="btn btn-primary w-100 mt-2">Register</button>
    </form>
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
    </div>
</div>

</x-layout>
{{-- @include('partials.__footer') --}}