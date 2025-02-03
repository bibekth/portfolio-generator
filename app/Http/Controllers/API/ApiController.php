<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioSection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData(Request $request){
        $portfolio = Portfolio::with('portfolio_section')->findOrFail($request->query('por_id'));
        return response()->json($portfolio, 200);
    }

    public function storeData(Request $request){
        $portfolio = Portfolio::findOrFail($request->por_id);
        // $section = PortfolioSection::create([
        //     'portfolio_id'=>$portfolio->id,'title'=>$request->title,'type'=>'custom','position'=>1
        // ]);
        $section = PortfolioSection::create([
            'portfolio_id' => $portfolio->id,
            'title' => $request->title,
            'type' => 'custom',
            'position' => 1,
            'slug' => \Illuminate\Support\Str::slug($request->title)
        ]);
        return response()->json($section, 200);
    }
    public function deleteData(Request $request){
        $section = PortfolioSection::findOrFail($request->query('section_id'));
        $section->delete();
        return response()->json('success',200);
    }
}
