document.addEventListener("DOMContentLoaded", function () {
    const formSections = document.getElementById("form-sections");

    // Fungsi untuk membuat opsi jawaban dengan dropdown tujuan section
    function createOption() {
        return `
          <div class="flex items-center space-x-2 option">
              <input type="radio" disabled>
              <input type="text" class="form-control border-b w-full focus:outline-none" placeholder="Opsi Baru">
              <select class="form-select text-sm bg-white p-1 rounded border select-section">
                  ${getSectionOptions()}
              </select>
              <button class="text-red-500 text-lg remove-option">&times;</button>
          </div>
      `;
    }

    // Fungsi untuk mengambil daftar section sebagai dropdown tujuan
    function getSectionOptions() {
        const sections = document.querySelectorAll(".section-container");
        let options = '<option value="">Pilih Section Tujuan</option>'; // Default kosong
        sections.forEach((section, index) => {
            options += `<option value="section-${index + 1}">Bagian ${
                index + 1
            }</option>`;
        });
        return options;
    }

    function updateAllSectionDropdowns() {
        document.querySelectorAll(".select-section").forEach((dropdown) => {
            dropdown.innerHTML = getSectionOptions();
        });
    }

    // Event Listener untuk Hapus Section
    formSections.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-section")) {
            e.target.closest(".section-container").remove();
            updateAllSectionDropdowns(); // Update dropdown setelah menghapus section
        }
    });

    // Fungsi untuk menambah pertanyaan baru
    function createQuestion() {
        const question = document.createElement("div");
        question.classList.add(
            "question-container",
            "p-4",
            "rounded-lg",
            "shadow-sm",
            "relative"
        );
        question.innerHTML = `
        <div class="d-flex flex-row gap-2">
            <input type="text" class="form-control focus:outline-none"
              placeholder="Pertanyaan">
          <!--<button class="absolute top-0 right-0 text-red-500 text-lg remove-question">&times;</button>-->
          <div class="d-flex justify-between items-center mt-3" style="width: 50%">
              <select class="form-select text-sm bg-white p-2 rounded border question-type">
                  <option value="multiple-choice">Pilihan Ganda</option>
                  <option value="short-answer">Jawaban Singkat</option>
                  <option value="paragraph">Paragraf</option>
                  <option value="checkbox">Kotak Centang</option>
                  <option value="dropdown">Drop-down</option>
              </select>
          </div>
        </div>
          <div class="answers space-y-2 mt-3">
              ${createOption()}  <!-- Tambahkan opsi awal -->
              <button class="text-blue-500 text-sm add-option">Tambah Opsi</button>
          </div>
      `;
        return question;
    }

    // Fungsi untuk menambah section baru
    function createSection() {
        const section = document.createElement("div");
        section.classList.add(
            "section-container",
            "bg-white",
            "p-6",
            "rounded-lg",
            "shadow-md",
            "relative",
            "w-full",
            "max-w-2xl"
        );
        section.innerHTML = `
          <button class="absolute top-2 right-2 text-red-500 text-lg remove-section">&times;</button>
          <div class="mb-4">
              <input type="text" class="form-control text-lg font-semibold border-b w-full focus:outline-none"
                  placeholder="Bagian Tanpa Judul">
              <input type="text"
                  class="form-control text-sm text-gray-600 border-b w-full mt-1 focus:outline-none"
                  placeholder="Deskripsi (Opsional)">
          </div>
          <div class="questions space-y-4"></div>
          <div class="floating-menu">
              <button class="floating-btn bg-blue-500 hover:bg-blue-600 add-question" title="Tambah Pertanyaan">
                  <i class="bx bx-plus"></i>
              </button>
              <button class="floating-btn bg-blue-500 hover:bg-blue-600 add-section" title="Tambah Section">
                  <i class="bx bx-list-plus"></i>
              </button>
          </div>
      `;
        formSections.appendChild(section);
    }

    // Event Listener untuk Tambah Section (Hanya SATU)
    formSections.addEventListener("click", function (e) {
        if (e.target.closest(".add-section")) {
            createSection();
            updateAllSectionDropdowns(); // Update dropdown setelah menambah section
        }
    });

    // Event Listener untuk Tambah Pertanyaan
    formSections.addEventListener("click", function (e) {
        if (e.target.closest(".add-question")) {
            const section = e.target.closest(".section-container");
            const questionsContainer = section.querySelector(".questions");
            questionsContainer.appendChild(createQuestion());
        }
    });

    // Event Listener untuk Hapus Pertanyaan
    formSections.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-question")) {
            e.target.closest(".question-container").remove();
        }
    });

    // Event Listener untuk Hapus Section
    formSections.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-section")) {
            e.target.closest(".section-container").remove();
        }
    });

    // Event Listener untuk Tambah Opsi Jawaban
    // Event Listener untuk Tambah Opsi Jawaban
    formSections.addEventListener("click", function (e) {
        if (e.target.classList.contains("add-option")) {
            const answersContainer = e.target.parentElement;
            const newOption = document.createElement("div");
            newOption.classList.add(
                "flex",
                "items-center",
                "space-x-2",
                "option"
            );
            newOption.innerHTML = createOption();
            answersContainer.insertBefore(newOption, e.target);
        }
    });

    // Event Listener untuk Hapus Opsi Jawaban
    formSections.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-option")) {
            const optionToRemove = e.target.closest(".option");
            if (optionToRemove) {
                optionToRemove.remove();
            }
        }
    });

    // Event Listener untuk mengubah opsi jawaban sesuai dengan jenis yang dipilih
    formSections.addEventListener("change", function (e) {
        if (e.target.classList.contains("question-type")) {
            const questionContainer = e.target.closest(".question-container");
            const answersContainer =
                questionContainer.querySelector(".answers");

            if (e.target.value === "multiple-choice") {
                // Jika pilihan ganda, tambahkan opsi dengan dropdown
                answersContainer.innerHTML =
                    createOption() +
                    `
                  <button class="text-blue-500 text-sm add-option">Tambah Opsi</button>
              `;
            } else if (e.target.value === "short-answer") {
                // Jika jawaban singkat, hanya tampilkan input
                answersContainer.innerHTML = `
                  <input type="text" class="form-control border-b w-full focus:outline-none"
                      placeholder="Jawaban Singkat">
              `;
            } else if (e.target.value === "paragraph") {
                // Jika paragraf, tampilkan textarea
                answersContainer.innerHTML = `
                  <textarea class="form-control border w-full focus:outline-none"
                      placeholder="Jawaban Panjang"></textarea>
              `;
            } else {
                // Reset jika tipe lain dipilih
                answersContainer.innerHTML = "";
            }
        }
    });
});
