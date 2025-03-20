@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg2')
        <div class="berita-section">
            <h2 class="section-title">INSTITUT TEKNOLOGI DEL</h2>
        </div>
        @include('components.bgMid')
    </div>

    @include('components.footer')
@endsection
