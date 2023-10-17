<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('libpack/fa-all.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('libpack/style.css')}}">

    <title> Vcard | {{$client->prenom}} {{$client->nom}} </title>
</head>
<body>
    
    <div class="infowrapper col-11 col-sm-8 col-md-6 col-lg-4 mt-5 mx-auto p-2 pb-5">

        <div id="infocontent" class="infocontent">

            @if ($client->etat == 0)

                <div class="topcard">
                    <div class="text-center">
                        <img class="avatar grey-img" src="{{asset('avatars/imgholder.jpg')}}" alt="" class="">
                        {{-- <img class="avatar grey-img" src="{{asset('avatars/uploaded/$client->avatar')}}" alt="" class=""> --}}
                    </div>
                    <div class="col-8 mx-auto pt-4 pb-4">
                        <p class="text-muted text-center"> Ce Contact a été desactivé par l'administrateur  </p>
                    </div>
                </div>

            @else
                
                <div class="topcard">
                    <div class="text-center">
                        {{-- <img class="avatar" src="{{asset('avatars/imgholder.jpg')}}" alt="" class=""> --}}
                        <img class="avatar" src="{{asset('avatars/uploaded/'.$client->avatar)}}" alt="" class="">
                    </div>
                    <div class="text text-center mt-4">
                        <h3 class="name mb-2"> {{$client->prenom}} {{$client->nom}} </h3>
                        <h4 class="num mb-2"> {{$client->mobil01}} </h4>
                        <p class="job mb-2 txt-violet"> {{$client->job}} </p>

                    </div>
                    <div class="mt-4 pb-4 mx-auto d-flex justify-content-center" style="width:70%;">
                        @if ($client->appel == 1 )
                            <a href="tel:{{$client->mobil01}}" class="d-inline-block social-link-icon bg-violet me-2 ms-2" style=""> 
                                {{-- <i class="fa-brands fa-telegram" style="font-size: 50px"> </i> --}}
                                <img src="{{asset('icons/ico_phone.svg')}}" alt="" class="">
                            </a>
                        @endif

                        @if ($client->telegram == 1)
                            <a href="https://t.me/{{$client->mobil01}}" class="social-link-icon d-inline-block me-2 ms-2" style="background-color: #2AABEE"> 
                                <img src="{{asset('icons/ico_telegram.svg')}}" alt="" class="">
                            </a>
                        @endif

                        @if ($client->whatsapp == 1 )
                            {{-- <a href="https://wa.me/{{$client->mobil01}}" class="social-link-icon d-inline-block me-2 ms-2" style="background-color: #60D669">  --}}
                            <a href="https://wa.me/{{$client->mobil01}}" class="social-link-icon d-inline-block me-2 ms-2" style="background-color: #60D669"> 
                                <img src="{{asset('icons/ico_whp.svg')}}" alt="" class="">
                            </a>
                        @endif

                        @if ($client->sms == 1 )
                            <a href="sms:{{$client->mobil01}}" class="social-link-icon d-inline-block bg-violet me-2 ms-2"> 
                                <img src="{{asset('icons/ico_message.svg')}}" alt="" class="">
                            </a>
                        @endif

                    </div>
                </div>

                <div class="savebtn text-center mt-4">
                    <a href="{{asset('vcfcards/'.$client->vcf)}}" class="btn btn-dark">  Enregistrer le Contact </a>
                </div>

                <div class="bottomcard mt-4 p-2">

                    <div class="civilite mt-2">

                        <div class="onerow-info p-2 adress d-flex align-items-center">
                            <div class="me-3"> <i class="fa-solid fa-location-dot fa-lg"></i> </div>
                            <p class="w-100 pb-1 border-bottom m-0">
                                <span class="d-block label"> Adress </span>
                                <span class="d-block value" > {{$client->ville}}, {{$client->adress}} </span>
                            </p>
                        </div>

                        <div class="onerow-info p-2 adress d-flex align-items-center">
                            <div class="me-3"><i class="fa-solid fa-at fa-lg"></i></div>
                            <p class="w-100 pb-1 border-bottom m-0">
                                <span class="d-block label"> Mail </span>
                                <span class="d-block value" > {{$client->mail}} </span>
                            </p>
                        </div>
                        
                        @isset($client->siteWeb)
                            <div class="onerow-info p-2 adress d-flex align-items-center">
                                <div class="me-3"><i class="fa-solid fa-globe fa-lg"></i></div>
                                <p class="w-100 pb-1 border-bottom m-0">
                                    <span class="d-block label"> Site Web </span>
                                    <span class="d-block value" > {{$client->siteWeb}} </span>
                                </p>
                            </div>
                        @endisset

                    </div>

                    {{-- <div class="socials mt-4">

                        <div class="onerow-info p-2 adress d-flex align-items-center">
                            <div class="me-3"><i class="fa-brands fa-instagram fa-lg"></i></div>
                            <a href="#" class="w-100 pb-1 border-bottom m-0 tdn">
                                <span class="d-block label"> Instagramm </span>
                                <span class="d-block value" > Bah-Fatima </span>
                            </a>
                            <div class="me-3"><i class="fa-solid fa-arrow-right fa-lg"></i></div>
                        </div>
                    
                        <div class="onerow-info p-2 adress d-flex align-items-center">
                            <div class="me-3"><i class="fa-brands fa-facebook fa-lg"></i></div>
                            <a href="#" class="w-100 pb-1 border-bottom m-0 tdn">
                                <span class="d-block label"> Facebook </span>
                                <span class="d-block value" > Fatima.Cisokho </span>
                            </a>
                        </div>
                    
                        <div class="onerow-info p-2 adress d-flex align-items-center">
                            <div class="me-3"><i class="fa-brands fa-twitter fa-lg"></i></div>
                            <a href="#" class="w-100 pb-1 border-bottom m-0 tdn">
                                <span class="d-block label"> Twitter </span>
                                <span class="d-block value" > Tima@Fatou </span>
                            </a>
                        </div>

                    </div> --}}
                    
                    <div class="loop mt-4">

                        @foreach ($comptes as $compte)
                            
                        @if ($compte->etat == 1)
                            <div class="onerow-info p-2 adress d-flex align-items-center">
                                {{-- <div class="me-3"><i class="fa-brands fa-instagram fa-lg"></i></div> --}}
                                <div class="me-3">
                                    <img src="{{asset('icons/uploaded/'.$compte->reseau->icon)}}" style="width: 20px">
                                </div>
                                <a href="{{$compte->liens}}" target="_blank" class="w-100 pb-1 border-bottom m-0 tdn">
                                    <span class="d-block label">  {{$compte->reseau->libelle}} </span>
                                    <span class="d-block value">{{$compte->libelle}} </span>
                                </a>
                                <div class="me-3"><i class="fa-solid fa-arrow-right fa-lg"></i></div>
                            </div>
                        @endif

                        @endforeach


                    </div>

                </div>
            
            @endif

        </div>

    </div>

</body>
</html>