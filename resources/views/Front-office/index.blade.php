<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"
    href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" />
    <!--Boostrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>Travling together™</title>
    <style>

    </style>
</head>

<body>
    <div id="homeImg">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient">
                <div class="container-fluid d-flex justify-content-arrond mx-4">
                    <a class="navbar-brand p-0" href="#">
                        <img src="assets/img/logo_travle.png" alt="Youtrain logo">
                    </a>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown d-flex align-items-center me-5 pe-3">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border:none;">
                                      <img src="/assets/img/user.png" class="photo_user" alt="profile">
                                    </button>
                                    <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (session('user_name'))
                                        {{ session('signup') . session('user_name')}} 
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="/My-profile">Profile</a></li>
                                      <li><a class="dropdown-item" href="#">Settings</a></li>
                                      <li><a class="dropdown-item" href="/log-out">Log out</a></li>
                                    </ul>
                                </li>
                                
                        </ul>
                </div>
            </nav>
        </header>
        <section id="home" style="height: 90vh">
            <div class="row h-100">
                <div class="col ">
                    <div class="d-flex justify-content-end ">
                        <div class="d-flex align-items-center justify-content-center p-5 text-light  " style="background-color: #0000003b;height: 90vh">
                            <div class="">
                                <p><span style="background-color: var(--aqua);padding: 10px 15px;border-radius: 20px">Hello Travler,  @if (session('user_name'))
                                    {{ session('user_name')}} 
                                    @endif</span></p>
                                <h3 class="h1">
                                    Réservez online et profitez <br> des meilleurs tarifs !
                                </h3>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="#reservation" class="btn btn-outline-light px-5" style="border-radius: 20px;scroll-behavior: smooth;">
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
                    <div class="rounded-3" id="Parent" onclick="TackeValue(event)" style="display: none;">
                    </div>
                    <div class="col-lg-6 text-start" style="position: relative;">
                        <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination</label>
                        <input class="form-control " type="text" name="gare_distination" id="gare_distination"
                            placeholder="Tanger ville.." autocomplete="false">
                        <div class="rounded-bottom"
                            style="background-color:aliceblue;position:absolute; width: 94%;max-height:31vh;overflow:auto;"
                            id="cities_rst2"></div>
                    </div>
                    <div class="rounded-3" id="Parent2" onclick="TackeValueDest(event)" style="display: none;">
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
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-img" style="background-image: url('assets/img/1.png')"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" style="background-image: url('assets/img/2.png')"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" style="background-image: url('assets/img/3.png')"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const carousel = new bootstrap.Carousel('#carouselExampleIndicators');
    </script>
</body>

<script src="/assets/js/Front-office/main.js"></script>
<script src="assets/js/main2.js"></script>
<script>
    document.forms.namedItem("search-trips").addEventListener('submit',function (e){
        let gare_entred1 = $("#id_ville_gare_depart").val();
        if(gare_entred1==""){
            e.preventDefault();
            alert("invalid gare identiant");
            return;
        }
        //alert(isGareExist(gare_entred))
        isGareExist(gare_entred,"./include/handlers/garehandler.php").then(data=>{
            if(!data){
                e.preventDefault();
                alert("invalid gare identiant");
            }
        })
    })
</script>


</html>