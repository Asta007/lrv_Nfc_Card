@extends('back.Mycomponents.base')

@section('title','Comptes | List')

@section('content')

<div class="">

    <div class="page_title mb-5">
        <h4> Reseau Overview</h4>
        <a href="{{route('Reseau.create')}}" class="btn btn-success"> nouveau </a>
    </div>

    <table class="table  w-100">
        <thead>
            <tr>
                <th> icon </th>
                <th> Reference </th>
                <th> Libellé </th>

                <th> etat </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($reseaux as $reseau)
                    <tr class="align-middle">
                        <td> <img src="{{asset('icons/uploaded/'.$reseau->icon)}}" alt="" width="30px"></td>
                        
                        <td> <a href="#"> {{$reseau->ref}} </a> </td>
                        <td> <p> {{$reseau->libelle}} </p> </td>
                        
                        @if ($reseau->etat == 1)
                            <td> <a href="{{route('Reseau.toggle',$reseau->id)}}" class="d-block"> <i class="fa-solid fa-toggle-on fa-2xl" style="color:green"></i> </a> </td>
                        @else
                            <td> <a href="{{route('Reseau.toggle',$reseau->id)}}" class="d-block"> <i class="fa-solid fa-toggle-off fa-2xl" style="color:gray"></i> </a> </td>
                        @endif
                        <td>
                            <form method="POST" id="reseauDelete{{$reseau->id}}" action="{{route('Reseau.destroy',$reseau->id)}}" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{route('Reseau.edit',$reseau->id)}}" class="btn btn-dark"> Edit </a>
                            <a href="" class="btn btn-danger d-inline-block" onclick="event.preventDefault(); deleteform('reseauDelete{{$reseau->id}}')"> <i class="fa fa-times"> </i> delete </a>                        </td>
                    </tr>
            @endforeach

        </tbody>
    </table>

</div>


@endsection