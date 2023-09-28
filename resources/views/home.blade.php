@extends('layouts.navUtama')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
                    You are a User.
                </div>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="{{ asset('/storage/posts/'.$post->image) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $post->nama_produk }}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection