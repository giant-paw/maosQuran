<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function index() {
        $response = Http::get('https://equran.id/api/v2/surat');
        $surahs = $response->json()['data'];

        return view('index', compact('surahs'));
    }

    public function show($nomor)
    {
        $response = Http::get("https://equran.id/api/v2/surat/{$nomor}");
        $surah = $response->json()['data'];

        return view('surah', compact('surah'));
    }
}
