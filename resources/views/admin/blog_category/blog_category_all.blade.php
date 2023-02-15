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
                                    @if(auth()->user()->role->first()->name === 'Administrator')
                                        <th>Action</th>
                                    @endif
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($blogCategory as $id => $item)

                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $item->blog_category }}</td>

                                        @if(auth()->user()->role->first()->name === 'Administrator')
                                            <td>
                                                <a class="btn btn-info sm" href="{{ route('blog.category.edit', $item->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger sm" href="{{ route('blog.category.delete', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
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
    @if(session('status') === 'blog-category-added')
        <script>
            toastr.success('Blog category added')
        </script>
    @endif
    @if(session('status') === 'blog-category-updated')
        <script>
            toastr.success('Blog category updated')
        </script>
    @endif
    @if(session('status') === 'blog-category-deleted')
        <script>
            toastr.success('Blog category deleted')
        </script>
    @endif
@endsection
