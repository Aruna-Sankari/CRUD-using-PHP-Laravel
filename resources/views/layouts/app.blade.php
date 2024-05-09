<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .card {
    max-width: 40em;
    flex-direction: row;
    border:1px solid #c8c8c8;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1); 
            }
            .card img{
    max-width:35%;
    margin:auto;
    padding:0.5em;
    border-radius:10px;
}

            </style>
</head>

<body>
    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a href="/" class="navbar-brand text-light">Laravel CRUD</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
         @if($message = Session::get('success'))
         <div class="alert alert-success alert-dismissible fade show">
            <strong>Success</strong> {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
            @yield('main')
           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>