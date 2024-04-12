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
                                                <form action="/admin/Voyage" method="POST" class="mt-4"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="prix">Voyage Prix</label>
                                                        <input type="number" class="form-control" id="prix"
                                                            name="prix" placeholder="Enter Voyage Prix">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Gare - Depart</label>
                                                        <select id="gare-depart" class="form-control" name="gare_depart" >
                                                            @foreach ($allGares as $gare)
                                                                <option value="{{ $gare->id }}">
                                                                    {{ $gare->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Gare - arrivee</label>
                                                        <select id="gare-arrivee" class="form-control" name="gare_arrivee">
                                                            @foreach ($allGares as $gare)
                                                            <option value="{{ $gare->id }}">
                                                                {{ $gare->name }}</option>
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
                                {{-- end madale add new categoris --}}
                                <div class="card-body p-3">
                                    @if (session()->has('successRole'))
                                        <div class="rounded-3 w-70 text-center bg-body-secondary p-1 ms-7"
                                            x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show">
                                            <h5 class="text-body text-bolder"> {{ session('successRole') }} </h5>
                                        </div>
                                    @endif
                                    <div class="card-body pt-4 p-3">
                                        <ul class="list-group">
                                            @foreach ($AllVoyages as $voyage)
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-center p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <h5 class="ms-4 mb-3 text-sm"></h5>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <button class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modaleDelete">
                                                            <i class="far fa-trash-alt me-2"></i>Delete
                                                        </button>
                                                            <button class="btn btn-link text-dark px-3 mb-0"  data-bs-toggle="modal"
                                                            data-bs-target="#updateVoyage">
                                                                <i
                                                                    class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
                                                        </button>
                                                    </div>
                                                    {{-- modal to update Voyage --}}

                                                        <div class="modal fade" id="updateVoyage" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Voyages</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/admin/Voyage" method="POST" class="mt-4"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="name">Voyage Name</label>
                                                                            <input type="text" value="" class="form-control"
                                                                                id="name" name="name" placeholder="Enter Voyage name">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Gare - Depart</label>
                                                                            <select id="gare-depart" class="form-control" name="permission[]" >
                                                                                {{-- <option value="{{$voyage->gare}}"></option> --}}
                                                                                @foreach ($allPermissions as $permission)
                                                                                    <option value="{{ $permission->id }}">
                                                                                        {{ $permission->permissions }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Gare - arrivee</label>
                                                                            <select id="gare-arrivee" class="form-control" name="permission[]">
                                                                                @foreach ($allPermissions as $permission)
                                                                                    <option value="{{ $permission->id }}">
                                                                                        {{ $permission->permissions }}</option>
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
                                                    {{-- end madale update Voyage --}}
                                                    {{-- modal to delete role --}}

                                                    <div class="modal fade" id="modaleDelete"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="modaleDeleteTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modaleDeleteTitle">
                                                                        Confirm Deletion</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this role?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="/SuperAdmin/deleteRole"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden"
                                                                            value=""
                                                                            name="id">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal to delete categories --}}


                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection