@extends('layouts.app')

@push('style')
    <style>
        .thub {
            height: 80vh;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">
                        Posted on {{ $post->created_at->format('F d, Y') }} by {{ $post->user?->name }}
                    </div>
                    <!-- Post categories-->
                    @foreach ($post->Tags as $tag)
                        <a class="badge bg-secondary text-decoration-none link-light"
                            href="{{ url()->previous() }}">{{ $tag->name }}</a>
                    @endforeach
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4 text-center">
                    <img class="img-fluid rounded thub" src="{{ $post->Thumbnails }}" alt="photo" />
                </figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">
                        {{ $post->content }}
                    </p>
                    {{-- <h2 class="fw-bolder mb-4 mt-5">
                        I have odd cosmic thoughts every day
                    </h2>
                     --}}
                    <a class="btn btn-danger px-4 float-end mt-3 mb-5" href="{{ url()->previous() }}"
                        role="button">Back</a>
                </section>

            </article>
        </div>
    </div>
@endsection
