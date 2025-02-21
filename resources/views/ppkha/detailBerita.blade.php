@extends('layouts.app')

@section('content')
@include('components.navbar')
<div class="p-3 detail-content">
  <div>
    <h1 class="roboto-light mb-0" style="font-style: italic; color: #0F1035; font-weight: 500; font-size: 45px;">Ratusan Mahasiswa Indonesia Terima Beasiswa Dari Kemendikbud</h1>
    <hr>
    <p style = "font-family: 'Roboto Mono', serif ; font-size : 18px; font-weight: 400; color: white" class="mb-1">Selasa, 18 Feb 2025 07:00 WIB</p>
  </div>
  <div class="max-width d-flex justify-content-center">
    <img style="border: #0F1035 solid 15px; border-radius: 40px; width:700px;" src="{{ asset('assets/images/image.png') }}">
  </div>
  <div class="p-4">
    <p style="font-family: 'Roboto Mono', serif; line-height: 45px; font-weight: 500; color: white; text-indent: 0.5in;">     
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
</div>
@include('components.footer')
@endsection
