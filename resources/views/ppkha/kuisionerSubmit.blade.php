@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="detail-contents text-center">
        <div class="thank-you-box">
            <h1 class="thank-you-title">🎉 Terima Kasih! 🎉</h1>
            <p class="thank-you-message">
                Jawaban Anda telah berhasil disimpan. Kami sangat menghargai partisipasi Anda dalam survei ini.
            </p>
            <div class="confetti"></div>
            <a href="{{ url('/') }}" class="btn-thank-you">Kembali ke Beranda</a>
        </div>
    </div>

    @include('components.footer')
@endsection
