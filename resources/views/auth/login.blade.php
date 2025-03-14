@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif

<form method="POST" action="{{ route('login') }}">
  @csrf
  <div>
      <label for="nim">NIM:</label>
      <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required>
      @error('nim') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      @error('password') <span class="error">{{ $message }}</span> @enderror
  </div>

  {!! NoCaptcha::renderJs() !!}
  {!! NoCaptcha::display() !!}
  
  <br>
  <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>

  <button type="submit">Login</button>
</form>