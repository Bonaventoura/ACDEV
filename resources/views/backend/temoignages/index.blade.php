@extends('backend.layouts.inc')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header ">
                <h2 class="text-center">
                    Liste de temoignages
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="title: activate to sort column descending" style="width: 80px;">Légende</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 40px;">Type</th>
                                    <th>Lien</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($temoignages as $post)
                                    <tr>
                                        <td>
                                            <img src="/storage/temoignages/{{$post->image}} " width="90" height="70" alt="">
                                        </td>
                                        <td class="sorting_1"> {{$post->legende}} </td>
                                        <td> {{$post->type->name}} </td>
                                        <td>
                                            @if ($post->lien !== '')
                                            <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#largeModal_{{$post->id}}">Voir</button>
                                            @else
                                                Image
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <a href="{{ route('temoignages.edit',$post) }}" class="btn btn-xs btn-primary"><i class="material-icons">edit</i></a>
                                                </div>

                                                <div class="col-lg-4">
                                                    <form action="{{ route('temoignages.destroy',$post) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-xs btn-danger  m-r-20"> <i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{{ route('temoignages.create') }}" class="btn btn-sm btn-primary">Nouveau post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large Size -->
@foreach ($temoignages as $item)
<div class="modal fade" id="largeModal_{{$post->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">{{$item->title}}</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <iframe width="653" height="480" src="https://www.youtube.com/embed/{{$item->lien_video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/modals.js') }}"></script>

<script>
    $(document).ready(function () {


    })
</script>
@endsection


