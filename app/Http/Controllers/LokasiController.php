<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;


class LokasiController extends Controller
{
    public function provinces()
    {
         $provinces = \Indonesia::allProvinces();
        $jawaMaduraProvinces = collect($provinces)->filter(function ($province) {
        $jawaMaduraProvinces = [
            'JAWA BARAT',

        ];

        return in_array($province['name'], $jawaMaduraProvinces);
    });

    return $jawaMaduraProvinces;
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }
}
