@extends('backend.layouts.inc')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
            <div class="card shadow-lg">
                <div class="header alert alert-success">
                   <h4> {{$projet->titre}}</h4>
                </div>
                <div class="body">

                    <a href="/storage/projets/{{$projet->image}}" data-lightbox="{{$projet->image}}">
                        <img src="/storage/projets/{{$projet->image}}" data-lightbox="{{$projet->image}}" width="265" alt="">
                    </a>
                </div>
                <div class="footer">
                    <a href="{{ route('projets.index') }}" class="btn btn-sm btn-danger mt-2">Retour</a>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
            <div class="card shadow-lg">
                <div class="header alert alert-success">
                    <h4>Détails du projet</h4>
                </div>
                <div class="body">
                    <div>
                        {{$projet}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        GALLERY
                        <small>Les images du projet : {{$projet->titre}} </small>
                    </h2>
                    <div class="m-r--5 pull-right" style="margin-right: 5px">
                        <button id="add_image" class="btn btn-xs btn-primary">Ajouter une image</button>
                    </div>

                </div>
                <div class="body">
                    <div class="row">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            @foreach ($galleries as $image)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 gallery">
                                <a href="/storage/gallery/{{$image->image}}" data-lightbox="{{$image->legende}}">
                                    <img class="img-responsive thumbnail" src="/storage/gallery/{{$image->image}}">
                                </a>
                            </div>
                            @endforeach
                        </div>

                        <div id="form_gallery" style="display: none">
                            <div class="card">
                                <div class="header ">
                                    <h4>Ajoutez des images au projet</h4>
                                </div>
                                <div class="body">
                                    <div class="alert alert-success" id="msg_success" style="display: none"></div>
                                    <form id="gallery_form_image" data-route="{{ route('gallery.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">
                                        <div class="form-group">
                                            <label for="">legende</label>
                                            <div class="form-line">
                                                <input type="text" name="legende" id="legende" class="form-control" placeholder="Entrez une legende pour l'image">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image_gallery" id="image_gallery" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-md btn-success">Save</button>

                                        <div class="form-group" id="image_div">
                                            <img src="" alt="" id="img" width="265">
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="footer bg-dark">
                                <div class="pull-right">
                                    <button class="btn btn-danger" id="close_form">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
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
    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#add_image').click(function (e) {
                e.preventDefault();
                $('#form_gallery').show();
                $('#add_image').hide();
            });

            $('#close_form').click(function (e) {
                e.preventDefault();
                $('#form_gallery').hide();
                $('#add_image').show();
            });

            $('#gallery_form_image').submit(function (e) {
                e.preventDefault();
                var route = $(this).data('route');

                $.ajax({
                    type: "POST",
                    url: route,
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    cache :false,
                    success: function (response) {
                        console.log(response);

                        if (response.success) {
                            $('#msg_success').show();
                            $('#msg_success').append(response.success);

                            $('#img').attr('src', response.src);
                            document.getElementById('gallery_form_image').reset();
                        }

                        setTimeout(function () {
                            $('#msg_success').hide();
                            $('#image_div').hide();
                        },5500);
                    }
                });
            });
        });
    </script>
@endsection
