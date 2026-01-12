<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::search($request->input('search'))
            ->query(fn (Builder $query) => $query->with('user'))
            ->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }
}
