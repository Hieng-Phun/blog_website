@extends('layouts.app')
@push('style')
    <style>
        .img {
            height: 40vh;
            width: 55%;
        }

        .img_con {
            margin: auto;
            text-align: center;
            width: 100%;
        }

        .con {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .textcon {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="col-lg-4">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a class="img_con" href="{{ route('article', ['id' => $post->id]) }}"><img
                                        class="card-img-top img" src="{{ $post->Thumbnails }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at->format('F d ,Y') }}</div>
                                    <h2 class="card-title h4 textcon">{{ $post->title }}</h2>
                                    <p class="card-text con">
                                        {{ $post->content }}
                                    </p>
                                    <a class="btn btn-primary" href="{{ route('article', ['id' => $post->id]) }}">
                                        Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5 class="text-center ">Post Not Found...!</h5>
                @endif

            </div>
            <!-- Pagination-->
            {{ $posts->links() }}
        </div>
    </div>
@endsection
