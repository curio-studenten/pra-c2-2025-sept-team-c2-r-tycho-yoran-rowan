<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);
        $top5 = Manual::all()->sortByDesc('visits')->where('brand_id', $brand_id)->take(5);


        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "top5" => $top5,
        ]);

    }

    public function getBrands($letter) {
        $brands = Brand::where('name', 'LIKE', $letter . "%")->orderBy('name', 'asc')->get();

        return view('pages/brand_list', [
            "brands" => $brands,
            "letter" => $letter,
        ]);
    }
}
