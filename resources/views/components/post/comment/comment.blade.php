@props(['comment'])

<div class="card-comment mb-3">
    <div class="comment-text">
        <span class="username">
            <b>{{ $comment->user->name }}</b>
            <span class="text-muted float-right">{{ $comment->date_as_carbon->diffForHumans() }}</span>
        </span>
        <p>
            {{ $comment->message }}
        </p>
    </div>
</div>
