@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-12">
            <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="text-center">
                        <img class="img-fluid rounded" src="{{ asset( $bd->Poster ) }}" alt="img ">
                    </div>
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            
                        <h2 class="post-title mt-5" >{{ $bd->Title }}</h2>
                        <sub class="post-meta">
                            Posted by
                            <a href="#!">{{ $bd->Author }}</a>
                            on {{ $bd->updated_at }}
                        </sub>
                        
                        <p class="text-justify">{{ $bd->Description }}</p>


                         @guest
        @else
        <div class="row mb-5 mt-5">
            <div class="col-10">
               
                <form action=" {{ route('comment.store') }}" method="post">
                    @csrf
                   <input type="hidden" name="post_id" value="{{$bd->id}}" class=".d-none">
                    
                    <div class="mb-3">
                        <label for="com" class="form-label"><H2>Comments</H2></label>
                        <textarea name="com" id="com" cols="30" class="form-control" rows="5" aria-describedby="emailHelp" autofocus></textarea>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        @endguest
        
        @foreach($comments as $item)
        <div class="post-preview">
            
            <h3 class="post-title">{{ $item->User }}</h3>
            <sub class="post-meta">
                Commented on {{ $item->updated_at }}
            </sub>
            <p class="post-details">{{ $item->Comment }}</p>
            
        </div>
        
        @endforeach
                        
                        </div>
                    </div>
                </div>

            </article>
             
        
</div>
@endsection
