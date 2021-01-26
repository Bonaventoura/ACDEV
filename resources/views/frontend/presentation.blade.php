@extends('frontend.layouts.front')

@section('titre')
    Présentation d'ACDEV
@endsection

@section('page')
    Présentation
@endsection

@section('content')

<div class="col-lg-12">

</div>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter mt-5">
    <div class="img image-overlay" style="background-image: url({{asset('images/about-3.jpg')}});"></div>
    <div class="container ">
        <div class="row no-gutters">
            <div class="col-md-6 py-5 bg-secondary aside-stretch">
                <div class="heading-section heading-section-white p-4 pl-md-0 py-md-5 pr-md-5">
                    <span class="subheading">Wilcon A Construction Company</span>
                    <h2 class="mb-4">Best Provider for Industrial Services</h2>
                    <h4>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h4>
                    <p></p>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="about-wrap img w-100" style="background-image: url({{asset('images/about.jpg')}});">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo_acdev.png') }}" width="70" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subheading"></span>
                        <h2 class="mb-4">A PROPOS D'ACDEV</h2>

                        <p>
                            <strong>Action Charité et Développement</strong> est une association à caractère philanthropique,
                            apolitique et à but non lucratif créée au Togo et régie par la loi de 1901.
                            Les membre d’ACDev mettent en commun leurs efforts pour la réalisation des actions
                            qui visent le bien-être des populations les plus défavorisées en s’occupant activement des projets sociaux.
                        </p>
                        <p> <strong>MISSION :</strong>
                           L’association ACDev s’engage à contribuer au développement social, économique et culturel des communautés les plus démunies.
                            ACDev vient en appui aux couches socialement défavorisées surtout celles à la base qui cherchent à s’organiser afin de trouver de solutions aux problèmes qui freinent leur développement.</p>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
{{--<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <span class="subheading">Our Team</span>
                <h2 class="mb-4">Our Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="block-2 ftco-animate fadeInUp ftco-animated">
                    <div class="flipper">
                        <div class="front" style="background-image: url(/images/team-1.jpg);">
                            <div class="box">
                                <h2>Ryan Anderson</h2>
                                <p>Head Engineer</p>
                            </div>
                        </div>
                        <div class="back">
                            <!-- back content -->
                            <blockquote>
                                <p>“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text ”</p>
                            </blockquote>
                            <div class="author d-flex">
                                <div class="image align-self-center">
                                    <img src="images/team-1.jpg" alt="">
                                </div>
                                <div class="name align-self-center ml-3">Ryan Anderson <span class="position">Head Engineer</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="block-2 ftco-animate fadeInUp ftco-animated">
                    <div class="flipper">
                        <div class="front" style="background-image: url(/images/team-2.jpg);">
                            <div class="box">
                                <h2>Greg Washer</h2>
                                <p>Head Engineer</p>
                            </div>
                        </div>
                        <div class="back">
                            <!-- back content -->
                            <blockquote>
                                <p>“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text ”</p>
                            </blockquote>
                            <div class="author d-flex">
                                <div class="image align-self-center">
                                    <img src="images/team-2.jpg" alt="">
                                </div>
                                <div class="name align-self-center ml-3">Greg Washer<span class="position">Head Engineer</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="block-2 ftco-animate fadeInUp ftco-animated">
                    <div class="flipper">
                        <div class="front" style="background-image: url(/images/team-3.jpg);">
                            <div class="box">
                                <h2>Tony Henderson</h2>
                                <p>Ass. Engineer</p>
                            </div>
                        </div>
                        <div class="back">
                            <!-- back content -->
                            <blockquote>
                                <p>“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text ”</p>
                            </blockquote>
                            <div class="author d-flex">
                                <div class="image align-self-center">
                                    <img src="images/team-3.jpg" alt="">
                                </div>
                                <div class="name align-self-center ml-3">Tony Henderson <span class="position">Ass. Engineer</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="block-2 ftco-animate fadeInUp ftco-animated">
                    <div class="flipper">
                        <div class="front" style="background-image: url(/images/team-4.jpg);">
                            <div class="box">
                                <h2>Jack Smith</h2>
                                <p>Architect</p>
                            </div>
                        </div>
                        <div class="back">
                            <!-- back content -->
                            <blockquote>
                                <p>“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text ”</p>
                            </blockquote>
                            <div class="author d-flex">
                                <div class="image align-self-center">
                                    <img src="images/team-4.jpg" alt="">
                                </div>
                                <div class="name align-self-center ml-3">Jack Smith <span class="position">Architect</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>--}}

@endsection
