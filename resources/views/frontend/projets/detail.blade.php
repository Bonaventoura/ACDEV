@extends('frontend.layouts.front')

@section('titre')
{{$projet->titre}}
@endsection

@section('page')
    Projets > Détail
@endsection

@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header bg-success text-white">{{$projet->titre}}</div>
                        <div class="card-body">
                            <center>
                                <a href="/storage/projets/{{$projet->image}}" data-lightbox="example-set">
                                    <img src="/storage/projets/{{$projet->image}}" width="300" height="200" alt="">
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="card shadow-lg">
                        <div class="card-header bg-success text-white">
                            Détails du projet: {{$projet->titre}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="">Titre du projet</label>
                                    <input type="text" readonly value=" {{$projet->titre}} " class="form-control form-control-sm">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="">Type du projet</label>
                                    <input type="text" readonly value=" {{$projet->type->nom}} " class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label for="">Etat du projet</label>
                                    <input type="text" readonly value=" {{$projet->etat->libelle}} " class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label for="">Localité</label>
                                    <input type="text" readonly value=" {{$projet->localite}} " class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label for="">Bénéficiaires du projet</label>
                                    <input type="text" readonly value=" {{$projet->beneficiaires}}" class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-12">
                                    <label for="">Objectif du projet</label>
                                    <input type="text" readonly value=" {{$projet->objectifs}}" class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label for="">Date début du projet</label>
                                    <input type="text" readonly value=" {{$projet->date_start}}" class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label for="">Date fin du projet</label>
                                    <input type="text" readonly value=" {{$projet->date_end}}" class="form-control form-control-sm">
                                </div>

                                <div class=" form-group col-lg-12">
                                    <label for="">description du projet</label>
                                    <textarea name="" id="" class="form-control" readonly >
                                        {{$projet->description}}
                                    </textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <h5>Les partenaires du projet</h5>

                            <div class="row">
                                @foreach ($partenaires as $partenaire)
                                <img src="/storage/partenaires/{{$partenaire->logo}}" width="100" alt="">
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-5 mb-5">
                    <h4 class="text-center bg-success text-white">Gallerie d'image</h4>
                    <div class="row ">
                        @foreach ($galleries as $gallery)
                        <div class="gallery">
                            <a href="/storage/gallery/{{$gallery->image}}" data-lightbox="{{$gallery->legende}}">
                                <img src="/storage/gallery/{{$gallery->image}}" width="400" height="220" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <style>
        .gallery{
            margin: 10px;
        }

        .gallery img{
            width: 230px;
            padding: 5px;
            filter: grayscale(100%);
            transition: 1s;
        }

        .gallery img:hover{
            filter: grayscale(0);
            transform: scale(1.1);
        }
    </style>
@endsection
