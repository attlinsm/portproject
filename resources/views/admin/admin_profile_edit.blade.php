@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="card-title font-size-18">Edit profile page</p><br>

                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{--Поля--}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{ $user->name }}" id="name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" placeholder="{{ $user->email }}" id="email" name="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{--Изображение--}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="profile_image" id="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($user->profile_image)) ? url('/upload/admin_images/' . $user->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update profile">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    $(document).ready(function () {
        $('#image').change(function (e) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
