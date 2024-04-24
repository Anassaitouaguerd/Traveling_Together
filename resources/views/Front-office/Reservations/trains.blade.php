@extends('Front-office.partials.Reservation._tags_html_train')
@section('content')
<section id="reservation" class="pt-5">
    <div class="container p-5 text-center">
        <h3 class="aqua" style="font-weight: bold;">

            Réservez online et profitez
            des meilleurs tarifs !
        </h3>
        <p class="text-grey">Explore the world with us </p>

        <form action="/SearchTrains" method="POST" oninput="Search(event)" class="p-lg-5 needs-validation" autocomplete="off">
            @csrf
            <div class="row gy-3">
                <div class="col-lg-6 text-start mb-5" style="position: relative;">
                    <label for="" class="form-label ms-2" style="color:#80808078;">gare de depart</label>
                    <input class="form-control" type="text" name="gare_depart" id="gare_depart"
                        placeholder="Casa voyageur.." autocomplete="nope" required>
                    <div class="rounded-bottom"
                        style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;"
                        id="cities_rst1"></div>
                </div>
                <div class="rounded-3" id="Parent" onclick="TackeValue(event)">
                </div>
                <div class="col-lg-6 text-start" style="position: relative;">
                    <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination</label>
                    <input class="form-control " type="text" name="gare_distination" id="gare_distination"
                        placeholder="Tanger ville.." autocomplete="false">
                    <div class="rounded-bottom"
                        style="background-color:aliceblue;position:absolute; width: 94%;max-height:31vh;overflow:auto;"
                        id="cities_rst2"></div>
                </div>
                <div class="rounded-3" id="Parent2" onclick="TackeValueDest(event)">
                </div>
                <div class="col-lg-6 text-start">
                    <label for="" class="form-label ms-2" style="color:#80808078;">date de départ</label>
                    <input class="form-control" type="datetime-local" placeholder="date de depart"
                        name="date_depart" required>
                    <div class="invalid-feedback ms-2">
                        veillez remplire la date de départ.
                    </div>
                </div>
                <div class="col-lg-6 text-start">
                    <label for="" class="form-label ms-2" style="color:#80808078;">date de arrivee (optionel)</label>
                    <input class="form-control" type="datetime-local" name="date_arrivee">
                </div>
                <div class="text-start">
                    <button type="submit" class="btn text-light px-5"
                        style="background-color:var(--aqua);border-radius: 20px;">cherchez</button>
                </div>
            </div>
        </form>
    </div>
</section>
    <div class="container">
        <div class=' alert alert-dismissible fade show' role='alert' style='display: none;background-color: #dff9ff' id="train_msg_alert">
            <div class="d-flex justify-content-between">
                <div>
                    <strong class="d-inline">Success !</strong>
                    <p class="d-inline" id='msg-label'></p>
                </div>
                <button type='button' class='close btn btn-transparent p-0' data-bs-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
        </div>
        
        <div class="bg-opacit centred mb-5 mx-auto p-3 d-flex align-items-center rounded-3" style="width: fit-content;">
            <div class="w-100">
                <span><strong>Rolation : </strong></span>
            </div>
            <div class="w-100 ps-2 " style="white-space: nowrap;">
                <span class="text-cl"> {{$point_depart}} - {{$point_distination}}</span>
            </div>
        </div>
        
        <table id="example" class="table table-striped mt-5" style='width:100%'>
            <thead>
                <tr>
                    <th ># ID</th>
                    <th >Name </th>
                    <th >Gare</th>
                    <th >Date-Depart</th>
                    <th >Date-Arrivee</th>
                    <th >Prix</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>            
                @foreach ($trains as $train)
                    
                <tr>
                    <td>
                        {{$train->id}}
                    </td>
                    <td>
                        
                        {{$train->name}}
                    </td>
                    <td>
                        
                        {{$train->gare->name}}
                    </td>
                    <td>
                        @php
                            $departureDate = strtotime($train->voyage->date_depart);
                    
                            if (date('Y-m-d', $departureDate) === date('Y-m-d')) {
                            echo date('H', $departureDate)."h:".date('i', $departureDate)."min";
                        } elseif (date('Y-m', $departureDate) === date('Y-m')) {
                            echo date('d-H', $departureDate)."h:".date('i', $departureDate)."min";
                        } elseif (date('Y', $departureDate) === date('Y')) {
                            echo date('m/d-H', $departureDate)."h:".date('i', $departureDate)."min";
                        } else {
                            echo $train->voyage->date_depart;
                        }
                        @endphp
                    </td>
                    
                    <td>
                        @php
                        $arriveetureDate = strtotime($train->voyage->date_arrivee);
                
                        if (date('Y-m-d', $arriveetureDate) === date('Y-m-d')) {
                            echo date('H', $arriveetureDate)."h:".date('i', $arriveetureDate)."min";
                        } elseif (date('Y-m', $arriveetureDate) === date('Y-m')) {
                            echo date('d-H', $arriveetureDate)."h:".date('i', $arriveetureDate)."min";
                        } elseif (date('Y', $arriveetureDate) === date('Y')) {
                            echo date('m/d-H', $arriveetureDate)."h:".date('i', $arriveetureDate)."min";
                        } else {
                            echo $train->voyage->date_arrivee;
                        }
                    @endphp
                    </td>
                    <td>
                        {{$train->voyage->prix}}
                    </td>
                    <td>
                        <a href="/By-ticket/{{$train->id}}">
                            <button class="bg-opacit border-0 p-2 rounded-2 w-100"><strong>By ticket</strong> </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection