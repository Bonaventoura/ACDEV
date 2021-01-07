@extends('backend.layouts.inc')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header bg-primary">
                <h2>Edition du projet {{$projet->titre}} </h2>
            </div>
            <div class="body">

                <div class="alert alert-success" id="msg_success" style="display: none"></div>
                <div class="alert alert-warning" id="msg_alert" style="display: none"></div>
                <div class="row">
                    @if ($types->count() >0 && $etats->count() >0 && $partenaires->count() > 0)
                    <form id="" action="{{ route('projets.update',$projet) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="">Choix du type de projet</label>
                                <select name="type_id" id="type_id" class="form-control ">
                                    @foreach ($types as $item)
                                        <option value="{{$item->id}}"
                                            @if ($projet->type->id ==$item->id)
                                                selected
                                            @endif> {{$item->nom}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Choix du partenaires</label>
                                <select name="partenaire_id[]" id="partenaire_id" class="form-control show-tick" multiple>
                                    <option value="">Choisir le partenaires</option>
                                    @foreach ($partenaires as $item)
                                        <option value=" {{$item->id}} "> {{$item->nom_partenaire}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Etats de projet</label>
                                <select name="etat_id" id="etat_id" class="form-control show-tick">
                                    <option value="">Choisir l'etat du projet</option>
                                    @foreach ($etats as $item)
                                        <option value="{{$item->id}}"
                                            @if ($projet->etat->id ==$item->id)
                                                selected
                                            @endif>{{$item->libelle}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Titre </label>
                                <div class="form-line">
                                    <input type="text" id="titre" name="titre" value=" {{$projet->titre}} " class="form-control" placeholder="Le titre du projet">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Localité </label>
                                <div class="form-line">
                                    <input type="text" id="localite" name="localite" value=" {{$projet->localite}} " class="form-control" placeholder="La localité">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Beneficiaires </label>
                                <div class="form-line">
                                    <input type="text" id="beneficiaires" name="beneficiaires" value=" {{$projet->beneficiaires}} " class="form-control" placeholder="La montant du produit">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="prix_unit">Objectifs</label>
                                <div class="form-line">
                                    <input type="text" id="objectifs" name="objectifs" value=" {{$projet->objectifs}} " class="form-control" placeholder="Le prix unitaire du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resultats">Résultats</label>
                                <div class="form-line">
                                    <input type="text" id="resultats" name="resultats" class="form-control" value=" {{$projet->resultats}} " placeholder="resultats">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_start">Date de debut</label>
                                <div class="form-line">
                                    <input type="date" name="date_start" id="date_start" value=" {{$projet->date_start}} " class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Date de fin </label>
                                <div class="form-line">
                                    <input type="date" id="date_end" name="date_end" value=" {{$projet->date_end}} " class="form-control" placeholder="La montant du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Image</label>
                                <div class="form-line">
                                    <input type="file" id="image_projet" name="image_projet" value="{{$projet->image}}" class="form-control" placeholder="La montant du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix_unit">Description du projet</label>
                                <div class="form-line">
                                    <textarea name="description" id="description" class="form-control">
                                        {{$projet->description}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group m-r-5">
                                <button type="submit" id="submit" class="btn btn-primary m-t-15 waves-effect">Modifier</button>
                            </div>
                        </div>

                    </form>
                    @else
                        <div class="alert alert-warning">
                            <h4 class="text-center text-white">Veuillez créez d'abord les types, les états de projet et vos partenaires</h4>
                        </div>
                    @endif

                </div>

            </div>
            <div class="footer mb-5 mt-2">
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
