<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? 'Indonesia';

        $response = Http::get('https://gnews.io/api/v4/search', [
            'q' => $search,
            'lang' => 'en',
            'max' => 10,
            'apikey' => env('GNEWS_API_KEY'),
        ]);

        $articles = [];

        if ($response->successful()) {
            $articles = $response->json()['articles'] ?? [];
        }

        return view('news', compact('articles', 'search'));
    }
}