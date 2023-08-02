@include('partials.__header')
<x-alert>
    
</x-alert>

<div class="row mt-5">
    <div class="col-4 py-3 offset-4 bg-secondary rounded-2">
    <h1 class="text-white text-center mb-3"> {{ $title }} </h1>
    <p>Sign up account <a class="text-white" href="{{ url('register') }}">here</a></p>

    <form action="/login/process" method="post">
        @csrf
        <input type="email" class="form-control mt-2" name="email" placeholder="Email">
        @error('email')
            <small class="ms-2">{{ $message }}</small>
        @enderror
        <input type="password" class="form-control mt-2" name="password" placeholder="Password">
        @error('password')
            <small class="ms-2">{{ $message }}</small>
        @enderror
    
        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
    </form>
    </div>
</div>


@include('partials.__footer')