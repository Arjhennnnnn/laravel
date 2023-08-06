<x-layout>
    @foreach ($posts as $post)
    <div class="row bg-primary bg-opacity-50 mt-2 w-50">
        <a href="/author/{{ $post->slug }}" class="h1 text-white text-decoration-none ms-2">Title : {{ $post->title }}</a>    
        
        <small class="text-white ms-2 mt-2 mb-2">Body : {{ $post->body }}</small>    
        <p class="text-white ms-2 fw-bold">Author : {{$post->author->name}}</p>
        <p class="text-white ms-2 fw-bold">Published : {{$post->created_at->diffForHumans()}}</p>
        <p class="text-white ms-2 fw-bold">Category : {{$post->category->name}}</p>
    </div>
    @endforeach
</x-layout>