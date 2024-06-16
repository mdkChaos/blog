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
        </div>
    </main>
@endsection
