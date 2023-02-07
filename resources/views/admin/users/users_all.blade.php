@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users table</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All users</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Profile image</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($users as $id => $user)

                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ (!empty($user->profile_image)) ? url('/upload/admin_images/' . $user->profile_image) : url('upload/no_image.jpg') }}" alt="" style="width: 85px; height: 85px"></td>
                                        @foreach($user->role as $role)
                                            <td>{{ $role->name }}</td>
                                        @endforeach
                                        <td>
                                            <a class="btn btn-info sm" href="{{ route('users.edit', $user->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" href="{{ route('users.delete', $user->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

@endsection
{{--@section('scripts')--}}
{{--    @parent--}}
{{--    @if(session('status') === 'portfolio-added')--}}
{{--        <script>--}}
{{--            toastr.success('Portfolio added')--}}
{{--        </script>--}}
{{--    @endif--}}
{{--    @if(session('status') === 'portfolio-updated')--}}
{{--        <script>--}}
{{--            toastr.success('Portfolio updated')--}}
{{--        </script>--}}
{{--    @endif--}}
{{--    @if(session('status') === 'portfolio-deleted')--}}
{{--        <script>--}}
{{--            toastr.success('Portfolio deleted')--}}
{{--        </script>--}}
{{--    @endif--}}
{{--@endsection--}}
