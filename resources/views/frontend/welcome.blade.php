@extends('frontend.layouts.front')

@section('content')
{{--<section class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-lg-6 ftco-animate">
                <div class="mt-5">
                    <h1 class="mb-4">We Build <br>Great Projects</h1>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                    <p><a href="#" class="btn btn-primary">Our Services</a> <a href="#" class="btn btn-white" data-toggle="modal" data-target="#exampleModalCenter">Request A Quote</a></p>
                </div>
            </div>
        </div>
    </div>
</section>--}}

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
    <div class="container">
        <div class="row no-gutters d-flex">
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Missions</h3>
                        <p>

                            L’association ACDev s’engage à contribuer au développement social, économique et culturel des communautés les plus démunies.</p>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2 d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-worker-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Domaines</h3>
                        <p>

                               <li>Eau et Assainissement</li>
                               <li>Education et Formation</li>
                               <li>Agriculture et Elevage</li>
                               <li>Santé</li>


                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Dedicated To Our Clients</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading">Blog</span>
                <h2 class="mb-4">Les dernières actualités</h2>
            </div>
        </div>
        <div class="row d-flex">

            @foreach ($posts as $post)
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="{{ route('blog.single', ['slug'=>$post->slug]) }}" class="block-20" style="background-image: url('/storage/posts/{{$post->image}}');">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>{{$post->created_at->format(' d, m,  Y')}}</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
                        <p><a href="{{ route('blog.single', ['slug'=>$post->slug]) }}" class="btn btn-secondary py-2 px-3">Plus de détail</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
    <div class="img image-overlay" style="background-image: url(images/about-3.jpg);"></div>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 py-5 bg-secondary aside-stretch">
                <div class="heading-section heading-section-white p-4 pl-md-0 py-md-5 pr-md-5">
                    <!--<span class="subheading">ACDEV</span>-->
                    <h3 class="mb-4 text-white">Association Charité  et Développement </h3>
                    <p>
                        ACDev reste fidèle à son engagement pris et à ses principes qui consistent à destiner les fonds mobilisés aux actions définies, à exécuter les actions dans le temps et dans l’espace bien déterminés au départ.
                        L’exécution des projets est faite avec une transparence qui implique tous les partenaires de l’action.
                       Le rapport des activités est régulièrement envoyé à toutes les parties prenantes pour leur tenir informer de la destination et les impacts de leurs contributions.
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Les projets d'ACDEV</span>
                <h2 class="mb-4">Derniers projets</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($projets as $projet)
            <div class="col-md-4">
                <div class="project">
                    <a href="/storage/projets/{{$projet->image}}" class="img image-popup d-flex align-items-center" style="background-image: url(/storage/projets/{{$projet->image}});">
                        <div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
                    </a>
                    <a href="{{ route('projet-detail', ['projet'=>$projet->titre]) }}">
                        <div class="text">
                            <span class="subheading">{{$projet->type->nom}}</span>
                            <h3>{{str_limit($projet->titre,25)}}</h3>
                            <p><span class="fa fa-map-marker mr-1"></span> {{$projet->localite}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb testimony-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row ftco-animate justify-content-center mb-5">
            <div class="col-md-6 p-4 pl-md-0 py-md-5 pr-md-5 aside-stretch d-flex align-items-center">
                <div class="heading-section heading-section-white">
                    <span class="subheading" style="color:#fff;"></span>
                    <h3 class="mb-4 text-white" >
                        ACDEV ouvre ses bras à toute organisation, à toute bienfaiteur ou bienfaitrice, à toute fondation humanitaire et à toute personne de bonne volonté
                    </h3>
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-4 py-md-5 aside-stretch-right">

                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
                            <img src="{{ asset('images/person_2.jpg') }}" width="205" height="200" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
                            <img src="{{ asset('images/person_2.jpg') }}" width="205" height="200" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
                            <img src="{{ asset('images/person_3.jpg') }}" width="205" height="200" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
                            <img src="{{ asset('images/person_4.jpg') }}" width="205" height="200" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
                            <img src="{{ asset('images/person_2.jpg') }}" width="205" height="200" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
