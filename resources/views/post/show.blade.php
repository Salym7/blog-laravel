@extends('layouts.main')

@section('content')


{{-- <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
    <div class="blog-post-thumbnail-wrapper">
        <img src="{{Storage::url($post->main_image)}}" alt="blog post">
    </div>
    <p class="blog-post-category">{{$post->category->title}}</p>
    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
        <h6 class="blog-post-title">{{$post->title}}</h6>
    </a>
</div> --}}

<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date}} •Featured • {{$post->comments->count()}} Comments</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center">
            <img src="{{Storage::url($post->main_image)}}" alt="featured image" class="w-50">
        </div>
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="py-3">
                    @auth
                        <form action="{{route('post.like.store',$post->id)}}" method="POST">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                
                            </button>
                        </form>
                        @endauth
                        @guest
                            <div>
                                <span>{{$post->liked_users_count}}</span>
                                <i class="far fa-heart"></i>
                            </div>
                        @endguest
                </section>
                @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{Storage::url($relatedPost->main_image)}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relatedPost->category->title}}t</p>
                                <a href="{{route('post.show',$relatedPost->id)}}"><h5 class="post-title">{{$relatedPost->title}}</h5></a>
                            </div> 
                            @endforeach
                        </div>
                    </section>
                @endif
                <section class="comment-list mb-5">
                    <h3 class="section-title mb-5">Comments ({{$post->comments->count()}})</h3>
                    @foreach ($post->comments as $comment)
                    <div class="comment-text mb-2">
                        <div class="username">
                            {{$comment->user->name}}
                        <span class="text-muted float-right">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        {{$comment->message}}
                    </div>
                    @endforeach
                </section>
                @auth
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    <form action="{{route('post.comment.store' , $post->id)}}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="form-group col-12" data-aos="fade-up">
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Message" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Add message" class="btn btn-warning">
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
