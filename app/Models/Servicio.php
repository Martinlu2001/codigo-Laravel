<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use DB;

class Servicio extends Model
{
    //protected $fillable = ['titulo', 'descripcion'];
    protected $guarded = [];
    //$servicios = DB::table('servicios')->get();

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
