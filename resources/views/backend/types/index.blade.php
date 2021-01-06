@extends('backend.layouts.inc')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header ">
                <h2 class="text-center">
                    Liste des types
                </h2>
            </div>
            <div class="body">
                @include('layouts.messages')
                <div class="table-responsive">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Nom</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Nombre projets</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Action</th>
                                    <th class="sorting">Del</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($types as $type)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"> {{$type->nom}} </td>
                                        <td> {{$type->projets->count()}} </td>

                                        <td>
                                            <button type="button" data-color="blue" class="btn btn-xs btn-primary  m-r-20" data-toggle="modal" data-target="#mdModal_{{$type->id}}"><i class="material-icons">edit</i></button>
                                        </td>
                                        <td>
                                            <form action="{{ route('types.destroy',$type) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-xs btn-danger  m-r-20" onclick="confirm("En supprimant cette catégorie, vous supprimez toute les produits de cette catégories.Continuez!")"> <i class="material-icons">delete</i></button>
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
            <div class="alert alert-success" id="msg_success" style="display: none"></div>
            <div class="alert alert-danger" id="msg_error" style="display: none"></div>
            <form id="form_type" data-route="{{ route('types.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Nouveau type</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nom" id="nom" class="form-control"  placeholder="Nom de la catégoeie">
                        </div>
                        <span class="text-danger" id="error_nom">  </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_cat" class="btn btn-primary waves-effect" disabled> Enregistrer</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}

@foreach ($types as $item)
<div class="modal fade" id="mdModal_{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('types.update',$item) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Editer la catégorie {{$item->nom}} </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nom" class="form-control" value=" {{$item->nom}} ">
                            <span class="text-danger"> {{$errors->first()}} </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect"> Enregistrer</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Fermer</button>
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
            var nom = $('#nom').val();

            if (nom.length == 0 || nom == '')  {
                console.log("error, completez");
                $('#error_nom').show();
                $('#error_nom').html("Entrez un nom pour le type de projet ");
                $('#btn_cat').attr('disabled')
                return 0;
            } else {
                console.log("cool");
                $('#error_nom').hide();
                $('#btn_cat').removeAttr('disabled','disabled');
                return 1;
            }
        }

        $('#nom').focusout(function () {
            check();
        });

        $('#form_type').submit(function (e) {
            e.preventDefault();
            var route = $(this).data('route');
            var form_data = $(this).serialize();
            check();
            $.ajax({
                type: "POST",
                url: route,
                data: form_data,
                dataType: "JSON",
                success: function (response) {
                    console.log(response);

                    if (response.success) {
                        $('#msg_success').show();
                        $('#msg_success').html(response.success);
                        document.getElementById("form_type").reset();
                        $('#btn_cat').attr('disabled', 'disabled');

                        setTimeout(function(){
                            $('#msg_success').hide();
                        },5000)
                    }

                    if (response.error) {
                        $('#msg_error').show();
                        $('#msg_error').html(response.error);
                    }

                }
            });
        });

    })
</script>
@endsection


