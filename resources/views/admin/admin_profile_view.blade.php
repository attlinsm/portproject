@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">

                    <img class="card-img-top img-fluid" src="{{ (!empty($user->profile_image)) ? url('/upload/admin_images/' . $user->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">

                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $user->name }} </h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $user->email }} </h4>
                        <hr>
                        <a href="{{ route('profile.edit') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit profile</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
