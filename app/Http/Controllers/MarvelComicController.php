<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarvelService;
use App\Models\Comic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MarvelComicController extends Controller
{
    protected $marvel;

    public function __construct(MarvelService $marvel)
    {
        $this->marvel = $marvel;
    }

    public function index(Request $request)
    {
        $query = $request->query('', '');
        $offset = $request->query('offset', 0);

        $response = $this->marvel->getComics($query, $offset);

        $comics = $response['data']['results'] ?? [];
        $total = $response['data']['total'] ?? 0;
//        dump($total);
        $count = $response['data']['count'] ?? 0;
//        dump($count);

        $nextOffset = $offset + $count;

        $userComics = auth()->user()->comics->pluck('title')->toArray();

        return view('marvel.index', compact('comics', 'userComics', 'query', 'offset', 'nextOffset', 'total'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'status' => 'nullable|in:gelezen,wishlist,in_bezit',
            'cover_url' => 'nullable|url',
        ]);

        // Handle Marvel thumbnail download if a cover_url is passed
        if ($request->has('cover_url')) {
            try {
                $imageContents = file_get_contents($request->cover_url);
                $imageName = 'marvel_' . uniqid() . '.jpg';
                $imagePath = 'covers/' . $imageName;

                Storage::disk('public')->put($imagePath, $imageContents);
                $validated['cover_path'] = $imagePath;
            } catch (\Exception $e) {
                dump($e->getMessage());
            }
        }

        // Optional default status
        $validated['status'] = $validated['status'] ?? 'wishlist';

        auth()->user()->comics()->create($validated);

        return response()->json([
            'message' => 'Comic successfully added to your collection.',
            'success' => true,
        ], 201);
    }
}

