@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Skills info</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Skills</h4>

                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Short description</th>
                                    <th>Pros list</th>
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($skills as $id => $item)

                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->short_description }}</td>
                                        <td>
                                            @foreach($item->pros_list as $pros)
                                                {{ $pros }}
                                            @endforeach
                                        </td>
                                        <td><img src="{{ asset('storage/upload/skills_images/' . $item->image) }}" alt="" style="width: 85px; height: 85px"></td>
                                        <td><img src="{{ asset('storage/upload/skills_images/icons/' . $item->icon) }}" alt="" style="width: 85px; height: 85px"></td>

                                        <td>
                                            <a class="btn btn-info sm" href="{{ route('skills.edit', $item->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" href="{{ route('skills.delete', $item->id) }}" title="Delete" id="delete"><i class="fas fa-trash-alt"></i></a>
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
    @if(session('status') === 'skill-added')
        <script>
            toastr.success('Skill added')
        </script>
    @endif
    @if(session('status') === 'skill-updated')
        <script>
            toastr.success('Skill updated')
        </script>
    @endif
    @if(session('status') === 'skill-deleted')
        <script>
            toastr.success('Skill deleted')
        </script>
    @endif
@endsection
