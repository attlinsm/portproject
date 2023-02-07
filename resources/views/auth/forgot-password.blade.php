@extends('auth.auth')

@section('title', 'Forgot password')
@section('content')
<div class="bg-overlay"></div>
<div class="wrapper-page">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">

                <div class="text-center mt-4">
                    <div class="mb-3">
                        <x-application-logo />
                    </div>
                </div>

                <h4 class="text-muted text-center font-size-18"><b>Reset password</b></h4>

                <div class="p-3">

                    <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="form-group mb-3">
                            <div class="col-xs-12">
                                <input class="form-control" id="email" type="email" name="email" required placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group pb-2 text-center row mt-3">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">{{ __('Email password reset link') }}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
<!-- end -->
@endsection
