document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const body = document.body;
    const icon = themeToggleBtn.querySelector('i');
    const searchInput = document.getElementById('search-input');
    const surahItems = document.querySelectorAll('.surah-item');

    // Cek dan atur tema yang disimpan di localStorage
    if (localStorage.getItem('theme') === 'light') {
        body.classList.remove('dark-theme');
        body.classList.add('light-theme');
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }

    // Toggle tema
    themeToggleBtn.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
        body.classList.toggle('light-theme');

        // Ubah ikon dan simpan preferensi tema di localStorage
        if (body.classList.contains('light-theme')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'light');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'dark');
        }
    });

    // Pencarian Surah
    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim(); // Input pencarian dalam huruf kecil

        let foundAny = false; // Untuk memeriksa apakah ada surah yang cocok dengan pencarian

        surahItems.forEach(function (item) {
            const surahName = item.getAttribute('data-nama-latin').toLowerCase(); // Ambil nama Latin Surah dan ubah ke huruf kecil
            
            // Tampilkan item jika sesuai dengan input pencarian
            if (surahName.includes(query)) {
                item.classList.add('hide-number'); // Tambahkan kelas untuk menyembunyikan nomor
                foundAny = true; // Setel ke true jika ada yang cocok
            } else {
                item.style.display = 'none'; // Sembunyikan Surah jika tidak cocok
                item.classList.remove('hide-number'); // Kembalikan nomor jika surah tidak cocok
            }
        });

        // Jika input kosong, tampilkan semua item dengan nomor
        if (query === "") {
            surahItems.forEach(function (item) {
                item.style.display = 'flex'; // Tampilkan semua surah
                item.classList.remove('hide-number'); // Tampilkan kembali nomor surah
            });
        }

        // Jika tidak ada yang cocok, bisa tampilkan pesan atau handling khusus
        if (!foundAny && query !== "") {
            console.log("Tidak ada surah yang cocok"); // Ini bisa diganti dengan pesan di UI jika diperlukan
        }
    });
});
