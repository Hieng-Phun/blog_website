<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        $tag = tag::all();
        return view('admin.post.create', ['tag' => $tag, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'thumbnail' => 'required|mimes:png,jpg,jpeg',
                'category_id' => 'required|exists:categories,id'
            ]);
            $fileName = time() . '_' . $request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs(
                'uploads',
                $fileName,
                'public'
            );

            // create posts
            $post = new post();
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thumbnail = $filePath;
            $post->category_id = $request->category_id;
            $post->save();

            // create post_tag
            $post->Tags()->sync($request->tags);
        });


        return redirect()->route('show_post');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = post::FindOrFail($id);
        $category = category::all();
        $tag = tag::all();
        return view('admin.post.edit', ['post' => $posts, 'category' => $category, 'tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'thumbnail' => 'nullable|mimes:png,jpg,jpeg',
                'category_id' => 'required|exists:categories,id'
            ]);

            // update posts
            $post = post::FindOrFail($id);
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;

            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '_' . $request->thumbnail->getClientOriginalName();
                $filePath = $request->file('thumbnail')->storeAs(
                    'uploads',
                    $fileName,
                    'public'
                );
                $post->thumbnail = $filePath;
            }
            $post->save();

            // update post_tag
            $post->Tags()->sync($request->tags);
            DB::commit();
            return redirect()->route('show_post');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
