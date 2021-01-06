@extends('backend.layouts.inc')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header ">
                <h2 class="text-center">
                    Liste des partenaires
                </h2>
            </div>
            <div class="body">
                @include('layouts.messages')
                <div class="table-responsive">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th>Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Nom</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Nombre projets participé</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Action</th>
                                    <th>Del</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($partenaires as $partenaire)
                                    <tr role="row" class="odd">
                                        <td>
                                            <img src="/storage/partenaires/{{$partenaire->logo}}" width="90" height="70" alt="">
                                        </td>
                                        <td class="sorting_1"> {{$partenaire->nom_partenaire}} </td>
                                        <td> {{$partenaire->projets()->count()}} </td>
                                        <td>
                                            <button partenaire="button" data-color="blue" class="btn btn-xs btn-primary  m-r-20" data-toggle="modal" data-target="#mdModal_{{$partenaire->id}}"><i class="material-icons">edit</i></button>
                                        </td>
                                        <td>
                                            <form action="{{ route('partenaires.destroy',$partenaire) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button partenaire="submit" class="btn btn-xs btn-danger  m-r-20" onclick="confirm("En supprimant cette catégorie, vous supprimez toute les produits de cette catégories.Continuez!")"> <i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button type="button" data-color="blue" class="btn btn-primary waves-effect  m-r-20" data-toggle="modal" data-target="#mdModal">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="form_part" data-route="{{ route('partenaires.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Nouveau Etat de projet</h4>
                    <div class="alert alert-success" id="msg_success" style="display: none"></div>
                    <div class="alert alert-danger" id="msg_error" style="display: none"></div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input partenaire="text" name="nom_partenaire" id="nom_partenaire" class="form-control"  placeholder="Nom du partenaire">
                        </div>
                        <span class="text-danger" id="error_nom">  </span>
                    </div>

                    <div class="form-group">
                        <label for="">Description du partenaire</label>
                        <div class="form-line">
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description du partenaire</label>
                        <div class="form-line">
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button partenaire="submit" id="btn_cat" class="btn btn-primary waves-effect" disabled> Enregistrer</button>
                    <button partenaire="button" class="btn btn-danger waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}

@foreach ($partenaires as $item)
<div class="modal fade" id="mdModal_{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_part" action="{{ route('partenaires.update',$item) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Editer la catégorie {{$item->nom}} </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input partenaire="text" name="nom" class="form-control" value=" {{$item->nom}} ">
                            <span class="text-danger"> {{$errors->first()}} </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button partenaire="submit" class="btn btn-primary waves-effect"> Enregistrer</button>
                    <button partenaire="button" class="btn btn-danger waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Delete modal --}}

<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/modals.js') }}"></script>

<script>
    $(document).ready(function () {

        function check() {
            var nom = $('#nom_partenaire').val();

            if (nom.length == 0 || nom == '')  {
                console.log("error, completez");
                $('#error_nom').show();
                $('#error_nom').html("Entrez un nom pour le partenaire de projet ");
                $('#btn_cat').attr('disabled');
                return 0;
            } else {
                console.log("cool");
                $('#error_nom').hide();
                $('#btn_cat').removeAttr('disabled','disabled');
                return 1;
            }
        }

        $('#nom_partenaire').focusout(function () {
            check();
        });

        $('#form_part').submit(function (e) {
            e.preventDefault();
            var route = $(this).data('route');
            var form_data = $(this).serialize();

            $.ajax({
                type: "POST",
                url: route,
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    console.log(response);

                    if (response.success) {
                        $('#msg_success').show();
                        $('#msg_success').html(response.success);

                        $('#btn_cat').attr('disabled', 'disabled');

                        document.getElementById("form_part").reset();
                        setTimeout(function(){
                            $('#msg_success').hide();
                            $('#btn_cat').attr('disabled');
                        },5000);
                    }

                    if (response.error) {
                        $('#msg_error').show();
                        $('#msg_error').html(response.error);

                        setTimeout(function(){
                            $('#msg_error').hide();
                        },5000);
                    }

                }
            });
        });

    })
</script>
@endsection


