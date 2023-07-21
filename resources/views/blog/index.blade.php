@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-10">
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
                    <input type="file" class="form-control" id="poster" name="poster" required>
                                       
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


@section('scripts')
{{-- <script>
    ClassicEditor
        .create( document.querySelector( '#des' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha512-OF6VwfoBrM/wE3gt0I/lTh1ElROdq3etwAquhEm2YI45Um4ird+0ZFX1IwuBDBRufdXBuYoBb0mqXrmUA2VnOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('des',{height:360,})
    });
</script>

@endsection
@endsection
