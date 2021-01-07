@extends('backend.layouts.inc')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header bg-primary">
                <h2>Nouveau post</h2>
            </div>
            <div class="body">

                <div class="alert alert-success" id="msg_success" style="display: none"></div>
                <div class="alert alert-warning" id="msg_alert" style="display: none"></div>
                <div class="row">
                    @if ($categories->count() >0)
                    <form id="form_post" data-route="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="">Choix de la catégorie de post</label>
                                <select name="category_id" id="category_id" class="form-control ">
                                    <option value="">Choisir la catégorie</option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}" @if ($post->category->id ==$item->id )
                                            selected
                                        @endif> {{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Titre </label>
                                <div class="form-line">
                                    <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control" placeholder="Le titre du post">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            
                            <div class="form-group">
                                <label for="lien_video">Lien vidéo</label>
                                <div class="form-line">
                                    <input type="text" id="lien_video" name="lien_video" value="{{$post->lien_video}}" class="form-control" placeholder="Le lien youtube du post ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="form-line">
                                    <input type="file" id="image" name="image" value="{{$post->image}}" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group">
                                <label for="description">Description du post</label>
                                <div class="form-line">
                                    <textarea name="body" id="body" class="form-control">
                                        {{$post->title}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group m-r-5">
                                <button type="submit" id="submit" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>
                            </div>
                        </div>

                    </form>
                    @else
                        <div class="alert alert-warning">
                            <h4 class="text-center text-white">Veuillez créez d'abord les categories, les états de projet et vos partenaires</h4>
                        </div>
                    @endif

                </div>

            </div>
            <div class="footer mb-5 mt-5">
                <a href="javascript:history.back()" class="btn btn-sm btn-danger">Retour</a>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {

        
    });
</script>
@endsection
