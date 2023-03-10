@extends('auth.auth')

@section('title', 'LOGIN')
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

                <h4 class="text-muted text-center font-size-18"><b>Sign in</b></h4>

                <div class="p-3">

                    <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" id="email" type="email" name="email" required placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" id="password" type="password" name="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log in</button>
                            </div>
                        </div>

                        <div class="form-group mb-0 row mt-2">
                            <div class="col-sm-7 mt-3">
                                <a href="{{ route('password.request') }}" class="text-muted font-size-15"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 mt-3">
                                <a href="{{ route('register') }}" class="text-muted font-size-15"><i class="mdi mdi-account-circle"></i> Create an account</a>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end -->
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
<!-- end -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
@endsection
