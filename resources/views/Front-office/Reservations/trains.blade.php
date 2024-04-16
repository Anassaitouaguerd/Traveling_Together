@extends('Front-office.partials.Reservation._tags_html')
@section('content')
    <div class="container">
        <div class="py-5">
            <form action="" method="post" class="p-lg-5  needs-validation" id="add_train_form" novalidate>
                <div class="row gy-3">
                    <div class="col-lg-6 text-start" style="position: relative;">
                        <label for="" class="form-label ms-2" style="color:#80808078;">Nom de train</label>
                        <input class="form-control" type="text" name="nom_train" id="nom_train" placeholder="exemple : train v1.." autocomplete="nope" required>
                        <div class="invalid-feedback ms-2">
                            veillez remplire le nom de train à ajouter.
                        </div>
                        <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst1"></div>
                    </div>
                    <div class="col-lg-6 text-start" style="position: relative;">
                        <label for="" class="form-label ms-2" style="color:#80808078;">La gare</label>
                        <input class="form-control " type="text" name="id_gare" id="id_gare" placeholder="exemple : Gare tanger ville.." autocomplete="false" required>
                        <div class="rounded-bottom" style="background-color:aliceblue;position:absolute;z-index: 1000; width: 94%;max-height:31vh;overflow:auto;" id="cities_rst2"></div>
                        <input type="hidden" value="" name="id_gare" id="id_holder">
                    </div>
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status" required>
                            <option value="" selected>choisissez le status de train à ajouter</option>
                            <option value="1">disponible</option>
                            <option value="2">pas encore disponible</option>
                        </select>
                        <div class="invalid-feedback ms-2">
                            veillez remplire la date de départ.
                        </div>
                    </div>
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">Capacité</label>
                        <input class="form-control" type="number" name="capacite" placeholder="exemple 52 place" required min="1">
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn text-light px-5" style="background-color:var(--aqua);border-radius: 20px;" name="save-train">save</button>
                    </div>
                </div>
            </form>
        </div>

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
                    <th># ID</th>
                    <th>Name </th>
                    <th>Gare</th>
                    <th>Date-Depart</th>
                    <th>Date-Arrivee</th>
                    <th>Prix</th>
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
<button>by ticket </button>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection