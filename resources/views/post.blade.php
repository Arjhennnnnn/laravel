@foreach ($posts as $post)
    <article class="row">
        <a href="/posts/{{ $post->slug }}" class="text-center mt-2 fw-bold text-secondary">{!! $post->title !!}</a>
        <h1>{{ $post->category->name }}</h1>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->slug }}</a>        
    </article>
    <br>
    <br>

@endforeach
