@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Add blog category</p><br>

                            <form method="POST" id="passForm" action="{{ route('blog.category.store') }}">
                                @csrf
                                {{--Поля--}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control @error('blog_category') is-invalid @enderror" type="text" id="blog_category" name="blog_category">
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add blog category">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
