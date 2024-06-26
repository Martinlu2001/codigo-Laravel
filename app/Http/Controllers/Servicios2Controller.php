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

        return redirect()->route('servicios.index');
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
    public function edit(Servicio $id)
    {
        //
        return view('edit',[
            'servicio' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Request $request, string 
     * $id
     * 
     */
    public function update(Servicio $id, CreateServicioRequest $request)
    {
        //
        /*$id->update([
            'titulo' => request('titulo'),
            'descripcion' => request('descripcion')
        ]);*/
        $id->update($request->validated());
        return redirect()->route('servicios.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
