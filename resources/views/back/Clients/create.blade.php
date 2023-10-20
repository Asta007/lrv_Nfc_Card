@extends('back.Mycomponents.base')

@section('title','Client | Ajout')

@section('content')

    <div class="page_title mb-5 col-sm-11 col-md-8 col-lg-5 mx-auto">
        <h4> Add Clients</h4>
        <a href="{{route('Clients.index')}}" class="badge bg-light btn-link text-dark"> ← back </a>
    </div>

    <form method="POST" action="{{route('Clients.store')}}" class="col-11 col-sm-10 col-md-8 col-lg-5 mx-auto" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-6 form-group text-center w-100 mb-3">
                <label for="avatar mb-2"> <small class="text-muted"> ( click to upload avatar )</small> </label> <br>
                <label for="avatar" style="cursor: pointer">
                    <img id="imgholder" class="imgselecter mt-2" src="{{asset('avatars/imgholder.jpg')}}" alt="an image" class="">
                </label>
                <input type="file" name="avatar" id="avatar" class="form-control" hidden onchange="showPreview(event,'imgholder')">
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nom"> Nom <span class="req"> <span class="req"> * </span> </span> </label>
                    <input type="text" name="nom" id="nom" class="form-control" required> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="prenom"> Prenom <span class="req"> <span class="req"> * </span> </span></label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required> 
                </div>
            </div>

        </div>

        <div class="form-group mt-2">
            <label for="job"> Profession <span class="req"> <span class="req"> * </span> </span> </label>
            <input type="text" name="job" id="job" class="form-control" value="{{old('job')}}" required> 
        </div>

        <div class="form-group mt-2">
            <label for="dateNaiss"> Date De Naissance </label>
            <input type="date" name="dateNaiss" id="dateNaiss" class="form-control"> 
        </div>
        
        <div class="form-group mt-2">
            <label for="mail"> Adress Mail <span class="req"> <span class="req"> * </span> </span> </label>
            <input type="email" name="mail" id="mail" class="form-control" required> 
        </div>
        
        <div class="form-group mt-2">
            <label for="siteWeb"> Site Web </label>
            <input type="url" name="siteWeb" id="siteWeb" class="form-control"> 
        </div>
        
        <div class="row mt-2">
            
            <div class="col-6">
                <div class="form-group">
                    <label for="mobil01"> Mobil Principal <span class="req"> <span class="req"> * </span> </span></label>
                    <input type="phone" name="mobil01" id="mobil01" class="form-control" required> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="mobil02"> Mobil Secondaire </label>
                    <input type="phone" name="mobil02" id="mobil02" class="form-control"> 
                </div>
            </div>

        </div>

        <div class="form-group mt-2">
            <label for="phone">Telephone fixe </label>
            <input type="phone" name="phone" id="phone" class="form-control"> 
        </div>

        <div class="row mt-2">
            
            <div class="col-6">
                <div class="form-group">
                    <label for="ville"> Villes  </label>
                    <input type="text" name="ville" id="ville" class="form-control"> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="adress"> Adress <span class="req"> <span class="req"> * </span> </span> </label>
                    <input type="text" name="adress" id="adress" class="form-control" required> 
                </div>
            </div>

        </div>

        <div class="d-flex mt-3">
            <button type="reset" class="btn btn-outline-success me-3"> Annuler </button>
            <button class="btn btn-success"> Enregistrer </button>
        </div>

    </form>

@endsection