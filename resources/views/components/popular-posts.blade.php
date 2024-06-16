@props(['post'])

<li class="post">
    <a href="{{ route('main.post.show', $post) }}" class="post-permalink d-flex align-items-center">
        <img src="{{ asset('storage/' . $post->preview_image) }}" class="img-fluid me-3" alt="blog post">
        <div>
            <h6 class="post-title">{{ $post->title }}</h6>
            <div>
                <span>{{ $post->liked_users_count }}</span>
                <i class="far fa-heart"></i>
            </div>
        </div>
    </a>
</li>
