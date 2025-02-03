<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('dashboard.'));
        // return view('home');
    }

    public function dashboard()
    {
        $auth = Auth::user();
        $data['portfolios'] = Portfolio::where(['user_id' => $auth->id])->get();
        return view('dashboard.index', $data);
    }

    public function createPortfolio(Request $request)
    {

        $auth = Auth::user();
        $data['portfolio'] = Portfolio::create(['user_id' => $auth->id, 'title' => $request->title]);
        $staticTitles = ['Home', 'About', 'Service', 'Testimonial', 'Contact'];
        $sections = array_map(function ($title, $index) use ($data) {
            return [
                'portfolio_id' => $data['portfolio']->id,
                'title' => $title,
                'type' => 'custom',
                'position' => $index + 1,
                'slug' => \Illuminate\Support\Str::slug($title),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $staticTitles, array_keys($staticTitles));
        PortfolioSection::insert($sections);

        return back();
    }

    public function editPortfolio($id)
    {
        $auth = Auth::user();
        $data['portfolio'] = Portfolio::findOrFail($id);
        return view('dashboard.create-portfolio', $data);
    }
}
