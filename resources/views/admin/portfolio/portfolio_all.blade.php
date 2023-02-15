@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Portfolio all data</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Portfolios</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Image</th>

                                    @if(auth()->user()->role->first()->name === 'Administrator')
                                        <th>Action</th>
                                    @endif

                                </tr>
                                </thead>

                                <tbody>

                                @foreach($portfolio as $id => $item)

                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $item->portfolio_name }}</td>
                                        <td>{{ $item->portfolio_title }}</td>
                                        <td><img src="{{ asset('upload/portfolio_images/' . $item->portfolio_image) }}" alt="" style="width: 85px; height: 85px"></td>
                                        @if(auth()->user()->role->first()->name === 'Administrator')
                                            <td>
                                                <a class="btn btn-info sm" href="{{ route('portfolio.edit', $item->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger sm" href="{{ route('portfolio.delete', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
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
    @if(session('status') === 'portfolio-added')
        <script>
            toastr.success('Portfolio added')
        </script>
    @endif
    @if(session('status') === 'portfolio-updated')
        <script>
            toastr.success('Portfolio updated')
        </script>
    @endif
    @if(session('status') === 'portfolio-deleted')
        <script>
            toastr.success('Portfolio deleted')
        </script>
    @endif
@endsection
