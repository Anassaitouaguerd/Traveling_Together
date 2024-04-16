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
        <div class="w-100">
        <div id="successful" class="align-items-center bg-gradient-faded-light-vertical d-flex letter-spacing-2 rounded-3 shadow-md text-center w-25">
            @if (session()->has('success'))
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check2-circle ms-1" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
            <p class="p-3 m-0">
              {{session('success')}}
            </p>
            @endif

        </div>
    </div>

        {{-- modal to add new Train --}}

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
                        <form action="/admin/train" method="POST" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Train Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Train name">
                            </div>
                            <div class="form-group">
                                <label for="category">Train Voyage</label>
                                <select class="form-select" id="Voyage" name="voyage_id">
                                    @foreach ($voyages as $voyage)
                                    <option value="{{$voyage->id}}">{{$voyage->gare_depart}} - {{$voyage->gare_arrivee}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="category">Train Gare</label>
                                <select class="form-select" id="Gare" name="gare_id">
                                    @foreach ($gares as $gare)
                                    <option value="{{$gare->id}}">{{$gare->name}}</option>
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
        {{-- end madale add new Train --}}
        </div>

        <div class="container-fluid py-4 mt-4">
            <div class="row">
                @foreach ($trains as $train)
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <h6 class="card-text text-secondary">Name : {{$train->name}}</h6>
                                <h6 >Voyage : <p class="card-text text-xs pt-2 font-weight-bold">Gare Depart : {{$train->voyage->rolation_gare_depart->name}} <br /><br /> Gare Arrivee : {{$train->voyage->rolation_gare_arrivee->name}}</p></h6>
                                
                                <h6 class="ms-2">Gare: {{$train->gare->name}}</h6>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-around align-items-center">
                                    <button class="btn btn-danger btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#modaleDelete{{$train->id}}">delet</button>
                                    <button class="btn btn-secondary btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#updateTrain{{$train->id}}">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- modal to update Train --}}

                    <div class="modal fade" id="updateTrain{{$train->id}}" tabindex="-1" role="dialog"
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
                                    <form action="/admin/train/{{$train->id}}" method="POST" class="mt-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Train Name</label>
                                            <input type="text" value="{{$train->name}}" class="form-control"
                                                id="name" name="name" placeholder="Enter Train name">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Train Voyage</label>
                                            <select class="form-select" id="Voyage" name="voyage_id">
                                                <option value="{{$train->voyage_id}}">{{$train->voyage->gare_depart}} - {{$train->voyage->gare_arrivee}}</option>
                                                @foreach ($voyages as $voyage)
                                                <option value="{{$voyage->id}}">{{$voyage->gare_depart}} - {{$voyage->gare_arrivee}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            <div class="form-group">
                                                <label for="category">Train Gare</label>
                                            <select class="form-select" id="Gare" name="gare_id">
                                                <option value="{{$train->gare_id}}">{{$train->gare->name}}</option>
                                                @foreach ($gares as $gare)
                                                <option value="{{$gare->id}}">{{$gare->name}}</option>
                                                @endforeach
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
                    {{-- modal to delete Train --}}

                    <div class="modal fade" id="modaleDelete{{$train->id}}" tabindex="-1" role="dialog"
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
                                    <p>Are you sure you want to delete this Train?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <form action="/admin/train/{{$train->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal to delete Train --}}
                @endforeach

            </div>
@endsection