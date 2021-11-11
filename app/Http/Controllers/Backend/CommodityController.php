<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commodity::All();

        return view('backend.commodities.index', [
            'no'    => 1,
            'commodities' => $commodities,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('backend.commodities.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'name'                 => 'required',
        ])->validate();

        $commodity = Commodity::create([
            'category_id'          => $request->get('category'),
            'name'                 => ucwords($request->get('name')),
            'slug'                 => \Str::slug($request->get('name'), '-'),
        ]);

        return redirect()->route('backend.commodities.index')->with('success', 'Berhasil menambahkan komoditas');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        $categories = Category::all();

        return view('backend.commodities.edit', [
            'commodity'  => $commodity,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'name'          => 'required',
            'is_active'     => 'required',
        ])->validate();

        Commodity::where('id', $id)->update([
            'category_id'   => $request->get('category'),
            'name'          => $request->get('name'),
            'slug'          => \Str::slug($request->get('name'), '-'),
            'is_active'     => $request->get('is_active'),
        ]);

        return redirect()->route('backend.commodities.index')->with('success', 'Berhasil mengubah status komoditas !');
    }

    public function destroy($id)
    {
        $commodity = Commodity::findOrFail($id);
        $commodity->delete();


        return redirect()->route('backend.commodities.index')->with('success', 'Berhasil Menghapus Komoditas ' . $commodity->name . '!');
    }
}
