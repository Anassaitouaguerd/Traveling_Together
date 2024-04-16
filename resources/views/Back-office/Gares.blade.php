@extends('Back-office.layout._tags-html')
@section('title', 'Gestion Trains')
@section('content')
<div class="mt-4 mb-4">
    <div class="col-6 text-end">
        <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Gare
        </button>
    </div>
</div>

{{-- Modal to add new Gare --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gares</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/gare" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Gare Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Gare name">
                    </div>
                    <div class="form-group">
                        <label for="category">Gare Ville</label>
                        <select class="form-select" id="ville" name="ville_id">
                            @foreach ($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                            @endforeach
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
{{-- End modal to add new Gare --}}

<div class="container-fluid py-4 mt-4">
    <div class="row">
        @foreach ($gares as $gare)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h6>Name : </h6>
                    <p class="card-text text-secondary">{{ $gare->name }}</p>
                    <h6>Ville : </h6>
                    <p class="card-text text-xs font-weight-bold">{{ $gare->ville === null ? 'not have city' : $gare->ville->name }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around align-items-center">
                        <button class="btn btn-danger btn-sm float-end" data-bs-toggle="modal" data-bs-target="#modaleDelete{{ $gare->id }}">Delete</button>
                        <button class="btn btn-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#updateGare{{ $gare->id }}">Edit</button>
                    </div>
                </div>
            </div>
        {{-- Modal to update Gare --}}
        <div class="modal fade" id="updateGare{{ $gare->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Gares</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/gare/{{ $gare->id }}" method="POST" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Gare Name</label>
                                <input type="text" value="{{ $gare->name }}" class="form-control" id="name" name="name" placeholder="Enter Gare name">
                            </div>
                            <div class="form-group">
                                <label for="category">Gare ville</label>
                                <select class="form-select" id="ville" name="ville_id">
                                    @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}" {{ $ville->id === $gare->ville_id ? 'selected' : '' }}> {{ $ville->name }} </option>
                                    @endforeach
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
        {{-- End modal to update Gare --}}

        {{-- Modal to delete Gare --}}
        <div class="modal fade" id="modaleDelete{{ $gare->id }}" tabindex="-1" role="dialog" aria-labelledby="modaleDeleteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleDeleteTitle">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Gare?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="/admin/gare/{{ $gare->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End modal to delete Gare --}}
    </div>  
        @endforeach

    </div>
    @endsection
