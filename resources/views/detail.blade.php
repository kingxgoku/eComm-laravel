@extends('master')
@section('content')


<div class="container">
    <div class="row custom justify-content-center align-items-center">
        <div class="col item-photo">
            <img style="max-width:100%;" src="{{$product['product-image-url']}}" />
        </div>
        <div class="col" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h3>{{$product['product-name']}}</h3>

            <!-- Botones de compra -->
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span aria-hidden="true"></span> Buy Now!!!</button>
                <form action="/add-to-cart" method="post">
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    @csrf
                    <button class="btn btn-danger mt-2" type="submit"><span></span>Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection()