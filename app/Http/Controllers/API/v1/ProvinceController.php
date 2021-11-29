<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::with('origins')->where('is_active', 1)->get();
        
        return ProvinceResource::collection($provinces);
    }

    public function show($id)
    {
        $province = Province::with('origins')->whereId($id)->firstOrFail();
        
        return new ProvinceResource($province);
    }
}
