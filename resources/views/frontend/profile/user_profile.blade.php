@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img class="card-img-top" style="border-radius: 50%;" src="{{ (!empty($user -> profile_photo_path)) ? url('upload/user_images/'. $user -> profile_photo_path) : url('upload/no_image.jpg') }}" height="100%" width="100%">
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.password.change') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user() -> name }}</strong> Update your profile</h3>
                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name</label>
                                <input type="text" name="name" value="{{ $user -> name }}" class="form-control" id="name" />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email</label>
                                <input type="text" name="email" value="{{ $user -> email }}" class="form-control" id="email" />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ $user -> phone }}" class="form-control" id="phone" />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="image">User Image</label>
                                <input type="file" name="profile_photo_path" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="address">Address</label>
                                <input type="text" name="address" value="{{ $user -> address }}" class="form-control" id="address" />
                            </div>
                            <div class="form-group">
                               <button class="btn btn-danger" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
