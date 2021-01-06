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
                                <tr class="row">
                                    <th class="sorting">Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Nom</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;"> Titre</th>
                                    <th>Etat</th>
                                    <th>Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Action</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($projets as $projet)
                                    <tr role="row" class="odd">
                                        <td>
                                            <img src="/storage/projets/{{$projet->image}}" width="90" height="70" alt="">
                                        </td>
                                        <td class="sorting_1"> {{$projet->titre}} </td>
                                        <td> {{$projet->localite}} </td>
                                        <td>
                                            {{$projet->etat->libelle}}
                                        </td>
                                        <td>
                                            {{$projet->type->nom}}
                                        </td>
                                        <td>
                                            <button projet="button" data-color="blue" class="btn btn-xs btn-primary  m-r-20" data-toggle="modal" data-target="#mdModal_{{$projet->id}}"><i class="material-icons">edit</i></button>

                                        </td>
                                        <td>
                                            <form action="{{ route('projets.destroy',$projet) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button projet="submit" class="btn btn-xs btn-danger  m-r-20" onclick="confirm("En supprimant cette catégorie, vous supprimez toute les produits de cette catégories.Continuez!")"> <i class="material-icons">delete</i></button>
                                            </form>
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
