@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <br />
                <h1>Edit Tracer Study</h1>
            </div>
            <div class="col-auto">
                <br />
                <a href="/admin/tracer-study" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.forms.update', $form->id) }}" method="POST" id="formTracer">
            @csrf
            @method('PUT')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul_form" class="form-label">Judul Form</label>
                        <input type="text" class="form-control" id="judul_form" name="judul_form" required
                            value="{{ $form->judul_form }}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_form" class="form-label">Deskripsi Form</label>
                        <textarea class="form-control" id="deskripsi_form" name="deskripsi_form" rows="3">{{ $form->deskripsi_form }}</textarea>
                    </div>
                </div>
            </div>

            <div id="sections-container">
                @foreach ($form->sections as $sectionIndex => $section)
                    <div class="card mb-4 section-card" data-section-index="{{ $sectionIndex }}">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2">Section <span
                                        class="section-number">{{ $sectionIndex + 1 }}</span></span>
                                <input type="text" class="form-control form-control-sm"
                                    name="sections[{{ $sectionIndex }}][section_name]" placeholder="Nama Section" required
                                    value="{{ $section->section_name }}" style="max-width: 300px;">
                            </div>
                            <div>
                                <button type="button" class="btn btn-sm btn-link toggle-section">
                                    <i class="fas fa-chevron-up"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger delete-section">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body section-body">
                            <div class="questions-container">
                                @foreach ($section->questions as $questionIndex => $question)
                                    <div class="card mb-3 question-card" data-question-index="{{ $questionIndex }}">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Pertanyaan</label>
                                                    <input type="text" class="form-control"
                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][question_body]"
                                                        placeholder="Tulis pertanyaan di sini"
                                                        value="{{ $question->question_body }}" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <label class="form-label">Tipe Pertanyaan</label>
                                                    <select class="form-select question-type"
                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][type_question_id]"
                                                        data-section-index="{{ $sectionIndex }}"
                                                        data-question-index="{{ $questionIndex }}" required>
                                                        <option value="">Pilih Tipe Pertanyaan</option>
                                                        @foreach ($typeQuestions as $type)
                                                            <option value="{{ $type->id }}"
                                                                @if ($question->type_question_id == $type->id) selected @endif>
                                                                {{ $type->type_question_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][is_required]"
                                                            id="is_required_{{ $sectionIndex }}_{{ $questionIndex }}"
                                                            value="1" @if ($question->is_required) checked @endif>
                                                        <label class="form-check-label"
                                                            for="is_required_{{ $sectionIndex }}_{{ $questionIndex }}">
                                                            Wajib Diisi
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="options-container"
                                                @if (!in_array($question->type_question_id, [3, 4, 5, 6])) style="display: none;" @endif>
                                                @if ($question->type_question_id == 6)
                                                    {{-- Skala Linier --}}
                                                    <div class="row mb-3 scale-options">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Skala Mulai</label>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <select class="form-control scale-start"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][0][option_body]">
                                                                        <option value="0"
                                                                            @if ($question->options[0]->option_body == '0') selected @endif>
                                                                            0</option>
                                                                        <option value="1"
                                                                            @if ($question->options[0]->option_body == '1') selected @endif>
                                                                            1</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][0][label_angka]"
                                                                        placeholder="Label (opsional)"
                                                                        value="{{ $question->options[0]->label_angka }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Skala Akhir</label>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <select class="form-control scale-end"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][1][option_body]">
                                                                        @for ($i = 2; $i <= 10; $i++)
                                                                            <option value="{{ $i }}"
                                                                                @if ($question->options[1]->option_body == (string) $i) selected @endif>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][1][label_angka]"
                                                                        placeholder="Label (opsional)"
                                                                        value="{{ $question->options[1]->label_angka }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif(in_array($question->type_question_id, [3, 4, 5]))
                                                    {{-- Pilihan Ganda, Kotak Centang, Dropdown --}}
                                                    @foreach ($question->options as $optionIndex => $option)
                                                        <div class="row mb-2 option-row"
                                                            data-option-index="{{ $optionIndex }}">
                                                            @if ($question->type_question_id == 3)
                                                                {{-- Pilihan Ganda --}}
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][option_body]"
                                                                        placeholder="Opsi Jawaban"
                                                                        value="{{ $option->option_body }}" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select class="form-select next-section-select"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][next_section_id]">
                                                                        <option value="">Pilih Section Selanjutnya
                                                                        </option>
                                                                        <option value="submit"
                                                                            @if ($option->next_section_id === null) selected @endif>
                                                                            Kirim Formulir</option>
                                                                        @foreach ($form->sections as $nextIndex => $nextSection)
                                                                            @if ($nextIndex > $sectionIndex)
                                                                                <option value="{{ $nextSection->id }}"
                                                                                    @if ($option->next_section_id == $nextSection->id) selected @endif>
                                                                                    {{ $nextSection->section_name }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @else
                                                                {{-- Kotak Centang, Dropdown --}}
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control"
                                                                        name="sections[{{ $sectionIndex }}][questions][{{ $questionIndex }}][options][{{ $optionIndex }}][option_body]"
                                                                        placeholder="Opsi Jawaban"
                                                                        value="{{ $option->option_body }}" required>
                                                                </div>
                                                            @endif
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger delete-option">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                @if (in_array($question->type_question_id, [3, 4, 5]))
                                                    <div class="mb-3">
                                                        <button type="button" class="btn btn-sm btn-secondary add-option"
                                                            data-section-index="{{ $sectionIndex }}"
                                                            data-question-index="{{ $questionIndex }}">
                                                            <i class="fas fa-plus"></i> Tambah Opsi
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="mt-2 text-end">
                                                <button type="button" class="btn btn-sm btn-danger delete-question">
                                                    <i class="fas fa-trash"></i> Hapus Pertanyaan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-info w-100 add-question"
                                    data-section-index="{{ $sectionIndex }}">
                                    <i class="fas fa-plus"></i> Tambah Pertanyaan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
                <button type="button" class="btn btn-success w-100" id="add-section">
                    <i class="fas fa-plus"></i> Tambah Section Baru
                </button>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <template id="section-template">
        <div class="card mb-4 section-card" data-section-index="__SECTION_INDEX__">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="me-2">Section <span class="section-number">__SECTION_NUMBER__</span></span>
                    <input type="text" class="form-control form-control-sm"
                        name="sections[__SECTION_INDEX__][section_name]" placeholder="Nama Section" required
                        style="max-width: 300px;">
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-link toggle-section">
                        <i class="fas fa-chevron-up"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger delete-section">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="card-body section-body">
                <div class="questions-container">
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-info w-100 add-question"
                        data-section-index="__SECTION_INDEX__">
                        <i class="fas fa-plus"></i> Tambah Pertanyaan
                    </button>
                </div>
            </div>
        </div>
    </template>

    <template id="question-template">
        <div class="card mb-3 question-card" data-question-index="__QUESTION_INDEX__">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][question_body]"
                            placeholder="Tulis pertanyaan di sini" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label class="form-label">Tipe Pertanyaan</label>
                        <select class="form-select question-type"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][type_question_id]"
                            data-section-index="__SECTION_INDEX__" data-question-index="__QUESTION_INDEX__" required>
                            <option value="">Pilih Tipe Pertanyaan</option>
                            @foreach ($typeQuestions as $type)
                                <option value="{{ $type->id }}">{{ $type->type_question_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">&nbsp;</label>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox"
                                name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][is_required]"
                                id="is_required___SECTION_INDEX_____QUESTION_INDEX__" value="1">
                            <label class="form-check-label" for="is_required___SECTION_INDEX_____QUESTION_INDEX__">
                                Wajib Diisi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="options-container" style="display: none;">
                    <div class="mb-3">
                        <button type="button" class="btn btn-sm btn-secondary add-option"
                            data-section-index="__SECTION_INDEX__" data-question-index="__QUESTION_INDEX__">
                            <i class="fas fa-plus"></i> Tambah Opsi
                        </button>
                    </div>
                </div>

                <div class="mt-2 text-end">
                    <button type="button" class="btn btn-sm btn-danger delete-question">
                        <i class="fas fa-trash"></i> Hapus Pertanyaan
                    </button>
                </div>
            </div>
        </div>
    </template>

    <template id="option-template">
        <div class="row mb-2 option-row" data-option-index="__OPTION_INDEX__">
            <div class="col-md-10">
                <input type="text" class="form-control"
                    name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][__OPTION_INDEX__][option_body]"
                    placeholder="Opsi Jawaban" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger delete-option">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </template>

    <template id="option-mc-template">
        <div class="row mb-2 option-row" data-option-index="__OPTION_INDEX__">
            <div class="col-md-6">
                <input type="text" class="form-control"
                    name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][__OPTION_INDEX__][option_body]"
                    placeholder="Opsi Jawaban" required>
            </div>
            <div class="col-md-4">
                <select class="form-select next-section-select"
                    name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][__OPTION_INDEX__][next_section_id]">
                    <option value="">Pilih Section Selanjutnya</option>
                    <option value="submit">Kirim Formulir</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger delete-option">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </template>

    <template id="option-scale-template">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Skala Mulai</label>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <select class="form-control scale-start"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][0][option_body]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][0][label_angka]"
                            placeholder="Label (opsional)">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Skala Akhir</label>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <select class="form-control scale-end"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][1][option_body]">
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected>5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control"
                            name="sections[__SECTION_INDEX__][questions][__QUESTION_INDEX__][options][1][label_angka]"
                            placeholder="Label (opsional)">
                    </div>
                </div>
            </div>
        </div>
    </template>

@endsection
