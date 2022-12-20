@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog categories all data</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog categories</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php($i = 1)
                                @foreach($blogCategory as $item)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->blog_category }}</td>
                                        <td>
                                            <a class="btn btn-info sm" href="{{ route('edit.portfolio', $item->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" href="{{ route('delete.portfolio', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
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
