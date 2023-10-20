@extends('back.Mycomponents.base')

@section('title','Client | Detail')

@section('content')

<div class="">

    <div class="page_title mb-5">
        <h4> Detail Client</h4>
        <a href="{{route('Clients.index')}}" class="badge bg-light btn-link text-dark"> ← back </a>
    </div>

    <div class="row" style="align-items: stretch">

        <div class="col-11 col-lg-8 mb-3 mb-sm-0 mx-auto">
            <div class="detail row shadow-medium radius-medium p-3">
        
                <div class="col-12 col-md-3 text-center mb-3 mb-md-0">
                    @if (isset($client->avatar))
                        <img class="detail_avatar d-block d-md-flex mx-auto mb-2 mb-md-0" src="{{asset('avatars/uploaded/'.$client->avatar)}}" alt="" style="" >
                        <a href="{{route('Clients.unlink_avatar',$client->avatar)}}" class="btn btn-dark d-inline-block m-0 mt-md-3"> sup avatar </a>
                    @else
                        <img class="detail_avatar me-2" src="{{asset('avatars/imgholder.jpg')}}" alt="" style="">    
                    @endif
                </div>
        
                <div class="col-12 col-md-9">
                    <table class="table">
                        <tr>
                            <th> Nom Complet </th>
                            <td>
                                {{ $client->nom}} {{ $client->prenom}} <br>
                                <span class="text-muted"> {{ $client->job}} </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <th> email </th>
                            <td> {{ $client->mail}}</td>
                        </tr>
                        
                        <tr>
                            <th> mobile  </th>
                            <td> {{ $client->mobil01}} / {{ $client->mobil02}} </td>
                        </tr>
                        
                        <tr>
                            <th> Adress  </th>
                            <td> {{ $client->ville }} | {{ $client->adress}} </td>
                        </tr>
            
                        <tr>
                            <th> Site Web  </th>
                            <td> {{ $client->siteWeb }} </td>
                        </tr>
                        
            
            
                    </table>
                </div>
            </div>
        </div>

        <div class="col-11 col-lg-4 mx-auto">
            <div class="shadow-medium radius-medium p-3" style="height: 100%">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th> Application </th>
                            <th> Etat  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Sms </td>
                            @if ($client->sms == 1)
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'sms'])}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                            @else
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'sms'])}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                            @endif
                        </tr>
                       
                        <tr>
                            <td> Appel </td>
                            @if ($client->appel == 1)
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'appel'])}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                            @else
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'appel'])}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                            @endif
                        </tr>
                       
                        <tr>
                            <td> Whatsapp </td>
                            @if ($client->whatsapp == 1)
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'whatsapp'])}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                            @else
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'whatsapp'])}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                            @endif
                        </tr>
                       
                        <tr>
                            <td> Telegramm </td>
                            @if ($client->telegram == 1)
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'telegram'])}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                            @else
                                <td> <a href="{{route('Clients.toggle_contact',['id' => $client->id, 'contact' => 'telegram'])}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <div class="comptes mt-4 row">

        <div class="col-11 col-lg-8 p-0 mb-sm-3 mx-auto">
            <div class="shadow-medium radius-medium p-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th> Reseau </th>
                            <th class="d-none d-md-table-cell"> liens  </th>
                            <th> libelle  </th>
                            <th> etat </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
            
                        @foreach ($comptes as $compte)
                            <tr class="align-middle">
                                <td> {{$compte->reseau->libelle}} </a> </td>
                                <td class="d-none d-md-table-cell"> <p class="m-0"> {{$compte->liens}} </p> </td>
                                <td> <p class="m-0"> {{$compte->libelle}} </p> </td>
    
                                @if ($compte->etat == 1)
                                    <td> <a href="{{route('Compte.toggle',$compte->id)}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                                @else
                                    <td> <a href="{{route('Compte.toggle',$compte->id)}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                                @endif
    
                                <td>
                                    <form method="POST" id="compteDelete{{$compte->id}}" action="{{route('Compte.destroy',$compte->id)}}" hidden>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    {{-- <a href="{{route('Compte.edit',$client->id)}}" class="btn btn-dark disabled"> Edit </a> --}}
                                    <a href="" class="btn btn-danger d-inline-block" onclick="event.preventDefault(); deleteform('compteDelete{{$compte->id}}')"> <i class="fa fa-times"> </i> delete </a>                        </td>
                            </tr>
                        @endforeach
            
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-11 col-lg-4 mx-auto">
            <div class="shadow-medium radius-medium p-3">
                <form method="POST" action="{{route('Compte.store')}}" class="p-3">
                    @csrf
                    @method('POST')
            
                    <div class="form-group mt-2">
                        <label for="reseau"> Reseau </label>
                        @php
                            $reseaux = App\Models\Reseau::all();    
                        @endphp
    
                        <select name="reseau_id" id="" class="form-control">
    
                            @foreach ($reseaux as $reseau)
                                <option value="{{$reseau->id}}"> {{$reseau->libelle}} </option>
                            @endforeach
    
                        </select>
                        
                    </div>
            
                    <div class="form-group mt-2">
                        <label for="libelle"> Username du compte </label>
                        <input type="text" name="libelle" id="libelle" class="form-control">
                    </div>
    
                    <div class="form-group mt-2">
                        <label for="lien"> lien </label>
                        <input type="text" name="lien" id="lien" class="form-control" required>
                    </div>
    
                    <input type="text" name="client_id" hidden value="{{$client->id}}">
            
                    <div class="d-flex mt-3">
                        <input type="submit" class="btn btn-success mb-4" value="Enregistrer ">
                    </div>
            
                </form>
            </div>
        </div>

    </div>

</div>


@endsection