<x-layout>
    <div class="row">
        <div class="col-4 offset-4 bg-opacity-50">
            {{-- <form action="/newsletter/controller" method="post"> --}}
            <form action="/newsletter" method="post">

                
                @csrf
                <input type="email" class="form-control mt-2 d-flex" name="email" placeholder="Newletter">
                    @error('email')
                    <small class="ms-2">{{ $message }}</small>
                    @enderror
                <div class="row">
                    <div class="col-2 offset-10">
                        <button class="btn btn-primary justify-content-end mt-2 me-1">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
