<?php

namespace App\Http\Controllers;

use Ophim\Core\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function like($id)
    {
        $movie = \Ophim\Core\Models\Movie::findOrFail($id);

        $user = auth()->user();

        if ($movie->likes()->where('user_id', $user->id)->exists()) {
            return response()->json([
                'message' => 'Bạn đã like phim này rồi'
            ], 400);
        }

        $movie->likes()->create([
            'user_id' => $user->id
        ]);

        $movie->increment('like_total');

        return response()->json([
            'likes' => $movie->like_total
        ]);
    }
}
