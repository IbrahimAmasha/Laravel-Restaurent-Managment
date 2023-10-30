<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Models\Category;
use App\Models\CategoryMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::with('menus')->all();

        $menus = Menu::all();
        return view('admin.menus.index',compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/menus'), $filename);

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename
        ]);


        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }
        
        return to_route('admin.menus.index')->with('success','Menu added successfully');
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
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        // $x = ::where('menu_id',strval($menu->id));
        $menu_categories = CategoryMenu::where('menu_id', $menu->id)->get();
        $ids = [];
        foreach($menu_categories as $menu_category) 
        {
            array_push($ids,$menu_category->category_id);
        }
         return view('admin.menus.edit',compact('menu','categories','ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/menus'), $filename);
        }
        else 
        {
            $filename = $menu->image;
        }
        
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' =>  $filename,
        ]);

        
        if ($request->has('categories')) {
            // $menu->categories = [];
            $menu->categories()->sync($request->categories);
        }

        return to_route('admin.menus.index')->with('success','Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return to_route('admin.menus.index')->with('danger','Menu deleted successfully');
    }
}
