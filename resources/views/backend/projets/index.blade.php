@extends('backend.layouts.inc')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header ">
                <h2 class="text-center">
                    Liste des projets
                </h2>
            </div>
            <div class="body">
                @include('layouts.messages')
                <div class="table-responsive">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Localité</th>
                                    <th>Etat</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($projets as $projet)
                                    <tr>
                                        <td>
                                            <img src="/storage/projets/{{$projet->image}}" width="90" height="70" alt="">
                                        </td>

                                        <td class=""> {{$projet->titre}} </td>
                                        <td> {{$projet->localite}} </td>
                                        <td>{{$projet->etat->libelle}}</td>
                                        <td>{{$projet->type->nom}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <a href="{{ route('projets.edit', $projet) }}" class="btn btn-xs btn-primary  m-r-20"><i class="material-icons">edit</i></a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <form action="{{ route('projets.destroy',$projet) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button projet="submit" class="btn btn-xs btn-danger"> <i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{{ route('projets.create') }}" class="btn btn-sm btn-primary">Ajouter projet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
