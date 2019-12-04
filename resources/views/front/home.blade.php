@extends('front.base')

@section('title')
Home
@endsection

@section('image')
'img/home-bg.jpg'
@endsection

@section('site-heading')
<h1><u>Show Blog</u></h1>
@endsection

@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($article as $data)
            <div class="post-preview">
                <a href="{{ $data->id }}">
                    <h2 class="post-title">
                        {{ $data->name }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ Str::words($data->content,5,'...') }}
                    </h3>
                </a>
                <p class="post-meta">Posted 
                    on {{ $data->updated_at }}</p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection