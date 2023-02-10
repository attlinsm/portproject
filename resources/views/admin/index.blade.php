@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                    <div class="page-title-left">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('chat.ask') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> ChatGPT interact field</label>
                                    <textarea class="form-control @error('question') is-invalid @enderror" type="text" name="question"></textarea>
                                    @error('question')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Ask">
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
        @if(session('status') === 'access-denied')
            <script>
                toastr.error('Access denied');
            </script>
        @endif
@endsection
