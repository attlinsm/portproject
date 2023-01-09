@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Edit blog category page</p><br>

                            <form method="POST" id="passForm" action="{{ route('update.blog.category', $blogCategory->id) }}">
                                @csrf
                                {{--Поля--}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" id="blog_category" name="blog_category" value="{{ $blogCategory->blog_category }}">

                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update blog category">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function (){
            $('#passForm').validate({
                rules: {
                    blog_category: {
                        required: true,
                    },
                },
                message: {
                    blog_category: {
                        required: 'Please enter blog category',
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

@endsection
