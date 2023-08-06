

@include('partials.__header')
<x-alert>
    
</x-alert>

<div class="row mt-5">
    <div class="col-4 py-3 offset-4 bg-secondary rounded-2">
    <h1 class="text-white text-center mb-3"> {{ $title }} </h1>
    <p>Sign up account <a class="text-white" href="{{ url('register') }}">here</a></p>

    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
    </div>
</div>


@include('partials.__footer')