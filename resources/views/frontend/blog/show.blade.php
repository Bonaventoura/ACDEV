@extends('frontend.layouts.front')
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
                
                <div class="pt-5 mt-5">
                    <h3 class="mb-5 font-weight-bold">6 Comments</h3>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                            <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">September 06, 2020 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>
                    </ul>
                    <!-- END comment-list -->
                    
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5 font-weight-bold">Envoyez un commentaire</h3>

                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>
            
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
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
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{asset('images/image_1.jpg')}});"></a>
                        <div class="text">
                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span> Sept. 06, 2020</a></div>
                            <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
  </div>
  </section>
@endsection