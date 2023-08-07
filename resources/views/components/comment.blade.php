@props(['comment'])
<article class="row w-50 bg-secondary bg-opacity-50 rounded-3 py-3">
    <div class="col-1 m-2">
        <img src="https://i.pravatar.cc/60?id={{ $comment->id }}" width="100px" alt="">
    </div>
    <div class="col-10">
        <div class="row">
            <h4>{{$comment->author->name}}</h4>
            <time>{{$comment->created_at->diffForHumans()}}</time>
            <small>Comment : {{$comment->body}}</small>
        </div>
    </div>
</article>