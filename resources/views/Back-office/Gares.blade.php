@extends('Back-office.layout._tags-html')
@section('title' , 'Grstion Trains')
@section('content')
        <div class="mt-4 mb-4">
            <div class="col-6 text-end">
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Product
                </button>
            </div>
        </div>
        </div>
        {{-- modal to add new product --}}

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Trains</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/Trains" method="POST" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Train Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Train name">
                            </div>
                            <div class="form-group">
                                <label for="category">Train Voyage</label>
                                <select class="form-select" id="category" name="category">
                                    <option value=""></option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end madale add new Train --}}
        </div>

        <div class="container-fluid py-4 mt-4">
            <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <h6>Nmae : </h6>
                                <p class="card-text text-secondary"></p>
                                <h6>Prix : </h6>
                                <p class="card-text text-xs font-weight-bold"></p>
                                <h6>Gare depart: </h6>
                                <p class="ms-2"></p>
                                <h6>Gare arrivee: </h6>
                                <p class="ms-2"></p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-around align-items-center">
                                    <button class="btn btn-danger btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#modaleDelete">delet</button>
                                    <button class="btn btn-secondary btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#updateTrain">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal to update Train --}}

                    <div class="modal fade" id="updateTrain" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Trains</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/Trains" method="POST" class="mt-4"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Gare Name</label>
                                            <input type="text" value="" class="form-control"
                                                id="name" name="name" placeholder="Enter Gare name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Date - Depart</label>
                                            <input type="datetime-local" value="" class="form-control"
                                                id="name" name="date_depart" placeholder="Enter Gare date depart">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Date - Arrivee</label>
                                            <input type="datetime-local" value="" class="form-control"
                                                id="name" name="date_arrivee" placeholder="Enter Gare date arrivee">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Gare ville</label>
                                            <select id="select-state" name="ville_id" multiple placeholder="Select a Ville..." onclick="getAllCitys(event)" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end madale update Train --}}
                    {{-- modal to delete categories --}}

                    <div class="modal fade" id="modaleDelete" tabindex="-1" role="dialog"
                        aria-labelledby="modaleDeleteTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modaleDeleteTitle">
                                        Confirm Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Gare?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <form action="/admin/Trains" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="" name="id">
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal to delete categories --}}
            </div>
@endsection