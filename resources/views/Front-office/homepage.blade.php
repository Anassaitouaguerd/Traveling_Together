@extends('Front-office.partials.Home._tags_html_homePage')
@section('content')
    
<div id="homeImg">
    @extends('Front-office.partials.Home._Header')
        <section id="home" style="height: 90vh">
            <div class="row h-100">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="w-100 ">
                        <div class="d-flex align-items-center justify-content-center p-5 text-light  w-100"
                            style="background-color:rgb(60 60 60 / 74%);height:100%">
                            <div class="">
                                <p><span style="background-color: var(--aqua);padding: 10px 15px;border-radius: 20px">Hello
                                        Travler,</span></p>
                                <h3 class="h1">
                                    Réservez online et profitez <br> des meilleurs tarifs !
                                </h3>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="#reservation" class="btn btn-outline-light px-5"
                                        style="border-radius: 20px;scroll-behavior: smooth;">
                                        <i class="bi bi-ticket-perforated"></i>
                                        J'achete mon billet
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- ------------------------------------------ -->
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
    @endsection
