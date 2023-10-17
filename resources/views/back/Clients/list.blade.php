@extends('back.Mycomponents.base')

@section('title','Client | Liste')

@section('content')

<div class="">

    <div class="page_title mb-5">
        <h4> Clients Overview</h4>
        <a href="{{route('Clients.create')}}" class="btn btn-success"> nouveau </a>
    </div>

    <table id="table_client_list" class="table  w-100">
        <thead>
            <tr>
                <th> Id </th>
                <th> Nom Complet</th>
                <th> email </th>
                <th> mobile </th>
                <th> Adress </th>
                <th> etat </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($clients as $client)
                    <tr class="align-middle">
                        <td> <p class="m-0"> {{$client->id }} </p> </td>
                        <td> 
                            @if (isset($client->avatar))
                                <img class="mini_avatar me-2" src="{{asset('avatars/uploaded/'.$client->avatar)}}" alt="" style="">
                            @else
                                <img class="mini_avatar me-2" src="{{asset('avatars/imgholder.jpg')}}" alt="" style="">    
                            @endif
                            
                            <a href="{{route('Clients.show',$client->id)}}"> {{$client->prenom}} </a>
                        </td>
                        <td> <p class="m-0"> {{$client->mail}} </p> </td>
                        <td> <p class="m-0"> {{$client->mobil01}} </p> </td>
                        <td> <p class="m-0"> {{$client->adress}} </p> </td>
                        @if ($client->etat == 1)
                            <td> <a href="{{route('Clients.toggle',$client->id)}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                        @else
                            <td> <a href="{{route('Clients.toggle',$client->id)}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                        @endif
                        <td>
                            {{-- <form method="POST" id="assuranceDelete" action="{{route('Clients.destroy',$client->id)}}" hidden> --}}
                            <form method="POST" id="assuranceDelete{{$client->id}}" action="{{route('Clients.destroy',$client->id)}}" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{route('Clients.edit',$client->id)}}" class="btn btn-dark"> Edit </a>
                            <a href="" class="btn btn-danger d-inline-block" onclick="event.preventDefault(); deleteform('assuranceDelete{{$client->id}}')"> <i class="fa fa-times"> </i> delete </a>                        </td>
                    </tr>
            @endforeach

        </tbody>
    </table>

</div>


@endsection