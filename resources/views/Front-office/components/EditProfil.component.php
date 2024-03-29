<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- ================== END core-css ================== -->
<div class="w-100">
    <div class=" p-5 mt-5">

        <div class="card-header bg-transparent d-flex justify-content-center">
            <div class="position-relative" style="width: fit-content">
                <div style="width: 150px;height:150px;background-image:url(''); background-position:center; border-radius: 50%; background-size: cover;"
                    id="img_holder"></div>
                <button idedit="Edit_" class="rounded-circle border-0 position-absolute" onclick="editPhotoProfil()"
                    style="background-color:#06283d;bottom:10px;right: 20px;padding: 5px;padding-inline: 9px;"><i
                        class="fas fa-light fa-pen text-light"></i></button>
            </div>

        </div>

        <div class=" justify-content-center">
            <form action="../include/handlers/UserHandler.php" method="POST"
                class=" needs-validation card-body= w-100 row g-3" novalidate>
                <input type="hidden" name="id" value="id">

                <div class="col-md-6">
                    <div class="">
                        <label for="">First name</label>
                        <input class="form-control" type="text" name="first_name" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <label for="">Second name</label>
                        <input class="form-control" type="text" name="last_name" value="" required>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="">
                        <label for="">Phone number</label>
                        <input class="form-control" type="tel" name="tel" placeholder="0XXXXXXXXX" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <label for="">Bank number</label>
                        <input class="form-control" type="int" name="bank" value="">
                    </div>
                </div>

                <div class="col-12">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" value="" required>
                </div>

                <div class="col-md-6">
                    <div class="form-outline ">
                        <label class="form-label" for="">Old Password</label>
                        <input type="password" name="password" class="form-control" value="" required />
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-outline ">
                        <label class="form-label" for="">New Password</label>
                        <input type="password" name="newPassword" class="form-control" value="" required />
                    </div>
                </div>




                <div class="d-flex justify-content-end">
                    <div class="card-footer bg-transparent mt-5 me-3">
                        <button type="submit" class="btn btn-danger" name="deleteaccount">Delete account</button>
                    </div>
                    <div class="card-footer bg-transparent mt-5">
                        <button type="submit" class="btn btn-success" name="savechanges">Save changes</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
<!-- ================== BEGIN links ================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/validation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- ================== END links ================== -->


</html>