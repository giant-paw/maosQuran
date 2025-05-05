<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maos Quran - {{ $surah['namaLatin'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cascadia+Code:ital,wght@0,200..700;1,200..700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/surah.css') }}">
    <script src="{{ asset('js/surah.js') }}" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    </head>


<body class="dark-theme">
    @include('components.navbar')

    <div class="surah-container">
        <!-- Detail Surah -->
        <div class="surah-details">
            <h1 class="surah-title">{{ $surah['namaLatin'] }}</h1>
            <p class="surah-meaning">Arti: {{ $surah['arti'] }}</p>
            <p class="surah-meta">Jumlah Ayat: {{ $surah['jumlahAyat'] }} | Tempat Turun: {{ $surah['tempatTurun'] }}</p>
        </div>

        <!-- Ayat List -->
        <div id="ayat-list" class="ayat-grid">
            @foreach ($surah['ayat'] as $index => $ayat)
            <div class="ayat-item" data-index="{{ $index }}">
                <p class="ayat-arab">{{ $ayat['teksArab'] }}</p>
                <p class="ayat-latin">{{ $ayat['teksLatin'] }}</p>
                <p class="ayat-translation">{{ $ayat['teksIndonesia'] }}</p>
                <audio controls data-audio-index="{{ $index }}">
                    <source src="{{ $ayat['audio']['05'] }}" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>