{{-- resources/views/pos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div id="pos-app" class="h-full min-h-0 flex-1 flex flex-col"></div>   {{-- Vue mounts here --}}
@endsection

@vite('resources/js/pos-app.js')   {{-- separate entry for POS --}}
