@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content">
        <div class="row mb-4">
            <div class="col">
                <br />
                <h1>Buat Tracer Study Baru</h1>
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

        <form action="/admin/tracer-study/create" method="POST" id="formTracer">
            @csrf
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul_form" class="form-label">Judul Form</label>
                        <input type="text" class="form-control" id="judul_form" name="judul_form" required
                            value="{{ old('judul_form') }}" placeholder="Masukkan Judul form...">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_form" class="form-label">Deskripsi Form (Opsional)</label>
                        <textarea class="form-control" id="deskripsi_form" name="deskripsi_form" rows="3"
                            placeholder="Masukkan deskripsi form...">{{ old('deskripsi_form') }} </textarea>
                    </div>
                </div>
            </div>

            <div id="sections-container">
            </div>

            <div class="mb-4">
                <button type="button" class="btn btn-success w-100" id="add-section">
                    <i class="fas fa-plus"></i> Tambah Section Baru
                </button>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary" style="margin-bottom: 100px">Simpan Tracer Study</button>
            </div>
        </form>
    </div>

    <template id="section-template">
        <div class="card mb-4 section-card" data-section-index="__SECTION_INDEX__">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    {{-- <span class="me-2" style="font-size: 20px; font-weight: bold;">
                        Section <span class="section-number"
                            style="font-size: 24px; font-weight: bold;">__SECTION_NUMBER__</span>
                    </span> --}}
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
                    <button type="button" class="btn btn-info w-100 add-question" data-section-index="__SECTION_INDEX__">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('Script is running');

            let sectionIndex = 0;

            // Add Section
            $('#add-section').click(function() {
                const sectionNumber = sectionIndex + 1;
                const sectionTemplate = $('#section-template').html()
                    .replace(/__SECTION_INDEX__/g, sectionIndex)
                    .replace(/__SECTION_NUMBER__/g, sectionNumber);

                $('#sections-container').append(sectionTemplate);

                // Get the newly added section
                const $newSection = $('.section-card').last();

                // Check if the new section is in view
                const sectionBottom = $newSection.offset().top + $newSection.outerHeight();
                const mainContent = $('#main-content'); // Target div yang akan discroll
                const mainContentScrollTop = mainContent.scrollTop();
                const mainContentHeight = mainContent.height();
                const mainContentBottom = mainContentScrollTop + mainContentHeight;

                // Only scroll if the section isn't fully visible
                if (sectionBottom > mainContentBottom) {
                    // Scroll just enough to show the section, keeping context
                    mainContent.animate({
                        scrollTop: mainContentScrollTop + (sectionBottom - mainContentBottom) + 50
                    }, 300);
                }
                sectionIndex++;
            });

            $(document).on('click', '.delete-section', function() {
                Swal.fire({
                    title: 'Yakin ingin menghapus section ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('.section-card').remove();
                        updateSectionNumbers();
                        updateAllSectionDropdowns();
                        Swal.fire(
                            'Dihapus!',
                            'Section ini telah dihapus.',
                            'success'
                        );
                    }
                });
            });

            function updateAllSectionDropdowns() {
                $('.section-card').each(function() {
                    const sectionIndex = $(this).data('section-index');
                    updateAvailableSections(sectionIndex);
                });
            }


            // Toggle Section (minimize/maximize)
            $(document).on('click', '.toggle-section', function() {
                const $icon = $(this).find('i');
                const $sectionBody = $(this).closest('.section-card').find('.section-body');

                $sectionBody.slideToggle();
                $icon.toggleClass('fa-chevron-up fa-chevron-down');
            });

            // Update Section Numbers
            function updateSectionNumbers() {
                $('.section-card').each(function(index) {
                    $(this).find('.section-number').text(index + 1);
                });
            }

            // Add Question
            $(document).on('click', '.add-question', function() {
                const sectionIndex = $(this).data('section-index');
                const $questionsContainer = $(this).closest('.section-body').find('.questions-container');
                const questionIndex = $questionsContainer.find('.question-card').length;

                const questionTemplate = $('#question-template').html()
                    .replace(/__SECTION_INDEX__/g, sectionIndex)
                    .replace(/__QUESTION_INDEX__/g, questionIndex);

                $questionsContainer.append(questionTemplate);
            });

            // Delete Question
            $(document).on('click', '.delete-question', function() {
                if (confirm('Yakin ingin menghapus pertanyaan ini?')) {
                    $(this).closest('.question-card').remove();
                }
            });
            // Question Type Change
            $(document).on('change', '.question-type', function() {
                const typeId = parseInt($(this).val());
                const sectionIndex = $(this).data('section-index');
                const questionIndex = $(this).data('question-index');
                const $optionsContainer = $(this).closest('.question-card').find('.options-container');

                // Clear ALL existing options completely
                $optionsContainer.html(typeId !== 6 ? `
        <div class="mb-3">
            <button type="button" class="btn btn-sm btn-secondary add-option"
                data-section-index="${sectionIndex}" data-question-index="${questionIndex}">
                <i class="fas fa-plus"></i> Tambah Opsi
            </button>
        </div>
    ` : '');

                if ([3, 4, 5, 6].includes(typeId)) {
                    $optionsContainer.show();

                    if (typeId === 6) {
                        const scaleTemplate = $('#option-scale-template').html()
                            .replace(/__SECTION_INDEX__/g, sectionIndex)
                            .replace(/__QUESTION_INDEX__/g, questionIndex);

                        $optionsContainer.prepend(scaleTemplate);
                    } else if (typeId === 3) {
                        addMultipleChoiceOption(sectionIndex, questionIndex, 0, $optionsContainer);
                        updateAvailableSections(sectionIndex);
                    } else {
                        addOption(sectionIndex, questionIndex, 0, $optionsContainer);
                    }
                } else {
                    $optionsContainer.hide();
                }
            });

            // Add Option
            $(document).on('click', '.add-option', function() {
                const sectionIndex = $(this).data('section-index');
                const questionIndex = $(this).data('question-index');
                const $optionsContainer = $(this).closest('.options-container');
                const $questionCard = $(this).closest('.question-card');
                const typeId = parseInt($questionCard.find('.question-type').val());
                const optionIndex = $optionsContainer.find('.option-row').length;

                if (typeId === 6) { // Skala Linier already has fixed options
                    return;
                }

                if (typeId === 3) { // Pilihan Ganda
                    addMultipleChoiceOption(sectionIndex, questionIndex, optionIndex, $optionsContainer);
                    // Make sure to update available sections when adding a new option
                    updateAvailableSections(sectionIndex);
                } else {
                    addOption(sectionIndex, questionIndex, optionIndex, $optionsContainer);
                }
            });

            // Add regular option
            function addOption(sectionIndex, questionIndex, optionIndex, $container) {
                const optionTemplate = $('#option-template').html()
                    .replace(/__SECTION_INDEX__/g, sectionIndex)
                    .replace(/__QUESTION_INDEX__/g, questionIndex)
                    .replace(/__OPTION_INDEX__/g, optionIndex);

                $container.find('.add-option').before(optionTemplate);
            }

            // Add multiple choice option with section redirect
            function addMultipleChoiceOption(sectionIndex, questionIndex, optionIndex, $container) {
                const optionTemplate = $('#option-mc-template').html()
                    .replace(/__SECTION_INDEX__/g, sectionIndex)
                    .replace(/__QUESTION_INDEX__/g, questionIndex)
                    .replace(/__OPTION_INDEX__/g, optionIndex);

                $container.find('.add-option').before(optionTemplate);
            }

            // Delete Option
            $(document).on('click', '.delete-option', function() {
                $(this).closest('.option-row').remove();
            });

            // Update Available Sections for Next Section dropdown
            function updateAvailableSections(currentSectionIndex) {
                // Get all sections after this one
                const $nextSectionSelects = $(
                    `.section-card[data-section-index="${currentSectionIndex}"] .next-section-select`);

                // Clear existing options except the default and submit
                $nextSectionSelects.each(function() {
                    const $select = $(this);
                    $select.find('option').not(':first').not('[value="submit"]').remove();

                    // Add sections that come after this one
                    $('.section-card').each(function() {
                        const sectionIndex = parseInt($(this).data('section-index'));
                        const sectionNumber = $(this).find('.section-number')
                            .text(); // Get the current section number
                        const sectionName = $(this).find(
                                'input[name^="sections"][name$="[section_name]"]').val() ||
                            `Section ${sectionNumber}`; // Use section number instead of index+1

                        if (sectionIndex !== currentSectionIndex) {
                            $select.append(
                                `<option value="${sectionIndex}">${sectionName}</option>`);
                        }
                    });
                });
            }

            // Add an initial section when the page loads
            $('#add-section').trigger('click');

            // Form submission validation
            $('#formTracer').on('submit', function(e) {
                if ($('.section-card').length === 0) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Harap tambahkan minimal satu section!',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                }


                // Check each section has at least one question
                let valid = true;
                $('.section-card').each(function() {
                    const sectionName = $(this).find('input[name$="[section_name]"]').val();
                    const questionCount = $(this).find('.question-card').length;

                    if (questionCount === 0) {
                        valid = false;
                        Swal.fire({
                            title: 'Warning!',
                            text: `Section "${sectionName}" tidak memiliki pertanyaan. Harap tambahkan minimal satu pertanyaan.`,
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#d33'
                        });
                        return false;
                    }

                });

                if (!valid) {
                    e.preventDefault();
                }
            });
        });
    </script>

@endsection
