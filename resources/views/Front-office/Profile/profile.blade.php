@extends('Front-office.partials.Profile._tags_html')
@section('content')
    <div class="bg-white container mb-5 mt-5 rounded shadow">
    @extends('Front-office.partials.Home._Header')
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center position-rel text-center p-3 py-5">
                    <div id="profileImage" class="rounded-circle">
                        <img class="mt-5 rounded-circle" id="My-image" width="150px" height="150px" src="{{ $user->image === 'user.png' ? '/assets/img/' . $user->image  : '/Uploads/' . $user->image }}">
                        <div class="divImaginer rounded-circle" onclick="selectFile()">
                            <input type="file" id="fileInput" style="display: none;">
                            <span class="changeImage">Change Image</span>
                        </div>
                    </div>
                    <span class="font-weight-bold">{{$user->name}}</span>
                    <span class="text-black-50">{{$user->email}}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="/admin/user/{{session("user_id")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="file" name="image" id="inputImage" class="input-hidden">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="First Name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" value="{{$user->tel}}" name="tel" class="form-control" placeholder="Enter Phone Number"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter Email"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="Experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="Additional Details" value=""></div>
                </div>
            </div>
        </div>
    </div>
@endsection
   