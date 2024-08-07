<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Events\ServicioSaved;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

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
          //$servicios = Servicio::latest()->paginate(2);
        

        /*$servicios = DB::table('servicios')->save();
        $servicios = DB::table('servicios')->update();
        $servicios = DB::table('servicios')->delete();*/
        /*$servicios = [
            ['titulo' => 'Mantenimiento'],
            ['titulo' => 'Afinamiento'],
            ['titulo' => 'Cambio de aceite'],
            ['titulo' => 'Lavado tipo salon'],
            
        ];*/
        //return view('servicios', compact('servicios'));
        return view('servicios', [
            'servicios' => Servicio::with('category')->latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('create');
        return view('create',[
            'servicio' => new Servicio,
            'categories' => Category::pluck('name', 'id')
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
        //Servicio::create($request->validated());
        $servicio = new Servicio($request->validated());
        $servicio->image = $request->file('image')->store('images');
        $servicio->save();

        $manager = new ImageManager(new Driver());
        $image = $manager->read(Storage::get($servicio->image))       
                ->scale(width: 600)
                ->encode();
        
        Storage::put($servicio->image,(string) $image);
        ServicioSaved::dispatch($servicio);

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
            'servicio' => $servicio,
            'categories' => Category::pluck('name', 'id')
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
        if( $request->hasFile('image')){
            Storage::delete($servicio->image);
            $servicio->fill($request->validated());
            $servicio->image = $request->file('image')->store('images');
            $servicio->save();

            $manager = new ImageManager(new Driver());
            $image = $manager->read(Storage::get($servicio->image))
                ->scale(width: 600)
                ->encode();

            Storage::put($servicio->image,(string) $image);
            ServicioSaved::dispatch($servicio);
        }else{
            $servicio->update(array_filter($request->validated()));
        }
        
        //return redirect()->route('servicios.show', $id);
        return redirect()->route('servicios.show', $servicio)->with('estado', 'El servicio fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        Storage::delete($servicio->image);

        $servicio->delete();
        //return redirect()->route('servicios.index');
        return redirect()->route('servicios.index')->with('estado', 'El servicio fue eliminado correctamente');
    }
}
