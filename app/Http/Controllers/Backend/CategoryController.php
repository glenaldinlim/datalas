<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index',[
            'category'=> Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'name'      => 'required|max:100',
            //'slug'      => 'required|unique:categories',
            //'is_active' => 'required',

        ])->validate();

        $category = Category::create([
            'name'      => $request->name,
            'slug'      => \Str::slug($request->name, '-'),
            //'is_active' => $request->is_active,
        ]);
        return redirect()->route('backend.categories.index')->with('success', 'Berhasil menambahkan Kategori Komoditas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show',[
            'post'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',[
            'category' => $category,
            'categories' => Category::all()
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validation = $request->validate([
            'name'      => 'required|max:100',
        ]);

        Category::where('id',$category->id)->update([
            'name' => $request->get('name'),
            'slug' => \Str::slug($request->get('name'), '-'),
            'is_active' => $request->get('status'),
        ]);
        
        return redirect()->route('backend.categories.index')->with('success', 'Berhasil Update Kategori Komoditas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('backend.categories.index')->with('success','Kategori Komoditas Berhasil di Hapus');
    }

}
