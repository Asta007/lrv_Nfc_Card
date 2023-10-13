@extends('back.Mycomponents.base')

@section('title','Reseau | Ajout')

@section('content')

    <div class="page_title mb-5 col-5 mx-auto">
        <h4> Edit Reseau</h4>
        <a href="{{route('Reseau.index')}}" class="badge bg-light btn-link text-dark"> ← back </a>
    </div> 

    <form method="POST" action="{{route('Reseau.update',$reseau->id)}}" enctype="multipart/form-data" class="col-5 mx-auto">
        @csrf
        @method('PUT')

        <div class="form-group mt-2">
            <label for="ref"> Reference </label>
            <input type="text" name="ref" id="ref" class="form-control" value={{$reseau->ref}} required> 
        </div>

        <div class="form-group mt-2">
            <label for="libelle"> libellé </label>
            <input type="text" name="libelle" id="libelle" class="form-control" value={{$reseau->libelle}} required>
        </div>

        <div class="input-group mt-4">
            <label for="" class="input-group-text">
                <img src="{{asset('icons/uploaded/'.$reseau->icon)}}" alt="" height="24px" >
            </label>
            <input type="file" name="icon" id="icon" class="form-control"> 
        </div>

        <div class="d-flex mt-3">
            <button class="btn btn-success"> Enregistrer </button>
        </div>

    </form>

@endsection