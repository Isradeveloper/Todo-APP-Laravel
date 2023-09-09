<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Todo {
    private $fechaFinalizacion;
    private $nombre;
    private $completado;

    public function __construct($fechaFinalizacion, $nombre, $completado = false) {
        $this->fechaFinalizacion = $fechaFinalizacion;
        $this->nombre = $nombre;
        $this->completado=$completado;
    }

    public function getFechaFinalizacion() {
        return $this->fechaFinalizacion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCompletado() {
        return $this->completado;
    }

    public function setCompletado($boolean) {
        $this->completado=$boolean;
    }

    public function __toString() {
        if ($this->getCompletado() == true) {
            return "Tarea: " . $this->nombre . "\nFecha de finalización: " . $this->fechaFinalizacion . "\n" . "\nCompletado: SI" ;
        } else {
            return "Tarea: " . $this->nombre . "\nFecha de finalización: " . $this->fechaFinalizacion . "\n" . "\nCompletado: NO" ;
        }
    }
}

class HomeController extends Controller
{
    // public function __invoke(){
    //     return "Bienvenido a la página principal";
    // }


    # Mostrar página principal
    public function index(){
        
        // Obtén la lista de tareas desde la sesión
        $lista_tareas = session()->get('tareas', []);

        return view('home/index',
            [
                "lista_tareas" => $lista_tareas,
            ]);
    }

    # Mostrar formularios
    public function create(Request $request){

        // Obtén el arreglo existente de la sesión o crea uno nuevo si no existe
        $tareas = session()->get('tareas', []);

        $fecha_finalizacion = $request->input('fecha_finalizacion');
        $nombre = $request->input('nombre');

        $nueva_tarea = new Todo($fecha_finalizacion, $nombre);

        // Agrega la nueva tarea al arreglo
        $tareas[] = $nueva_tarea;

        // Guarda el arreglo actualizado en la sesión
        session()->put('tareas', $tareas);

        return redirect()->action([HomeController::class, 'index'])->with('success', 'Tarea creada con éxito');

    }

    public function complete(Request $request){

        // Obtén el arreglo existente de la sesión o crea uno nuevo si no existe
        $lista_tareas = session()->get('tareas', []);

        $index = $request->input('index');

        if ($index === null || !array_key_exists($index, $lista_tareas) || $lista_tareas[$index] === null) {
            return response()->json(['message' => 'Índice no encontrado', 'success' => false]);
        }

        $objeto = $lista_tareas[$index];
        $objeto->setCompletado(true);
        $lista_tareas[$index] = $objeto;

        session()->put('tareas', $lista_tareas);

        return response()->json(['message' => 'Tarea completada correctamente', 'index' => $index, 'success' => true]);

    }

    public function pending(Request $request){

        // Obtén el arreglo existente de la sesión o crea uno nuevo si no existe
        $lista_tareas = session()->get('tareas', []);

        $index = $request->input('index');

        if ($index === null || !array_key_exists($index, $lista_tareas) || $lista_tareas[$index] === null) {
            return response()->json(['message' => 'Índice no encontrado', 'success' => false]);
        }

        $objeto = $lista_tareas[$index];
        $objeto->setCompletado(false);
        $lista_tareas[$index] = $objeto;

        session()->put('tareas', $lista_tareas);

        return response()->json(['message' => 'Tarea colocada cómo pendiente correctamente', 'index' => $index, 'success' => true]);

    }

    public function delete(Request $request){

        // Obtén el arreglo existente de la sesión o crea uno nuevo si no existe
        $lista_tareas = session()->get('tareas', []);

        $index = $request->input('index');

        if ($index == null) {
            return response()->json(['message' => 'Índice no encontrado', 'success' => false]);
        }

        unset($lista_tareas[$index]);

        session()->put('tareas', $lista_tareas);

        return response()->json(['message' => 'Tarea eliminada correctamente', 'index' => $index, 'success' => true]);

    }


    // # Mostrar algo en particular
    // public function show($pagina){
    //     return "Bienvenido a $pagina";
    // }
}
