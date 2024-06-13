@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Posts</h1>
            <div class="row">
                <section class="featured-posts-section col-12">
                    <div class="row">
                        @foreach ($posts as $post)
                            <x-post :post="$post" />
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-3">{{ $posts->links() }}</div>
                    </div>
                </section>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($randomPosts as $randomPost)
                            <x-random-posts :post="$randomPost" />
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Popular Posts</h5>
                        <ul class="post-list">
                            @foreach ($likedPosts as $likedPost)
                                <x-popular-posts :post="$likedPost" />
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" class="img-fluid"
                            alt="categories">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
