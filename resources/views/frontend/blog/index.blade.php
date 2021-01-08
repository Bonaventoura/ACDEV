@extends('frontend.layouts.front')

@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            {{-- les posts --}}
            @foreach ($posts as $post)
            <div class="col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="blog-entry">
                    <a href="{{ route('blog.single', ['slug'=>$post->slug]) }}" class="block-20" style="background-image: url('/storage/posts/{{$post->image}}');"></a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>{{$post->created_at->format('d, m Y : H:i:s')}} </a> &nbsp;
                                {{--<a href="#"><span class="fa fa-user mr-2"></span>Admin</a>--}}
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">{{ str_limit($post->title,20) }}</a></h3>
                        <p><a href="{{ route('blog.single', ['slug'=>$post->slug]) }}" class="btn btn-secondary py-2 px-3">Lire article</a></p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

    </div>
  
</section>
@endsection