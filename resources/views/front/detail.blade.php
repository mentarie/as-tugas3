@extends('front.base')
@foreach($article as $data)

@section('title')
{{ $data->name }}
@endsection

@section('image')
'img/home-bg.jpg'
@endsection

@section('site-heading')
<h1>{{ $data->name }}</h1>
@foreach($data2 as $category)
@if($category->id == $data->category_id)
<span class="subheading">{{ $category->name }}</span>
@endif
@endforeach
@endsection

@section('content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{ $data->content }}
            </div>
        </div>
    </div>
</article>

<hr>
@endsection
@endforeach