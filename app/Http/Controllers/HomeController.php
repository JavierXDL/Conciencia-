<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

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
    public function index(Request $request)
    {
        // return view('home');
        $search = $request->search;
        $articulos = Articulo::where('titulo', 'LIKE', "%{$search}%")
            ->orWhere('autor', 'LIKE', "%{$search}%")
            ->latest('id')
            ->paginate(9);
        $data = [
            'articulos' => $articulos,
            'search' => $search,
        ];
        return view('home', $data);
    }
    public function show(){

    }
}
