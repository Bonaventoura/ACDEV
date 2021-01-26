@extends('frontend.layouts.front')

@section('titre')
    {{$post->title}}
@endsection

@section('page')
    Actualités
@endsection
@section('content')
<section class="ftco-section">
    <div class="container">
      <div class="row">

            <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">

                <h2 class="mb-3 text-center">{{$post->title}}</h2>
                <center>
                    <img src="/storage/posts/{{$post->image}}" alt="" width="855" height="405" class="img-fluid">
                </center>

                <p>
                    {{$post->body}}
                </p>

                @if ($post->lien_video !== "")
                <div class="col-lg-12">
                    <iframe width="653" height="480" src="https://www.youtube.com/embed/{{$post->lien_video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif


                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">{{$post->category->name}}</a>
                    </div>
                </div>

            </div> <!-- .col-md-8 -->

            <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" placeholder="Recherchez une actualité">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="heading-sidebar">Catégories</h3>
                    <ul class="categories">
                        @foreach ($categories as $category)
                            <li><a href="#">{{$category->name}} <span>({{$category->posts->count()}})</span></a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="heading-sidebar">Actualités récentes</h3>
                    @foreach ($last_post as $post)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(/storage/posts/{{$post->image}});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">{{str_limit($post->title,20)}}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
  </div>
  </section>
@endsection
