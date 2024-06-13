@props(['post'])

<div class="col-lg-4 col-md-6 mb-4 featured-post blog-post" data-aos="fade-up">
    <div class="blog-post-thumbnail-wrapper">
        <img src="{{ asset('storage/' . $post->preview_image) }}" class="img-fluid" alt="blog post">
    </div>
    <p class="blog-post-category">{{ $post->category->title }}</p>
    <a href="{{ route('main.post.show', $post) }}" class="blog-post-permalink">
        <h6 class="blog-post-title">{{ $post->title }}</h6>
    </a>
</div>
