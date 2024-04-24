<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/css/style2.css">
    <link rel="stylesheet" href="/assets/css/reservations/ReservationStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body id="bg-body">
{{-- <div class="bg-bl"></div> --}}

    @yield('content')
    <footer class="bg-opacit footer mt-5">
        <div class="container">
            <div class="row p-3 row">
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>190 salam, Elksiba</p>
                    <p>Email: travling@together.com</p>
                    <p>Phone: +212697896452</p>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="social-icons">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <p>&copy; 2024 Your Company. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    const carousel = new bootstrap.Carousel('#carouselExampleIndicators');
</script>
<script src="/assets/js/Front-office/main.js"></script>
{{-- <script src="../../assets/js/main2.js"></script> --}}

</html>
