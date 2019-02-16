@extends('layouts.master')
@section('content')
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        @isset($products)
        @foreach ($products as $product)
        <div class="single-products-catagory clearfix">
            <a href="shop.html">

                @if (count($product->medias))
                <img src="{{ $product->medias[0]->url }}" alt="">

                @else
                <img src="{{ asset('/img/broken.png') }}" alt="">
                @endif
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>IDR {{ number_format($product->regular_price) }}</p>
                    <h4>{{ $product->name }}</h4>
                </div>
            </a>
        </div>
        @endforeach
        @endisset
    </div>
</div>
<!-- Product Catagories Area End -->
@endsection
