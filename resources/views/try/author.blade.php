<x-layout>
    {{-- <div class="row bg-primary bg-opacity-50 mt-2 w-50">
        <a href="/" class="h1 text-white text-decoration-none ms-2">Author : {{ $author }}</a>    
        
        <small class="text-white ms-2 mt-2 mb-2">Body : Body</small>    
        <p class="text-white ms-2 fw-bold">Author : Author</p>
        <p class="text-white ms-2 fw-bold">Category : Category</p> --}}
        <?= $author; ?>
        <a href="/view/post/user" class="ms-2 text-white">Go back</a>
    </div>
</x-layout>