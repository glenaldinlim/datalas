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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:webmaster|admin');
        $this->middleware('auth')->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend.categories.index',[
            'no'            => 1,
            'categories'    => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            'category_name'  => 'required|max:100',
        ])->validate();

        $category = Category::create([
            'name'  => $request->get('category_name'),
            'slug'  => \Str::slug($request->get('category_name'), '-'),
        ]);

        return redirect()->route('backend.categories.index')->with('success', 'Berhasil menambahkan Kategori Komoditas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.categories.edit',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'category_name' => 'required|max:100',
            'status_option' => 'required|boolean',
        ]);

        $category = Category::where('id', $id)->update([
            'name'      => $request->get('category_name'),
            'slug'      => \Str::slug($request->get('category_name'), '-'),
            'is_active' => $request->get('status_option'),
        ]);
        
        return redirect()->route('backend.categories.index')->with('success', 'Berhasil Update Kategori Komoditas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('backend.categories.index')->with('success','Kategori Komoditas Berhasil di Hapus');
        } catch (\Illuminate\Database\QueryException $err) {
            return redirect()->route('backend.categories.index')->with('danger','Kategori komoditas gagal dihapus. Code: SQLSTATE['.$err->getCode().']');
        }
    }
}
