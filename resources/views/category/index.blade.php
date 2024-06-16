@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="featured-posts-section col-12">
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('main.category.post.show', $category) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>
    </main>
@endsection
