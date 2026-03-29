@extends('layouts.guest')

@section('content')

<x-shop-banner :restaurant="$restaurant" />

@livewire('shop.bookings')
    
@endsection