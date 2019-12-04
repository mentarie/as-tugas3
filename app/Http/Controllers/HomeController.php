<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\DB;

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
        $data = Article::all();
        return view('front.home')->with('article', $data);
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function detail($id)
    {
        $data = DB::table('articles')->where('id', $id)->get();
        $data2 = Category::all();
        return view('front.detail', ['article' => $data, 'data2' => $data2]);
    }
}
