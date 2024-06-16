@props(['post'])

<div class="col-lg-4 col-md-6 mb-4 featured-post blog-post" data-aos="fade-up">
    <div class="blog-post-thumbnail-wrapper">
        <img src="{{ asset('storage/' . $post->preview_image) }}" class="img-fluid" alt="blog post">
    </div>
    <div class="d-flex justify-content-between">
        <p class="blog-post-category">{{ $post->category->title }}</p>
        @auth
            <form action="{{ route('main.post.like.store', $post) }}" method="post">
                @csrf
                <span>{{ $post->liked_users_count }}</span>
                <button type="submit" class="border-0 bg-transparent">
                    <i class="fa{{ Auth::user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                </button>
            </form>
        @endauth
        @guest
            <div>
                <span>{{ $post->liked_users_count }}</span>
                <i class="far fa-heart"></i>
            </div>
        @endguest
    </div>
    <a href="{{ route('main.post.show', $post) }}" class="blog-post-permalink">
        <h6 class="blog-post-title">{{ $post->title }}</h6>
    </a>
</div>
