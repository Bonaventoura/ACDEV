<div>

    @if(session()->has('success'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('alert'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ session()->get('alert') }}
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert bg-pink alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ $error }}
        </div>
        @endforeach
    @endif


</div>
