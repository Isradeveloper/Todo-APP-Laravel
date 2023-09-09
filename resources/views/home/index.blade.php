@extends('layouts.plantilla_home')

@section('title', 'Todo - App | Israel Trujillo')

@section('content')
    <div class="container-xl mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Gestor de tareas - Todo App</h1>
            </div>
        </div>
        <form class="row mt-3" method="POST" action="crear">@csrf
            <div class="col-xl-5">
                <label for="fecha_finalizacion" class="form-label">Fecha de finalización: <span
                        class="text-danger">*</span></label>
                <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control">
            </div>
            <div class="col-xl-5">
                <label for="nombre" class="form-label">Nombre de la tarea: <span class="text-danger">*</span></label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese un nombre">
            </div>
            <div class="col-xl-2 d-flex justify-content-start align-items-end">
                <button type="submit" class="btn btn-primary w-100 mt-3 mt-xl-0">Agregar</button>
            </div>
        </form>

        <hr class="border-primary">

        <div class="row">

            <div class="col-12 text-center mb-2">
                <h4 class="text-primary">Tareas</h4>
            </div>

            <div class="col-12">
                <ul class="list-group list-group-flush">

                    @foreach($lista_tareas as $index => $tarea)

                        @if ($tarea->getCompletado() == false)
                            <li class="list-group-item d-flex align-items-center justify-content-between flex-column flex-xl-row mt-3 mt-xl-0">
                                <div class="col-xl-9 col-12 h-100 d-flex flex-xl-row flex-column" style="overflow-wrap: break-word">
                                    <span class="h-100 w-100 text-danger"><span class="fw-bolder">Fecha de finalización: &nbsp;</span>{{$tarea->getFechaFinalizacion()}}</span>
                                    <span class="h-100 w-100 text-dark ms-0 ms-xl-3"><span class="fw-bolder">Descripción de la tarea: &nbsp;</span>{{$tarea->getNombre()}}</span>
                                </div>
                                <div class="col-xl-3 col-12 d-flex justify-content-xl-end justify-content-center align-items-center ps-0 mt-3 mt-xl-0 flex-column flex-xl-row ">
                                    <button class="btn btn-success me-3 w-100 mt-2 mt-xl-0" onclick="onCompletarTarea({{$index}})">Completar</button>
                                    <button class="btn btn-danger me-3 w-100 mt-2 mt-xl-0" onclick="onEliminarTarea({{$index}})">Eliminar</button>
                                </div>
                            </li>
                        @else
                            <li class="list-group-item d-flex align-items-center justify-content-between flex-column flex-xl-row mt-3 mt-xl-0">
                                <div class="col-xl-9 col-12 h-100 d-flex flex-xl-row flex-column" style="overflow-wrap: break-word">
                                    <del><span class="h-100 w-100 text-danger"><span class="fw-bolder">Fecha de finalización: &nbsp;</span>{{$tarea->getFechaFinalizacion()}}</span></del>
                                    <del><span class="h-100 w-100 text-dark ms-0 ms-xl-3"><span class="fw-bolder">Descripción de la tarea: &nbsp;</span>{{$tarea->getNombre()}}</span></del>
                                </div>
                                <div class="col-xl-3 col-12 d-flex justify-content-xl-end justify-content-center align-items-center mt-3 mt-xl-0 flex-column">
                                    <span class="h-100 w-100 text-success fw-bolder text-center">Tarea completada</span>
                                    <button class="btn btn-warning me-3 w-100 mt-2 mt-xl-0 fw-bold" onclick="onPendienteTarea({{$index}})">Colocar Pendiente</button>
                                </div>
                            </li>
                        @endif

                    @endforeach

                </ul>
            </div>

        </div>
    </div>
@endsection
