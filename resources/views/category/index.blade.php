@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Category</h1>
        <section class="featured-posts-section mb-5">
            <ul class="d-flex justify-content-between">
                @foreach ($categories as $category)
                    <li><a href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a></li>
                @endforeach
            </ul>
        </section>
    </div>
</main>
@endsection
