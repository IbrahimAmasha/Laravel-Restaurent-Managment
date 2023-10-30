<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/categories'), $filename);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'public/categories/' . $filename
        ]);

        return to_route('admin.categories.index')->with('success','Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category =  Category::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $filename = $category->image;

        if($request->hasFile('image')) 
        {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/categories'), $filename);
        }

        $category->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => 'public/categories/' . $filename,
        ]);

        return to_route('admin.categories.index')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->menus()->detach();
        $category->delete();
        return to_route('admin.categories.index')->with('danger','category deleted successfully');
    }
}
