<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(Request $request)
    {
        $posts = post::when($request->category_id, function ($query, $category_id) {
            $query->where('category_id', $category_id);
        })
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->when($request->tag_id, function ($query, $tag_id) {
                $query->whereHas('Tags', function ($sub_query) use ($tag_id) {
                    $sub_query->where('id', $tag_id);
                });
            })
            ->paginate(6)
            ->withQueryString();
        return view('index', ['posts' => $posts]);
    }

    public function article($id)
    {
        $post = post::findOrFail($id);
        return view('article', ['post' => $post]);
    }
}
