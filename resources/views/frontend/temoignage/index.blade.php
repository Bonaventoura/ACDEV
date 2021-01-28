@extends('frontend.layouts.front')

@section('titre')
    Témoignages
@endsection

@section('page')
    Témoignages
@endsection
@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
                <h2 class="text-center">Les Témoignages sur certains projets</h2>
            </div>
            {{-- les temoignages --}}
            @foreach ($temoignages as $post)
            <div class="col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="blog-entry">
                    <a href="{{ route('temoignage.show', ['slug'=>$post->slug]) }}" class="block-20" style="background-image: url('/storage/temoignages/{{$post->image}}');"></a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>{{$post->created_at->format('d, m Y : H:i:s')}} </a> &nbsp;
                                {{--<a href="#"><span class="fa fa-user mr-2"></span>Admin</a>--}}
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">{{ str_limit($post->legende,20) }}</a></h3>
                        <button type="button" class="btn btn-secondary py-2 px-3" data-toggle="modal" data-target="#largeModal_{{$post->id}}">Voir</button>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</section>

<!-- Large Size -->
@foreach ($temoignages as $item)
<div class="modal fade" id="largeModal_{{$post->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">{{$item->legende}}</h4>
            </div>
            <div class="modal-body">
                <iframe width="553" height="480" src="https://www.youtube.com/embed/{{$item->lien}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
