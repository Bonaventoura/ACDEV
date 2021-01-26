@extends('frontend.layouts.front')

@section('titre')
    Projets d'ACDEV
@endsection

@section('page')
    Projets
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <span class="subheading">Projets ACDEV</span>
                <h2 class="mb-4">Nos Projects</h2>
            </div>
        </div>
        <div class="row">

            @foreach ($projets as $projet)
            <div class="col-md-4">
                <div class="project">
                    <a href="/storage/projets/{{$projet->image}} " class="img image-popup d-flex align-items-center" style="background-image: url(/storage/projets/{{$projet->image}}  );">
                        <div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
                    </a>
                    <a href="{{ route('projet-detail', ['projet'=>$projet->titre]) }}">
                        <div class="text">
                            <span class="subheading">{{$projet->type->nom}}</span>
                            <h3>{{str_limit($projet->titre,25)}}</h3>
                            <p><span class="fa fa-map-marker mr-1"></span> {{$projet->localite}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{$projets->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
