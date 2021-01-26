@extends('frontend.layouts.front')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="gallery">

                <a href="/images/image_3.jpg" data-lightbox="example-set"><img src="{{ asset('/images/image_3.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/image_4.jpg" data-lightbox="example-set"><img src="{{ asset('/images/image_4.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/image_5.jpg" data-lightbox="example-set"><img src="{{ asset('/images/image_5.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/image_6.jpg" data-lightbox="example-set"><img src="{{ asset('/images/image_6.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/person_1.jpg" data-lightbox="example-set"><img src="{{ asset('/images/person_1.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/person_2.jpg" data-lightbox="example-set"><img src="{{ asset('/images/person_2.jpg') }}"width="300" height="220" alt=""></a>
                <a href="/images/person_3.jpg" data-lightbox="example-set"><img src="{{ asset('/images/person_3.jpg') }}" width="300" height="220" alt=""></a>
                <a href="/images/person_4.jpg" data-lightbox="example-set"><img src="{{ asset('/images/person_4.jpg') }}" width="300" height="220" alt=""></a>
            </div>
        </div>
    </div>


    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <style>
        .gallery{
            margin: 10px;
        }

        .gallery img{
            width: 230px;
            padding: 5px;
            filter: grayscale(100%);
            transition: 1s;
        }

        .gallery img:hover{
            filter: grayscale(0);
            transform: scale(1.1);
        }
    </style>
@endsection
