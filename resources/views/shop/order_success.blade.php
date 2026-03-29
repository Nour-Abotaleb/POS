@extends('layouts.guest')

@section('content')

<x-shop-banner :restaurant="$restaurant" />

@livewire('shop.orderDetail', [
    'id' => $id,
    'restaurant' => $restaurant,
    'shopBranch' => $shopBranch,
])
    
@endsection