<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/Profile/profileStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <title>My profile</title>
</head>
<body class="bg-bd">
@yield('content')



<footer class="bg-opacit footer mt-5">
    <div class="container">
        <div class="row p-3 row">
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="/" class="no-decoration">Home</a></li>
                    <li><a href="#" class="no-decoration">About Us</a></li>
                    <li><a href="#" class="no-decoration">Services</a></li>
                    <li><a href="#" class="no-decoration">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>190 salam, Elksiba</p>
                <p>Email: travling@together.com</p>
                <p>Phone: +212697896452</p>
            </div>
        </div>
    </div>
    <div class="text-center py-3">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function selectFile() {
        document.getElementById('inputImage').click();
    }

    document.getElementById('inputImage').addEventListener('change', function() {
        let selectedFile = this.files[0];
        if (selectedFile instanceof Blob) {
            const reader = new FileReader();
            reader.onload = () => {
                let image = document.getElementById("My-image");
                image.src = reader.result;
            };
            reader.readAsDataURL(selectedFile);
        } else {
            console.error('Selected file is not a valid Blob object.');
        }
    });
</script>

</body>
</html>
