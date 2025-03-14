<form method="POST" action="{{ route('register') }}">
  @csrf
  <div>
      <label for="nim">NIM:</label>
      <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required>
      @error('nim') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      @error('name') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="prodi">Program Studi:</label>
      <input type="text" name="prodi" id="prodi" value="{{ old('prodi') }}" required>
      @error('prodi') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="tahun_lulus">Tahun Lulus:</label>
      <input type="number" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus') }}" required>
      @error('tahun_lulus') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="fakultas">Fakultas:</label>
      <input type="text" name="fakultas" id="fakultas" value="{{ old('fakultas') }}" required>
      @error('fakultas') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      @error('password') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div>
      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" name="password_confirmation" id="password_confirmation" required>
  </div>
  <button type="submit">Register</button>
</form>