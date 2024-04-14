<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" />

    <title>Travelign togather™ | Log in</title>

    <!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- ================== END core-css ================== -->
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">


        <div class="container  py-5 px-md-5 text-center  my-5">
            <div class="row  justify-content-center">

                <div class="col-lg-6 mb-5 mb-lg-0 ">
                    <div class="card ">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div>
                                @if (session()->has('success'))
                                <p class="bg-success form-control-lg p-2 rounded-3">
                                    {{session('success')}}
                                </p>
                                @endif
                                @if (session()->has('errore'))
                                <p class="bg-danger form-control-lg p-2 rounded-3">
                                    {{session('errore')}}
                                </p>
                                @endif
                            </div>
                            <form id="login" action="/forgotPass" class="needs-validation py-5" method="POST">
                                @csrf
                                <div>
                                    <div class="d-flex  justify-content-center mb-4">
                                        <img src="./assets/img/logo_travle.png" alt="logo" width="40%">
                                    </div>

                                    <h4 class="fw-bold mb-5 pb-3" style="letter-spacing: 1px;">Enter your email
                                    </h4>
                                </div>
                                <div class="text-start">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        <input type="email" name="email" id="email" class="form-control shesh"
                                            required />
                                        <div class="valid-feedback">
                                            Looks Good!
                                        </div>
                                        <div class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                    </div>

                                </div>


                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light btn-block my-4 w-100">
                                    Forget
                                </button>
                                <div class="d-block">
                                    <p>Not a member? <a class="text-decoration-none" href="/sign-up">Register</a></p>
                                    <p>I' m  member! <a class="text-decoration-none" href="/login">Log-in</a></p>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</body>


<!-- ================== BEGIN links ================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="../../assets/js/validation.js"></script>
<!-- ================== END links ================== -->

</html>