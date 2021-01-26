<div class="py-1 top">
    <div class="container">
        <div class="row">
            <div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
                <p class="mb-0 w-100">
                    <span class="fa fa-paper-plane"></span>
                    <span class="text">acdev.org@gmail.com</span>
                </p>
            </div>
            <div class="col-sm justify-content-center d-flex mb-md-0 mb-2">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
                <p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Nous écrire</a></p>
            </div>
        </div>
    </div>
</div>
<div class="pt-4 pb-5">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-4 d-flex mb-2 mb-md-0">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                    <img src="{{ asset('images/logo_acdev.png') }}" width="70" alt="">
                    <strong>Action Charité et <br>Développement</strong>
                </a>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 mb-2 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-map"></span>
                </div>
                <div class="pr-md-4 pl-md-3 pl-3 text">
                    <p class="con"><span>Tel : </span> <span>(+228) 90 06 14 55</span></p>
                    {{--<p class="con">Call Us Now 24/7 Customer Support</p>--}}
                </div>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-paper-plane"></span>
                </div>
                <div class="text pl-3 pl-md-3">
                    <p class="hr"><span>Lieu</span></p>
                    <p class="con">
                        Yokoè dans le canton
                        Sagbado - 22 BP 63
                        Lomé - Togo
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li id="home" class="nav-item active"><a href="{{ route('welcome') }}" class="nav-link">Accueil</a></li>
                <li id="present" class="nav-item"><a href="{{ route('presentation') }}" class="nav-link">A propos</a></li>
                <li id="projet" class="nav-item"><a href="{{ route('acdev.projets') }}" class="nav-link">Projets</a></li>
                <li id="blog" class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Actualités</a></li>
                <li id="temoignage" class="nav-item"><a href="{{ route('temoignage') }}" class="nav-link">Témoignages</a></li>
                <li id="partenaire" class="nav-item"><a href="{{ route('acdev.partenaires') }}" class="nav-link">Partenaires</a></li>
                {{--<li id="partenaire" class="nav-item"><a href="{{ route('galery') }}" class="nav-link">Galerie</a></li>--}}
                <li id="contact" class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
            {{--<a href="#" class="btn-custom" data-toggle="modal" data-target="#exampleModalCenter">Nous écrire</a>--}}
        </div>
    </div>
</nav>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {
        //alert('welcome');
    });
</script>
