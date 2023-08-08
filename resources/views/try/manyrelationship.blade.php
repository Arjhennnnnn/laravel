<x-layout>
    @auth
    <x-navbar/>
    
    @foreach ($posts as $post)
    <div class="row bg-primary bg-opacity-50 mt-2 w-50">
        <div class="col-2">
            {{-- <img src="/storage/{{ $post->thumbnail }}" alt="" style="height: 100px; width:100px;"> --}}
            <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" style="height: 100px; width:100px;">

        </div>
        <div class="col-10">
            <a href="/author/{{ $post->slug }}" class="h1 text-white text-decoration-none ms-2">Title : {{ $post->title }}</a>    
            <p class="text-white ms-2 mt-2 mb-2">Body : {{ $post->body }}</p>    
            <p class="text-white ms-2 fw-bold">Author : {{$post->author->name}}</p>
            <p class="text-white ms-2 fw-bold">Published : {{$post->created_at->diffForHumans()}}</p>
            <p class="text-white ms-2 fw-bold">Category : {{$post->category->name}}</p>
        </div>
        


    </div>

    <form action="/post/{{ $post->id }}" class="w-50 my-2 row" method="post">
        @csrf

        <div class="col-1">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="70px" alt="">
        </div>
            <div class="form-floating col-11">
                <textarea class="form-control" name="body" placeholder="Want to participate?" id="floatingTextarea2" style="height:100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>

            <div class="col-3 offset-9">
                @error('body')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="col-3 offset-9">
                <button type="submit" class="btn btn-primary w-100 mt-1">Comment</button>
            </div>
        


    </form>
    
           
    @foreach ($comments as $comment)
    
    @if($comment->post_id == $post->id)

        <x-comment :comment="$comment"/>
        @endif

    @endforeach



    

    @endforeach
    
    <div class="row my-2">
        {{ $posts->links()}}
    </div>

    @endauth

</x-layout>


