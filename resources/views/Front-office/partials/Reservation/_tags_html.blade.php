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

<body>
@yield('content')

</body>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    document.forms.namedItem("add_train_form").addEventListener('submit', function(e) {
        let gare_entred = $("#id_holder").val();
        if (gare_entred == "") {
            e.preventDefault();
            alert("invalid gare identiant");
            return;
        }
        //alert(isGareExist(gare_entred))
        isGareExist(gare_entred, "../handlers/garehandler.php").then(data => {
            if (!data) {
                e.preventDefault();
                alert("invalid gare identiant");
            }
        })

    })
</script>
<script src="../../assets/js/main2.js"></script>

</html>