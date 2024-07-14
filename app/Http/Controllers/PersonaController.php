<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Persona;
class PersonaController extends Controller
{
    public function saveImage(Request $request){
        $persona= new Persona();
        $persona->nombre=$request->nombre;
        

        $image = $request()->file('imagen');
        $file=time().$image->getClientOriginalName();
        Storage::disk('personas')->put($file, file_get_contents($image));

        $persona->nombre=$request->$file;
        $persona->save();


        return response()->json(['message' => 'Datos guardados correctamente']);
    }
}
