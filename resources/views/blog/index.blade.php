@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Blog Title *</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="poster" class="form-label">Poster *</label>
                    <input type="file" class="form-control" name="poster" id="poster" required>
                </div>

                <div class="mb-3">
                    <label for="des" class="form-label">Blog Description *</label>
                    <textarea name="des" id="des" cols="30" class="form-control" rows="5" aria-describedby="emailHelp" required autofocus></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
