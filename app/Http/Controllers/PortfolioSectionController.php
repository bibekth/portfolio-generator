<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioSection;
use Illuminate\Http\Request;

class PortfolioSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio = Portfolio::findOrFail($request->portfolio_id);
        $section = PortfolioSection::create([
            'portfolio_id'=>$portfolio->id,'title'=>$request->title,'type'=>'custom','position'=>1
        ]);
        return back()->with(['portfolio'=>$portfolio]);
        // return response()->json($section);
    }

    /**
     * Display the specified resource.
     */
    public function show(PortfolioSection $portfolioSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortfolioSection $portfolioSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioSection $portfolioSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioSection $portfolioSection)
    {
        //
    }
}
