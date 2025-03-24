@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="detail-content">
        <div class="user-survey">
            <div class="user-survey-content" style="padding: 0px 160px; margin-top: 10px">
                @if (!$form)
                    <div class="card-user-survey text-start">
                        <h1 class="montserrat-medium text-black">Belum Ada Kuisioner</h1>
                        <p class="text-muted">Saat ini belum ada kuisioner yang tersedia.</p>
                    </div>
                @else
                    <div class="card-user-survey text-start">
                        <h1 class="text-black" style="font-size: 24px; font-family: 'Roboto';">
                            {{ $form->judul_form }}
                        </h1>
                        <p class="text-muted" style="font-size: 15px; font-family: 'Poppins';">
                            {!! nl2br(e($form->deskripsi_form)) !!}
                        </p>
                    </div>


                    <form action="{{ route('kuesioner.next', $firstSection->id) }}" method="POST">
                        <div class="card-user-survey">
                            <h3 class="montserrat-medium text-black section-title"
                                style="font-size: 24px; font-family: 'Roboto'">{{ $firstSection->section_name }}</h3>

                            @csrf

                            @foreach ($firstSection->questions as $question)
                                <div class="box-form">
                                    <label class="montserrat-medium text-black section-title"
                                        style="font-size: 18px; font-family: 'Roboto'">{{ $question->question_body }}
                                        @if ($question->is_required)
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>

                                    @php
                                        $previousAnswer = session('answers.' . $question->id);
                                    @endphp

                                    @if ($question->type_question_id == 1)
                                        <input type="text" class="form-control" name="answers[{{ $question->id }}]"
                                            value="{{ $previousAnswer }}" @if ($question->is_required) required @endif>
                                    @elseif($question->type_question_id == 2)
                                        <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3"
                                            @if ($question->is_required) required @endif>{{ $previousAnswer }}</textarea>
                                    @elseif($question->type_question_id == 5)
                                        <select class="form-select" name="answers[{{ $question->id }}]"
                                            @if ($question->is_required) required @endif>
                                            <option value="">Pilih</option>
                                            @foreach ($question->options as $option)
                                                <option value="{{ $option->id }}"
                                                    @if ($previousAnswer == $option->id) selected @endif>
                                                    {{ $option->option_body }}</option>
                                            @endforeach
                                        </select>
                                    @elseif(in_array($question->type_question_id, [3, 4]))
                                        @foreach ($question->options as $option)
                                            @if ($question->type_question_id == 3)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="answers[{{ $question->id }}]"
                                                        id="option_{{ $option->id }}" value="{{ $option->id }}"
                                                        @if ($previousAnswer == $option->id) checked @endif
                                                        @if ($question->is_required) required @endif>
                                                    <label class="form-check-label" for="option_{{ $option->id }}">
                                                        <i>{{ $option->option_body }}</i>
                                                    </label>
                                                </div>
                                            @elseif($question->type_question_id == 4)
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-2" type="checkbox"
                                                        name="answers[{{ $question->id }}][]" value="{{ $option->id }}"
                                                        @if (is_array($previousAnswer) && in_array($option->id, json_decode($previousAnswer, true))) checked @endif>
                                                    <label class="form-check-label">{{ $option->option_body }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($question->type_question_id == 6)
                                        <!-- Linear Scale -->
                                        <div class="box-form">
                                            {{-- <label class="montserrat-medium text-black mb-2">
                                                {{ $question->question_body }}
                                                @if ($question->is_required)
                                                    <span class="text-danger">*</span>
                                                @endif
                                            </label> --}}
                                            <div class="linear-scale d-flex align-items-center gap-2">
                                                @php
                                                    $options = $question->options
                                                        ->pluck('option_body')
                                                        ->map(function ($value) {
                                                            return is_numeric($value) ? (int) $value : 0;
                                                        })
                                                        ->sort()
                                                        ->values();
                                                    $start = $options->isNotEmpty() ? $options->first() : 0;
                                                    $end = $options->isNotEmpty() ? $options->last() : 5;
                                                    $end = max($start, $end);
                                                @endphp
                                                @for ($i = $start; $i <= $end; $i++)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answers[{{ $question->id }}]"
                                                            id="option_{{ $question->id }}_{{ $i }}"
                                                            value="{{ $i }}"
                                                            @if ($previousAnswer == $i) checked @endif
                                                            @if ($question->is_required) required @endif>
                                                        <label class="form-check-label" style="font-style: italic;"
                                                            for="option_{{ $question->id }}_{{ $i }}">{{ $i }}</label>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>


                        <div class="text-end">
                            @if (isset($previousSectionId))
                                <a href="{{ route('kuesioner.previous', $previousSectionId) }}"
                                    class="userSurveyButton">Kembali</a>
                            @endif
                            <button type="submit" class="userSurveyButton">Berikutnya</button>
                        </div>

                    </form>
                @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.querySelector(".province");
            const regencySelect = document.querySelector(".regency");

            fetch("/proxy/provinces")
                .then(response => {
                    if (!response.ok) throw new Error("Gagal mengambil data provinsi dari server");
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

                    // Muat jawaban sebelumnya jika ada
                    const previousProvince = "{{ $previousAnswer['province'] ?? '' }}";
                    if (previousProvince) {
                        provinceSelect.value = previousProvince;
                        loadRegencies(previousProvince);
                    }
                })
                .catch(error => console.error("Gagal mengambil data provinsi:", error));

            provinceSelect.addEventListener("change", function() {
                const provinceId = this.value;
                regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                regencySelect.disabled = true;

                if (provinceId) {
                    loadRegencies(provinceId);
                }
            });

            function loadRegencies(provinceId) {
                fetch(`/proxy/regencies/${provinceId}`)
                    .then(response => {
                        if (!response.ok) throw new Error("Gagal mengambil data kabupaten/kota dari server");
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

                        const previousRegency = "{{ $previousAnswer['regency'] ?? '' }}";
                        if (previousRegency) regencySelect.value = previousRegency;
                    })
                    .catch(error => console.error("Gagal mengambil data kabupaten/kota:", error));
            }

            let selects = document.querySelectorAll("select");
            selects.forEach(select => {
                select.style.color = "black";
                select.addEventListener("change", function() {
                    this.style.color = "black";
                });
            });
        });
    </script>
@endsection
