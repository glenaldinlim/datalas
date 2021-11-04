<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Models\Community;
use App\Models\User;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:webmaster|admin');
        $this->middleware('auth');
    }

    // https://farizdotid.com/blog/dokumentasi-api-daerah-indonesia/

    public function getDistrict($idProvince)
    {
        $endPoint = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='. $idProvince;
        $client = new Client();
        $response = $client->request('GET', $endPoint);

        return json_decode($response->getBody(), true)['kota_kabupaten'];
    }

    public function getProvince()
    {
        $endPoint = 'http://dev.farizdotid.com/api/daerahindonesia/provinsi';
        $client = new Client();
        $response = $client->request('GET', $endPoint);

        return json_decode($response->getBody(), true)['provinsi'];
    }

    public function delete($id)
    {
        $community = Community::findOrFail($id);
        try {
            $community->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('backend.communities.index')->with('success', 'Berhasil Menghapus Komunitas ' . $community->name . '!');
    }

    public function edit(Request $request, $id)
    {
        $community = Community::findOrFail($id);
        $validation = \Validator::make($request->all(), [
            'community_name' => 'required|max:100',
            'slug' => 'required',
            'contact' => 'required',
            'contact_phone' => 'required',
            'province' => 'required',
            'origin' => 'required',
            'address' => 'required',
            'is_active' => 'required'
        ])->validate();

        $data = [
            'user_id' => $request->user,
            'name' => $request->community_name,
            'slug' => $request->slug,
            'province_id' => $request->province,
            'origin_id' => $request->origin,
            'address' => $request->address,
            'contact_name' => $request->contact,
            'contact_phone' => $request->contact_phone,
            'is_active' => $request->is_active,
        ];

        try {
            $community->update($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('backend.communities.index')->with('success', 'Berhasil mengubah Komunitas ' . $request->community_name . '!');
    }

    public function renderEditView($id)
    {
        $communityData = Community::findOrFail($id);
        $provinces =  $this->getProvince();
        $users = User::all();
        $districts = $this->getDistrict($communityData->province_id);

        return view('backend.communities.edit', [
            'communityData' => $communityData,
            'users' => $users,
            'provinces' => $provinces,
            'districts' => $districts,
            'idCommunity' => $id
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'community_name' => 'required|max:100',
            'slug' => 'required',
            'contact' => 'required',
            'contact_phone' => 'required',
            'province' => 'required',
            'origin' => 'required',
            'address' => 'required',
            'is_active' => 'required'
        ])->validate();

        try {
            Community::create([
                'user_id' => $request->user,
                'name' => $request->community_name,
                'slug' =>\Str::slug($request->community_name, '-'),
                'province_id' => $request->province,
                'origin_id' => $request->origin,
                'address' => $request->address,
                'contact_name' => $request->contact,
                'contact_phone' => $request->contact_phone,
                'is_active' => $request->is_active,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('backend.communities.index')->with('success', 'Berhasil menambahkan Komunitas baru!');
    }

    public function renderCreateView()
    {
        $provinces =  $this->getProvince();
        $users = User::all();
        return view('backend.communities.create', [
            'users' => $users,
            'provinces' => $provinces
        ]);
    }

    public function index()
    {
        $communities = Community::join('users', 'users.id', 'communities.user_id')
            ->select([
                'communities.*'
            ])
            ->get();

        return view('backend.communities.index', [
            'no' => 1,
            'communities' => $communities
        ]);
    }
}
