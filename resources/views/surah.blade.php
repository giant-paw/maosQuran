<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quran App')</title>
</head>
<body>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
        }
    
        .surah-details {
            padding: 20px;
            margin: auto;
            width: 80%;
            max-width: 700px;
        }
    
        .ayat-container {
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            background-color: #1e1e1e;
        }
    
        .ayat-container.highlight {
            background-color: #333333;
        }
    
        .ayat-number {
            font-weight: bold;
        }
    
        .teks-arab {
            font-size: 24px;
            color: #ffeb3b;
        }
    
        .teks-latin, .teks-indonesia {
            margin: 4px 0;
        }
    </style>
    
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

    <script>
        const surah = {
            "namaLatin": "Al-Fatihah",
            "jumlahAyat": 7,
            "arti": "The Opening",
            "ayat": [
                {
                    "nomorAyat": 1,
                    "teksArab": "بِسْمِ اللَّهِ الرَّحْمَـٰنِ الرَّحِيمِ",
                    "teksLatin": "Bismillāhir-raḥmānir-raḥīm.",
                    "teksIndonesia": "In the name of Allah, the Most Gracious, the Most Merciful.",
                    "audio": {
                        "05": "https://equran.nos.wjv-1.neo.id/audio-partial/Misyari-Rasyid-Al-Afasi/001001.mp3"
                    }
                },
                // More ayat here...
            ]
        };
    
        // Display Surah details
        document.getElementById('surah-title').innerText = surah.namaLatin;
        document.getElementById('surah-ayat-count').innerText = `Number of Ayat: ${surah.jumlahAyat}`;
        document.getElementById('surah-meaning').innerText = `Meaning: ${surah.arti}`;
    
        // Display Ayat
        const ayatList = document.getElementById('ayat-list');
        surah.ayat.forEach((ayat, index) => {
            const ayatContainer = document.createElement('div');
            ayatContainer.classList.add('ayat-container');
            ayatContainer.innerHTML = `
                <p class="ayat-number">${ayat.nomorAyat}</p>
                <p class="teks-arab">${ayat.teksArab}</p>
                <p class="teks-latin">${ayat.teksLatin}</p>
                <p class="teks-indonesia">${ayat.teksIndonesia}</p>
                <audio id="audio-${index}" src="${ayat.audio['05']}"></audio>
            `;
            ayatList.appendChild(ayatContainer);
        });
    
        // Play Ayat one after another
        const audios = document.querySelectorAll('audio');
        audios.forEach((audio, index) => {
            audio.addEventListener('ended', () => {
                if (index < audios.length - 1) {
                    audios[index + 1].play();
                }
            });
    
            // Highlight current Ayat
            audio.addEventListener('play', () => {
                document.querySelectorAll('.ayat-container').forEach((el) => el.classList.remove('highlight'));
                audio.parentElement.classList.add('highlight');
            });
        });
    
        // Start playing the first Ayat
        audios[0].play();
    
    </script>
</body>
</html>
