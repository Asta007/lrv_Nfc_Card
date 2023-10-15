<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('libpack/fa-all.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/style.css')}}">

    <title> @yield('title') </title>
</head>
<body>

    <div class="header">

        <div class="bg-light">
            <div class="container text-center">
                <a class="navbar-brand" href="#">NFC</a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                <a class="nav-link" href="{{route('Clients.index')}}"> Clients | </a>
                <a class="nav-link" href="{{route('Reseau.index')}}"> Reseau Sociaux | </a>
                <a class="nav-link" href="#"> Admins</a>
                </div>
            </div>

            </div>
        </nav>

    </div>

    <div class="content mt-5">

        <div class="content container">
            @yield('content')
        </div>
    </div>

    <footer class="mt-5 bg-light p-3">
        <p class="text-muted"> footer </p>
    </footer>

    <script>
        function deleteform(form){
            let conf = confirm("Etes vous certain de vouloire supprimer cet element ?");
            
            if (conf){
                let tmp = document.getElementById(form).submit();
            }
        }

        function showPreview(event,elemt){
        console.log(elemt);
        if(event.target.files.length > 0){
            let image = event.target.files[0];
            let src = URL.createObjectURL(image);
            let preview = document.getElementById(elemt);
            console.log(src);
            console.log(preview);
            preview.src = src
        }
    }
    </script>
    
    
</body>
</html>