@extends('layouts.guest')

@section('content')

<x-shop-banner :restaurant="$restaurant" />

@livewire('shop.orders', ['restaurant' => $restaurant])

@livewire('customer.signup', ['restaurant' => $restaurant])

@endsection
