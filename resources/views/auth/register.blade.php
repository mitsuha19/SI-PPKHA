<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <!-- Link to FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf
        <div class="form-group">
            <label for="nim"><i class="fas fa-user"></i> NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required placeholder="Enter your NIM">
            @error('nim') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="name"><i class="fas fa-user"></i> Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter your Name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="prodi"><i class="fas fa-graduation-cap"></i> Program Study</label>
            <input type="text" name="prodi" id="prodi" value="{{ old('prodi') }}" required placeholder="Enter your Program Study">
            @error('prodi') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="tahun_lulus"><i class="fas fa-calendar"></i> Graduate Year</label>
            <input type="number" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus') }}" required placeholder="Enter your Graduate Year">
            @error('tahun_lulus') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" id="password" required placeholder="Create new password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation"><i class="fas fa-lock"></i> Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirm your password">
        </div>

        <div class="form-actions">
            <button type="submit" class="register-button">Register</button>
            <p class="login-link">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
    </form>
</body>
</html>
