@extends('master')
@section('content')


<div class="container">
    <div class="row custom justify-content-center align-items-center">
    <div class="row">
                @foreach($products as $item)
                <div class="col">
                    <img src="{{$item['product-image-url']}}" alt="">
                    <h3 class="fw-normal">{{$item['product-name']}}</h3>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="details/{{$item['id']}}">Buy Now »</a></p>
                </div><!-- /.col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
    </div>
</div>


@endsection()