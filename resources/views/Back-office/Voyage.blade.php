@extends('Back-office.layout._tags-html')
@section('title' , 'Grstion Voyage')
@section('content')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div>
                    <div class="row">
                        <div class=" mb-4">
                            <div class="card mt-4">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0">Gestion Voyages </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn bg-gradient-dark mb-0"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Voyage
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal to add new role --}}

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Voyage</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/voyage" method="POST" class="mt-4" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="prix">Voyage Prix</label>
                                                        <input type="number" class="form-control" id="prix" name="prix" placeholder="Enter Voyage Prix">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Gare - Depart</label>
                                                        <select id="gare-depart" class="form-control" name="gare_depart">
                                                            @foreach ($allGares as $gare)
                                                            <option value="{{ $gare->id }}">
                                                                {{ $gare->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Gare - Arrivee</label>
                                                        <select id="gare-arrivee" class="form-control" name="gare_arrivee">
                                                            @foreach ($allGares as $gare)
                                                            <option value="{{ $gare->id }}">
                                                                {{ $gare->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="date_depart">Date Depart</label>
                                                        <input type="datetime-local" class="form-control" id="date_depart" name="date_depart">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="date_arrivee">Date Arrivee</label>
                                                        <input type="datetime-local" class="form-control" id="date_arrivee" name="date_arrivee">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end madale add new categoris --}}
                                    {{-- @if (session()->has('successRole'))
                                        <div class="rounded-3 w-70 text-center bg-body-secondary p-1 ms-7"
                                            x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show">
                                            <h5 class="text-body text-bolder"> {{ session('successRole') }} </h5>
                                        </div>
                                    @endif --}}
                                    <div class="card-body pt-4 p-3">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col">Voyage Prix</th>
                                                        <th class="col">Gare - Depart</th>
                                                        <th class="col">Gare - Arrivee</th>
                                                        <th class="col">Date Depart</th>
                                                        <th class="col">Date Arrivee</th>
                                                        <th class="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($AllVoyages as $voyage)
                                                    <tr>
                                                        <td>{{ $voyage->prix }}</td>
                                                        <td>{{ $voyage->gare_depart }}</td>
                                                        <td>{{ $voyage->gare_arrivee }}</td>
                                                        <td>{{ $voyage->date_depart }}</td>
                                                        <td>{{ $voyage->date_arrivee }}</td>
                                                        <td>
                                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal"
                                                                data-bs-target="#modaleDelete{{$voyage->id}}">
                                                                <i class="far fa-trash-alt me-2"></i>Delete
                                                            </button>
                                                            <button class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal"
                                                                data-bs-target="#updateVoyage{{$voyage->id}}">
                                                                <i class="fas fa-pencil-alt text-dark me-2"></i>Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                        
                                                    {{-- Modal for updating voyage --}}
                                                    <div class="modal fade" id="updateVoyage{{$voyage->id}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="updateVoyage{{$voyage->id}}Label" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateVoyage{{$voyage->id}}Label">Update Voyage</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/admin/voyage/{{$voyage->id}}" method="POST" class="mt-4"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="prix">Voyage Prix</label>
                                                                            <input type="number" value="{{$voyage->prix}}" class="form-control" id="prix"
                                                                                name="prix" placeholder="Enter Voyage Prix">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Gare - Depart</label>
                                                                            <select id="gare-depart" class="form-control" name="gare_depart">
                                                                                @foreach ($allGares as $gare)
                                                                                <option value="{{$gare->id}}"
                                                                                    {{$gare->id === $voyage->gare_depart ? 'selected' : ''}}>
                                                                                    {{ $gare->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Gare - arrivee</label>
                                                                            <select id="gare-arrivee" class="form-control" name="gare_arrivee">
                                                                                @foreach ($allGares as $gare)
                                                                                <option value="{{$gare->id}}"
                                                                                    {{$gare->id === $voyage->gare_arrivee ? 'selected' : ''}}>
                                                                                    {{ $gare->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_depart">Date Depart</label>
                                                                            <input type="datetime-local" value="{{$voyage->date_depart}}" class="form-control"
                                                                                id="date_depart" name="date_depart">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_arrivee">Date Arrivee</label>
                                                                            <input type="datetime-local" value="{{$voyage->date_arrivee}}" class="form-control"
                                                                                id="date_arrivee" name="date_arrivee">
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
                                        
                                                    {{-- Modal for deleting voyage --}}
                                                    <div class="modal fade" id="modaleDelete{{$voyage->id}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="modaleDelete{{$voyage->id}}Label" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modaleDelete{{$voyage->id}}Label">Confirm Deletion</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this Voyage?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="/admin/voyage/{{$voyage->id}}" method="POST">
                                                                        @csrf
                                                                        @method("DELETE")
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection