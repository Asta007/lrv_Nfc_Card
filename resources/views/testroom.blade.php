<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('libpack/fa-all.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/style.css')}}">

    <title> Testroom </title>
</head>
<body>

    <div class="container mt-5">
        
        <div class="col-md-6 mx-auto">
            <form action="{{route('Testroom.store')}}" method="POST" class="">
            
                @csrf
                @method('POST')

                <h5 class="text-center mb-5"> Etat Civil</h5>

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label for="" class="input-group-text"> Nom complet </label>
                    </div>
                    <input type="text" class="form-control" name="nom" placeholder="nom de famille">
                    <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                </div>
                
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label for="mobil" class="input-group-text"> mobil </label>
                    </div>
                    <input type="text" class="form-control" name="mobil">
                </div>
                
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label for="adress" class="input-group-text"> adress </label>
                    </div>
                    <input type="text" class="form-control" name="adress">
                </div>
                
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label for="web" class="input-group-text"> Website </label>
                    </div>
                    <input type="text" class="form-control" name="web">
                </div>

                <button class="btn btn-success" type="submit"> Submit  </button>
                
            </form>
        </div>

        <div class=" mt-4">
            <a href="{{asset('vcfcards/ababacar-asta-gueye-mbaye.vcf')}}" class="btn btn-dark"> Save Contact </a>
        </div>
    </div>

</body>
</html>