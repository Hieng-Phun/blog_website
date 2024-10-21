@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Create Post</h3>
                <a class="btn btn-success" href="{{ route('show_post') }}" role="button">Back</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ $post->title }}" />
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" " id="content" name="content" rows="5">{{ $post->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Choose Thumbnail</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail" />
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category_id" aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}"
                                        {{ $categories->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $categories->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tag</label>
                            <div class="tag-wrapper">
                                @foreach ($tag as $tags)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                            value="{{ $tags->id }}" id="tag{{ $tags->id }}"
                                            {{ in_array($tags->id, $post->Tags()->pluck('id')->toArray()) ? 'checked' : '' }} />
                                        <label class="form-check-label"
                                            for="tag{{ $tags->id }}">{{ $tags->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
