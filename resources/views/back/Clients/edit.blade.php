@extends('back.Mycomponents.base')

@section('title','Client | Ajout')

@section('content')



    <div class="page_title mb-5 col-5 mx-auto">
        <h4> Modifier Clients</h4>
        <a href="{{route('Clients.index')}}" class="badge bg-light btn-link text-dark"> ← back </a>
    </div>

    <form method="POST" action="{{route('Clients.update',$client->id)}}" class="col-5 mx-auto mt-2">
        @csrf
        @method('PUT')

        <div class="row">
            
            <div class="col-6">
                <div class="form-group">
                    <label for="nom"> Nom </label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{$client->nom}}"> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="prenom"> Prenom </label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{$client->prenom}}"> 
                </div>
            </div>

        </div>

        <div class="form-group mt-2">
            <label for="job"> Profession </label>
            <input type="text" name="job" id="job" class="form-control" value="{{$client->job}}"> 
        </div>

        <div class="form-group mt-2">
            <label for="dateNaiss"> Date De Naissance </label>
            <input type="date" name="dateNaiss" id="dateNaiss" class="form-control" value="{{$client->dateNaiss}}"> 
        </div>
        
        <div class="form-group mt-2">
            <label for="mail"> Adress Mail </label>
            <input type="email" name="mail" id="mail" class="form-control" value="{{$client->mail}}">
        </div>
        
        <div class="form-group mt-2">
            <label for="siteWeb"> Site Web </label>
            <input type="url" name="siteWeb" id="siteWeb" class="form-control" value="{{$client->siteWeb}}"> 
        </div>
        
        <div class="row mt-2">
            
            <div class="col-6">
                <div class="form-group">
                    <label for="mobil01"> Mobil 01 </label>
                    <input type="phone" name="mobil01" id="mobil01" class="form-control" value="{{$client->mobil01}}"> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="mobil02"> Mobil 02 </label>
                    <input type="phone" name="mobil02" id="mobil02" class="form-control" value="{{$client->mobil02}}"> 
                </div>
            </div>

        </div>

        <div class="form-group mt-2">
            <label for="phone">Telephone fixe </label>
            <input type="phone" name="phone" id="phone" class="form-control" value="{{$client->phone}}"> 
        </div>

        <div class="row mt-2">
            
            <div class="col-6">
                <div class="form-group">
                    <label for="ville"> Villes  </label>
                    <input type="text" name="ville" id="ville" class="form-control" value="{{$client->ville}}"> 
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="adress"> Adress </label>
                    <input type="text" name="adress" id="adress" class="form-control" value="{{$client->adress}}"> 
                </div>
            </div>

        </div>

        <div class="d-flex mt-3">
            <a href="{{route('Clients.destroy',$client->id)}}" class="btn btn-danger me-2"> Supprimer </a>
            <button class="btn btn-success"> Mettre a jour </button>
        </div>

    </form>

@endsection