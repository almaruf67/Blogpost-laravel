@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-12">
            
                <div class="container px-4 px-lg-5">
                    <div><img src="images/Banner.jpg" alt="BD Team" id="pic"></div>
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                                          
                            @foreach($blogp as $item)
                            <div class="post-preview">
                                <a href="{{ route('post', $loop->iteration) }}" @style('text-decoration:none')>
                                <h2 class="post-title">{{ $item->Title }}</h2>
                                <div>
                                    <img style="width: 50%;" src="{{ asset( $item->Poster ) }}" alt="img ">
                                </div>
                                <h3 class="post-details">{{ $item->Description }}</h3>
                                </a>
                                <p class="post-meta">
                                    Posted by
                                    <a href="#!">{{ $item->Author }}</a>
                                    {{ $item->updated_at }}
                                </p>
                            </div>
                            <hr class="my-4" />
                            @endforeach
                            <div class="mx-auto pb-10 w-4/5"> 
                                {{ $blogp->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
           
        </div>
    </div>
</div>
@endsection
