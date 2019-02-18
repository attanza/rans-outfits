@extends('layouts.app')
@section('content')
<h2 class="mb-4">Product Detail</h2>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'detail' ? 'active' : '' }}" href="{{ url('/admin/products?activeTab=detail', ['id' => $product->id])}}">Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab == 'description' ? 'active' : '' }}" href="{{ url('/admin/products?activeTab=description', ['id' => $product->id]) }}">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Attributes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shipping</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Media</a>
            </li>
        </ul>
        <div class="mt-4">
            @if ($activeTab == 'detail')
    @include('products.detail') @elseif ($activeTab == 'description')
    @include('products.description')
            @else I don't have any records! @endif
        </div>


    </div>
</div>
@endsection
