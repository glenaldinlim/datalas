<?php

namespace App\Http\Controllers\Backend;

use App\Models\UserLog;
use App\Models\Category;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends Controller
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
        $commodities = Commodity::with('category')->get();

        return view('backend.commodities.index', [
            'no'            => 1,
            'commodities'   => $commodities,
        ]);
    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();

        return view('backend.commodities.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'category'          => 'required|numeric',
            'commodity_name'    => 'required|max:200',
        ])->validate();

        $commodity = Commodity::create([
            'category_id'   => $request->get('category'),
            'name'          => ucwords($request->get('commodity_name')),
            'slug'          => \Str::slug($request->get('commodity_name'), '-'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah menambahkan Komoditas '.$request->get('commodity_name'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.commodities.index')->with('success', 'Berhasil menambahkan komoditas');
    }


    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();

        return view('backend.commodities.edit', [
            'commodity'  => $commodity,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'category'          => 'required|numeric',
            'commodity_name'    => 'required|max:200',
            'status_option'     => 'required|boolean',
        ])->validate();

        Commodity::where('id', $id)->update([
            'category_id'   => $request->get('category'),
            'name'          => $request->get('commodity_name'),
            'slug'          => \Str::slug($request->get('commodity_name'), '-'),
            'is_active'     => $request->get('status_option'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah komoditas '.$request->get('commodity_name'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.commodities.index')->with('success', 'Berhasil mengubah status komoditas !');
    }

    public function destroy($id)
    {
        try {
            $commodity = Commodity::findOrFail($id);
            $commodity->delete();

            UserLog::create([
                'user_id'       => \Auth::user()->id,
                'description'   => 'telah menghapus komoditas '.$commodity->name,
                'ip_address'    => $request->ip(),
                'browser'       => $request->header('User-Agent'),
            ]);

            return redirect()->route('backend.commodities.index')->with('success', 'Berhasil Menghapus Komoditas ' . $commodity->name . '!');
        } catch (\Illuminate\Database\QueryException $err) {
            return redirect()->route('backend.commodities.index')->with('danger','Komoditas gagal dihapus. Code: SQLSTATE['.$err->getCode().']');
        }
    }
}
