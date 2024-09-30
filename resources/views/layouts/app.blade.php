<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quran App')</title>
    <link rel="stylesheet" href="{{ asset('css/surah.css') }}">
</head>
<body>
    <div class="header">
        <h1>Quran App</h1>
    </div>

    <div class="container">
        <div class="surah-details">
            <!-- Surah Title -->
            <h1>{{ $surah['namaLatin'] }}</h1>
            
            <!-- Surah Information -->
            <p>Jumlah Ayat: {{ $surah['jumlahAyat'] }}</p>
            <p>Arti: {{ $surah['arti'] }}</p>
            <p>Tempat Turun: {{ $surah['tempatTurun'] }}</p>
            <p>Deskripsi: {!! $surah['deskripsi'] !!}</p>
            
            <!-- Display each Ayat -->
            <div id="ayat-list">
                @foreach ($surah['ayat'] as $index => $ayat)
                    <div class="ayat" data-index="{{ $index }}">
                        <p class="teks-arab">{{ $ayat['teksArab'] }}</p>
                        <p class="teks-latin">{{ $ayat['teksLatin'] }}</p>
                        <p class="teks-indonesia">{{ $ayat['teksIndonesia'] }}</p>
                        <audio controls data-audio-index="{{ $index }}">
                            <source src="{{ $ayat['audio']['05'] }}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
