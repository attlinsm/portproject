@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Change password page</p><br>

                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error }}</p>
                                @endforeach
                            @endif

                            <form method="POST" action="{{ route('update.password') }}">
                                @csrf
                                {{--Поля--}}
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="oldpassword" name="oldpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="newpassword" name="newpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Change password">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
