<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category as ModelsCategory;


class category extends Controller
{
    public function index()
    {
        $categories = ModelsCategory::all();
        return view('admin.category.index')->with("categories", $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);

        $categories = new ModelsCategory();
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('show_category');
    }

    public function edit($id)
    {
        $categories = ModelsCategory::FindOrFail($id);
        return view('admin.category.edit')->with('categories', $categories);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);
        $categories = ModelsCategory::FindOrFail($id);
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('show_category');
    }

    public function delete($id)
    {
        $categories = ModelsCategory::FindOrFail($id);
        $categories->delete();
        return redirect()->route('show_category');
    }
}
