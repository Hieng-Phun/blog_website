@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
            <h3>Create Tag</h3>
            <a class="btn btn-danger" href="{{ route('show_tag') }}" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path
                        d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8z" />
                </svg>
            </a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
            <div class="card p-3">
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
