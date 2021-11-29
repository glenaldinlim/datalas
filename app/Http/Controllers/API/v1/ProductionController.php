<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductionResource;

class ProductionController extends Controller
{
    public function index()
    {
        $production = Production::join('commodities', 'commodities.id', '=', 'productions.commodity_id')
                                    ->select('commodities.name', \DB::raw('SUM(productions.stock) as stock'))
                                    ->groupBy('commodities.name')
                                    ->get();
        
        return ProductionResource::collection($production);
    }
}
