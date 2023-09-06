<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // return "Bienvenido a la página principal";
        return view('home/index', ["lista_tareas" => []]);
    }

    # Mostrar formularios
    public function create(Request $request){
        $fecha_finalizacion = $request->input('fecha_finalizacion');
        $nombre = $request->input('nombre');

        $nueva_tarea = new Todo($fecha_finalizacion, $nombre);


        return $nueva_tarea;
    }

    # Mostrar algo en particular
    public function show($pagina){
        return "Bienvenido a $pagina";
    }
}
