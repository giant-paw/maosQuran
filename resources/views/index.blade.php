<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maos Quran</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/surah.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="dark-theme">
    
    @include('components.navbar') 
    
    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Cari Surah...">
        <div class="quick-nav">
            <a href="/surah/67" data-surah="67">Surah Al-Mulk</a>
            <a href="/surah/18" data-surah="18">Surah Al-Kahfi</a>
            <a href="/surah/36" data-surah="36">Surah Yasin</a>
        </div>
    </div>

    <div class="container">
        <div class="surah-grid" id="surah-grid">
            @foreach ($surahs as $surah)
            <div class="surah-item" data-nama-latin="{{ strtolower($surah['namaLatin']) }}">
                <div class="surah-number-icon">
                    <span class="surah-number">{{ $surah['nomor'] }}</span>
                </div>
                <div class="surah-details">
                    <a href="/surah/{{ $surah['nomor'] }}" class="surah-link">
                        <h3>{{ $surah['namaLatin'] }}</h3>
                        <span class="surah-ayat">{{ $surah['jumlahAyat'] }} ayat</span>
                        <p>{{ $surah['arti'] }}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
