@extends('frontend.layouts.front')

@section('titre')
    Témoignages
@endsection

@section('page')
    Témoignages | {{$temoignage->legende}}
@endsection
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 ftco-animate fadeInUp ftco-animated">

                <h2 class="mb-3 text-center">{{$temoignage->legende}}</h2>
                
                <div class="mt-5 mb-5">
                    <center>
                        <img src="/storage/temoignages/{{$temoignage->image}}" alt="" width="855" height="405" class="img-fluid">
                    </center>
                </div>

                <p>
                    {{$temoignage->text}}
                </p>


                @if ($temoignage->lien !== "")
                <div class="col-lg-12 mb-4 mt-3 text-center">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$temoignage->lien}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif


                

            </div> <!-- .col-md-8 -->

           

        </div>
    </div>
</section>
@endsection
