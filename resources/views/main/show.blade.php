@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('d F Y • H:i:s') }} • {{ $post->comments->count() }}
                {{ $post->comments->count() > 1 ? ' Comments' : ' Comment' }}
            </p>
            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="img-fluid"
                    style="height: 700px; width: 1200px; object-fit: cover;">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if ($post->comments->count() > 0)
                        <section class="card-comments">
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{ $post->comments->count() }})</h2>
                            @foreach ($post->comments as $comment)
                                <x-post.comment.comment :comment="$comment" />
                            @endforeach
                        </section>
                        <section>
                            @auth
                                <form action="{{ route('main.post.like.store', $post) }}" method="post">
                                    @csrf
                                    <span>{{ $post->liked_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i
                                            class="fa{{ Auth::user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <div>
                                    <span>{{ $post->liked_users_count }}</span>
                                    <i class="far fa-heart"></i>
                                </div>
                            @endguest
                        </section>
                        @if ($relatedPosts->count() > 0)
                            <section class="related-posts">
                                <h2 class="section-title mb-4 text-center" data-aos="fade-up">Related Posts</h2>
                                <div class="row">
                                    @foreach ($relatedPosts as $relatedPost)
                                        <x-related-posts :post="$relatedPost" />
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    @endif
                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{ route('main.post.comment.store', $post) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
