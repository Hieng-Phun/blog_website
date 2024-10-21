@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Post List</h3>
                <a class="btn btn-success" href="{{ route('create_post') }}" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                    </svg>
                </a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <table id="datatable" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Author</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>category</th>
                                <th>Tag</th>
                                <th style="width: 100px" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $post->user?->name }}</td>
                                    <td>
                                        <img src="{{ $post->Thumbnails }}" alt="thumbnail" width="80">
                                    </td>
                                    <td style="width: 300px">{{ $post->title }}</td>
                                    <td>{{ $post->categories->name }}</td>
                                    <td>
                                        <ul style="list-style-type: none;">
                                            @foreach ($post->Tags as $Tag)
                                                <li>{{ '* ' }}{{ $Tag->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="btn  btn-sm" href="{{ route('edit_post', $post->id) }}"
                                            role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
