@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All messages</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Messages</h4>

                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Phone</th>
                                    <th>Was created</th>
                                    @if(auth()->user()->role->first()->name === 'Administrator')
                                        <th>Action</th>
                                    @endif
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($contact as $id => $item)

                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>

                                        @if(auth()->user()->role->first()->name === 'Administrator')
                                            <td>
                                                <a class="btn btn-danger sm" href="{{ route('message.delete', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        @endif

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
@section('scripts')
    @parent
    @if(session('status') === 'message-deleted')
        <script>
            toastr.success('Message deleted')
        </script>
    @endif
@endsection
