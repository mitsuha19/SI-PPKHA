<!-- resources/views/auth/register.blade.php -->
@extends('layouts.auth')

@section('content')
<div class="form-container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Register</h2>

        <div class="form-group">
            <i class="icon fa fa-user"></i>
            <input type="text" name="nim" id="nim" placeholder="Enter your NIM" value="{{ old('nim') }}" required>
            @error('nim') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-user-circle"></i>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" value="{{ old('name') }}" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-graduation-cap"></i>
            <input type="text" name="prodi" id="prodi" placeholder="Enter Your Program Study" value="{{ old('prodi') }}" required>
            @error('prodi') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-building-o"></i>
            <input type="text" name="fakultas" id="fakultas" placeholder="Enter Your Faculty" value="{{ old('fakultas') }}" required>
            @error('fakultas') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-calendar"></i>
            <input type="number" name="tahun_lulus" id="tahun_lulus" placeholder="Enter Your Graduate Year" value="{{ old('tahun_lulus') }}" required>
            @error('tahun_lulus') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Create new Password" required>
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <i class="icon fa fa-lock"></i>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation of your password" required>
        </div>

        <button type="submit" class="btn">Register</button>

       
    </form>
</div>
@endsection
