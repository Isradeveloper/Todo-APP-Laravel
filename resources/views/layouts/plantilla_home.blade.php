<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body style="min-height: 100vh;">
    @yield('content')
    <footer class="bg-primary d-flex justify-content-center align-items-center mt-5" style="height: 40px !important; position: fixed; bottom: 0; width: 100%;">
        <span class='text-white'>&copy; Isradeveloper | Copyright 2023, All Rights Reserved.</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const urlEliminar = "{{ route('eliminar') }}";
        const urlCompletar = "{{ route('completar') }}";
        const token = "{{ csrf_token() }}"
    </script>   
    <script src="{{ asset('resources/js/index.js') }}"></script>
</body>

</html>
