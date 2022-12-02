<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Articulo;
//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-articulo|crear-articulo|editar-articulol|borrar-articulo')->only('index');
        //$this->middleware('permission:crear-articulo', ['only'=>['create','store']]);
        $this->middleware('permission:ver-articulo', ['only'=>['edit','update']]);
        $this->middleware('permission:editar-articulo', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-articulo', ['only'=>['destroy']]);

    }

     public function index()
    {
        $articulos =  Articulo::paginate(5);
        return view('articulos.index',compact('articulos'));

    }

    public function create()
    {
        return view('articulos.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=> 'required',
            'contenido'=> 'required',
            'autor'=> 'required',
            'comentario',
            'estado',
            'id_usuario',
            'id_revisor',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Articulo::create($input);
        return redirect()->route('publicacion.index')
        // return response()->json($input);
                        ->with('success','Product created successfully.');

        // Articulo::create($request->all());
        // return redirect()->route('articulos.index');
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.show',compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.editar',compact('articulo'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'titulo'=> 'required',
            'contenido'=> 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $articulo->update($input);

        return redirect()->route('articulos.index')
                        ->with('success','Product updated successfully');
        // $articulo->update($request->all());
        // return redirect()->route('articulos.index');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
