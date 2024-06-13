@props(['post'])

<li class="post">
    <a href="#!" class="post-permalink d-flex align-items-center">
        <img src="{{ asset('storage/' . $post->preview_image) }}" class="img-fluid me-3" alt="blog post">
        <div>
            <h6 class="post-title">{{ $post->title }}</h6>
        </div>
    </a>
</li>
