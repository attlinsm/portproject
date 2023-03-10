@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Change password</p><br>

                            <form method="POST" action="{{ route('passwords.update') }}">
                                @csrf
                                {{--Поля--}}
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('oldpassword') is-invalid @enderror" type="password" id="oldpassword" name="oldpassword">
                                        @error('oldpassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('newpassword') is-invalid @enderror" type="password" id="password" name="password">
                                        @error('newpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation">
                                        @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

@section('scripts')
    @parent
    @if(session('status') === 'password-updated')
        <script>
            toastr.success('Password updated')
        </script>
    @endif
@endsection
