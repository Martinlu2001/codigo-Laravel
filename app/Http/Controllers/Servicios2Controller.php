<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Http\Requests\CreateServicioRequest;
//use DB;

class Servicios2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function  _construct(){
        //$this->middleware('auth')->only('create', 'edit');
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //$servicios = DB::table('servicios')->get();
        //$servicios = Servicio::get();
          $servicios = Servicio::latest()->paginate(2);
        

        /*$servicios = DB::table('servicios')->save();
        $servicios = DB::table('servicios')->update();
        $servicios = DB::table('servicios')->delete();*/
        /*$servicios = [
            ['titulo' => 'Mantenimiento'],
            ['titulo' => 'Afinamiento'],
            ['titulo' => 'Cambio de aceite'],
            ['titulo' => 'Lavado tipo salon'],
            
        ];*/
        return view('servicios', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('create');
        return view('create',[
            'servicio' => new Servicio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Request $request
     */
    public function store(CreateServicioRequest $request)
    {
        /*$titulo = request('titulo');
        $descripcion = request('descripcion');

        Servicio::create([
            'titulo' => $titulo,
            'descripcion' => $descripcion
        ]);*/
        //Servicio::create(request()->all);
        /*$camposv = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);
        Servicio::create($camposv);*/
        Servicio::create($request->validated());

        //return redirect()->route('servicios.index');
        return redirect()->route('servicios.index')->with('estado', 'El servicio fue creado correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //return Servicio::find($id);
        return view('show',[
            'servicio' => Servicio::find($id)
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
        return view('edit',[
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Request $request, string 
     * $id
     * 
     */
    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        //
        /*$id->update([
            'titulo' => request('titulo'),
            'descripcion' => request('descripcion')
        ]);*/
        $servicio->update($request->validated());
        //return redirect()->route('servicios.show', $id);
        return redirect()->route('servicios.show', $servicio)->with('estado', 'El servicio fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
        $servicio->delete();
        //return redirect()->route('servicios.index');
        return redirect()->route('servicios.index')->with('estado', 'El servicio fue eliminado correctamente');
    }
}
