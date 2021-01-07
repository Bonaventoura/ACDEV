@extends('backend.layouts.inc')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow-lg">
            <div class="header ">
                <h2 class="text-center">
                    Liste de posts 
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="title: activate to sort column descending" style="width: 80px;">Titre</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 40px;">Catégorie</th>
                                    <th>Type</th>
                                    <th>Etat</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <img src="/storage/posts/{{$post->image}} " width="90" height="70" alt="">
                                        </td>
                                        <td class="sorting_1"> {{$post->title}} </td>
                                        <td> {{$post->category->name}} </td>
                                        <td>
                                            @if ($post->lien_video !== '')
                                                Vidéo
                                            @else
                                                Image                                                
                                            @endif
                                        </td>
                                        <td>
                                            @if ($post->publier == 0)
                                                <a href="" class="btn btn-xs btn-warning">Non Publier</a>
                                            @else
                                                <a href="" class="btn btn-xs btn-warning">Publier</a>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    @if ($post->publier == 0)
                                                        <a class="btn btn-xs btn-success"><i class="material-icons">visibility</i></a>
                                                    @else
                                                        <a class="btn btn-xs btn-warning"><i class="material-icons">visibility_off</i></a>
                                                    @endif 
                                                </div>

                                                <div class="col-lg-4">
                                                    <a href="{{ route('posts.edit',$post) }}" class="btn btn-xs btn-primary"><i class="material-icons">edit</i></a>
                                                </div>

                                                <div class="col-lg-4">
                                                    <form action="{{ route('posts.destroy',$post) }}" method="post">
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
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Nouveau post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Jquery Core Js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/modals.js') }}"></script>

<script>
    $(document).ready(function () {

        
    })
</script>
@endsection


