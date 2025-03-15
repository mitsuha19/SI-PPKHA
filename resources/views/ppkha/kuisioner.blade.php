@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">

        <div class="user-survey">
            <div class="user-survey-content">
                <!-- Card untuk Judul Form dan Deskripsi -->
                <div class="card-user-survey">
                    <h1 class="montserrat-medium text-black text-center" style="font-size: 24px;">{{ $form->judul_form }}</h1>
                    <p class="text-muted text-center">{{ $form->deskripsi_form }}</p>
                </div>

                <!-- Card untuk Pertanyaan Kuisioner -->
                <div class="card-user-survey">
                    <h3 class="montserrat-medium text-primary">{{ $firstSection->section_name }}</h3>
                    <hr>

                    <form action="{{ route('kuesioner.next', $firstSection->id) }}" method="POST">
                        @csrf

                        @foreach ($firstSection->questions as $question)
                            <div class="box-form">
                                <label class="montserrat-medium text-black">{{ $question->question_body }}
                                    @if ($question->is_required)
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>

                                @if ($question->type_question_id == 1)
                                    <!-- Jawaban Singkat -->
                                    <input type="text" class="form-control" name="answers[{{ $question->id }}]" required>
                                @elseif($question->type_question_id == 2)
                                    <!-- Paragraf -->
                                    <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3" required></textarea>
                                @elseif(in_array($question->type_question_id, [3, 4, 5]))
                                    <!-- Pilihan Ganda, Kotak Centang, Dropdown -->
                                    @foreach ($question->options as $option)
                                        @if ($question->type_question_id == 3)
                                            <!-- Pilihan Ganda -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="answers[{{ $question->id }}]" id="option_{{ $option->id }}"
                                                    value="{{ $option->id }}" required>
                                                <label class="form-check-label" for="option_{{ $option->id }}">
                                                    <i>{{ $option->option_body }}</i>
                                                </label>
                                            </div>
                                        @elseif($question->type_question_id == 4)
                                            <!-- Kotak Centang -->
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-2" type="checkbox"
                                                    name="answers[{{ $question->id }}][]" value="{{ $option->id }}">
                                                <label class="form-check-label">{{ $option->option_body }}</label>
                                            </div>
                                        @elseif($question->type_question_id == 5)
                                            <!-- Dropdown -->
                                            <select class="form-select" name="answers[{{ $question->id }}]" required>
                                                <option value="">Pilih salah satu</option>
                                                @foreach ($question->options as $option)
                                                    <option value="{{ $option->id }}">{{ $option->option_body }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    @endforeach
                                @elseif($question->type_question_id == 6)
                                    <!-- Skala Linier -->
                                    <input type="range" class="form-range" name="answers[{{ $question->id }}]"
                                        min="1" max="10">
                                @elseif($question->type_question_id == 7)
                                    <!-- Lokasi -->
                                    <div class="mb-2">
                                        <label class="fw-bold">Pilih Provinsi</label>
                                        <select class="form-select province" name="province">
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="fw-bold">Pilih Kabupaten/Kota</label>
                                        <select class="form-select regency" name="regency" disabled>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="text-end">
                            <button type="submit" class="userSurveyButton">Berikutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.querySelector(".province");
            const regencySelect = document.querySelector(".regency");

            // Ambil data provinsi dari proxy Laravel
            fetch("/proxy/provinces")
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Gagal mengambil data provinsi dari server");
                    }
                    return response.json();
                })
                .then(data => {
                    provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    data.forEach(province => {
                        const option = document.createElement("option");
                        option.value = province.id;
                        option.textContent = province.name;
                        provinceSelect.appendChild(option);
                    });
                })
                .catch(error => console.error("Gagal mengambil data provinsi:", error));

            // Event listener saat user memilih provinsi
            provinceSelect.addEventListener("change", function() {
                const provinceId = this.value;
                regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                regencySelect.disabled = true;

                if (provinceId) {
                    fetch(`/proxy/regencies/${provinceId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Gagal mengambil data kabupaten/kota dari server");
                            }
                            return response.json();
                        })
                        .then(data => {
                            regencySelect.disabled = false;
                            data.forEach(regency => {
                                const option = document.createElement("option");
                                option.value = regency.id;
                                option.textContent = regency.name;
                                regencySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error("Gagal mengambil data kabupaten/kota:", error));
                }
            });
        });
    </script>
@endsection
