@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->

        <!-- Berita Section -->
      <div class="pengumuman-section">
        <h2 class="section-title">USER SURVEY</h2>
      </div>
    </div>

    @include('components.footer')
@endsection