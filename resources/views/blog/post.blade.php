@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Post Details</h4>
                  <h2>Single blog post</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      <!-- Banner Ends Here -->
   
  
      <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="{{ asset( $bd->Poster ) }}" alt="">
                      </div>
                      <div class="down-content">
                        <span>Ice Cream</span>
                        <a href="#"><h4>{{ $bd->Title }}</h4></a>
                        <ul class="post-info">
                          <li><a href="#">{{ $bd->Author }}</a></li>
                          <li><a href="#">{{ $bd->updated_at }}</a></li>
                          <li><a href="#">10 Comments</a></li>
                        </ul>
                        <p>{!! $bd->Description !!}</p>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                <li><a href="#">Best Templates</a>,</li>
                                <li><a href="#">TemplateMo</a></li>
                              </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item comments">
                      <div class="sidebar-heading">
                        <h2>4 comments</h2>
                      </div>
                      <div class="content">
                        <ul>
                        @foreach($comments as $item)
                          <li>
                            <div class="author-thumb">
                              <img src="{{ asset('assets/images/comment-author-01.jpg') }}" alt="">
                            </div>
                            <div class="right-content">
                              <h4>{{ $item->User }}<span>{{ $item->updated_at }}</span></h4>
                              <p>{{ $item->Comment }}</p>
                            </div>
                          </li>
                          @endforeach
                          
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item submit-comment">
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <form id="comment" action=" {{ route('comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$bd->id}}" class=".d-none">
                          <div class="row">
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="com" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @include('layouts.side')
  @endsection
