<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserLog;
use App\Models\Commodity;
use App\Models\Community;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $community = Community::where('user_id', \Auth::user()->id)->firstOrFail();
        $productions = Production::with(['commodity'])->where('community_id', $community->id)->get();

        return view('frontend.productions.index', [
            'no'            => 1,
            'productions'   => $productions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commodities = Commodity::where('is_active', 1)->get();

        return view('frontend.productions.create', [
            'commodities' => $commodities,
        ]);
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
            'commodity'         => 'required|numeric',
            'year_production'   => 'required|numeric',
            'quartal'           => 'required|in:Q1,Q2,Q3,Q4',
            'stock'             => 'required|numeric'
        ])->validate();

        $community = Community::where('user_id', \Auth::user()->id)->firstOrFail();
        $production = Production::create([
            'community_id'          => $community->id,
            'commodity_id'          => $request->get('commodity'),
            'year_production'       => $request->get('year_production'),
            'quartal'               => $request->get('quartal'),
            'stock'                 => $request->get('stock'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah menambahkan data produksi di komunitas'.$community->name,
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('front.community.productions.index')->with('success', 'Berhasil menambahkan data produksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $production = Production::findOrFail($id);
        $commodities = Commodity::where('is_active', 1)->get();

        return view('frontend.productions.edit', [
            'commodities'   => $commodities,
            'production'    => $production,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'commodity'         => 'required|numeric',
            'year_production'   => 'required|numeric',
            'quartal'           => 'required|in:Q1,Q2,Q3,Q4',
            'stock'             => 'required|numeric'
        ])->validate();

        Production::where('id', $id)->update([
            'commodity_id'          => $request->get('commodity'),
            'year_production'       => $request->get('year_production'),
            'quartal'               => $request->get('quartal'),
            'stock'                 => $request->get('stock'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah data produksi tahun '.$request->get('year_production').'('.$request->get('quartal').')',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('front.community.productions.index')->with('success', 'Berhasil melakukan update Data produksi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $production = Production::findOrFail($id);
            $production->delete();

            UserLog::create([
                'user_id'       => \Auth::user()->id,
                'description'   => 'telah menghapus data produksi tahun '.$production->year_production.'('.$production->quartal.')',
                'ip_address'    => $request->ip(),
                'browser'       => $request->header('User-Agent'),
            ]);

            return redirect()->route('front.community.productions.index')->with('success', 'Berhasil Menghapus data produksi di tahun '.$production->year_production.'('.$production->quartal.') !');
        } catch (\Illuminate\Database\QueryException $err) {
            return redirect()->route('front.community.productions.index')->with('danger','Data Produksi gagal dihapus. Code: SQLSTATE['.$err->getCode().']');
        }
    }
}
