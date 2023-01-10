@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Multi image table</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Multi images</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($all_multi_image as $id => $item)

                            <tr>
                                <td>{{ $id + 1 }}</td>
                                <td><img src="{{ asset('upload/multi_images/' . $item->multi_image) }}" alt="" style="width: 85px; height: 85px"></td>
                                <td>
                                    <a class="btn btn-info sm" href="{{ route('edit.multi.image', $item->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger sm" href="{{ route('delete.multi.image', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
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

@section('scripts')
    @parent
    @if(session('status') === 'multi-updated')
        <script>
            toastr.success('Image updated')
        </script>
    @endif
    @if(session('status') === 'image-deleted')
        <script>
            toastr.success('Image deleted')
        </script>
    @endif
@endsection
