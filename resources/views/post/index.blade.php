@extends('layouts.layout')

@section('title', 'Laravel Blog')

@section('content')

    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">
            <div class="blog-custom-build">
                @foreach($posts as $post)
                    <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('post.show', $post->slug) }}" title="">
                            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('post.show', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                        <p>{{ $post->description }}.</p>
<<<<<<< HEAD
                        <small><a href="{{ route('category.single', $post->category->slug) }}" title="">{{ $post->category->title }}</a></small>
=======
                        <small><a href="#" title="">{{ $post->category->title }}</a></small>
>>>>>>> 5b89d1de4c4da93af4aaa48441f9571b9a07fc20
                        <small>{{ $post->getPostDate() }}</small>
                        <small><i class="fa fa-eye"></i>{{ $post->views }}</small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
                @endforeach
                <hr class="invis">

            </div>
        </div>

        <hr class="invis">

        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    {{ $posts->links() }}
                    {{--<ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>--}}
                </nav>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->

@endsection
