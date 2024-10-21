<?php

namespace App\Http\Controllers\admin;

use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class tagController extends Controller
{
    public function index()
    {
        $tags = tag::all();
        return view('admin.tag.index')->with("tags", $tags);
    }

    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tags = new tag();
        $tags->name = $request->name;
        $tags->save();
        return redirect()->route('show_tag');
    }

    public function edit($id)
    {
        $tags = tag::FindOrFail($id);
        return view('admin.tag.edit')->with('tags', $tags);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tags = tag::FindOrFail($id);
        $tags->name = $request->name;
        $tags->save();

        return redirect()->route('show_tag');
    }

    public function delete($id)
    {
        $tags = tag::FindOrFail($id);
        $tags->delete();
        return redirect()->route('show_tag');
    }
}
