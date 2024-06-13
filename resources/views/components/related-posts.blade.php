@props(['post'])

<div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="related post" class="post-thumbnail">
    <p class="post-category">{{ $post->category->title }}</p>
    <a href="{{ route('main.post.show', $post) }}" class="blog-post-permalink">
        <h5 class="post-title">{{ $post->title }}</h5>
    </a>
</div>
