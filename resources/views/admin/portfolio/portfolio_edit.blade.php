@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Portfolio edit page</p><br>

                            <form method="POST" action="{{ route('portfolio.update', $portfolio->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{--Поля--}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('portfolio_name') is-invalid @enderror" type="text" id="portfolio_name" name="portfolio_name" value="{{ $portfolio->portfolio_name }}">
                                        @error('portfolio_name')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('portfolio_title') is-invalid @enderror" type="text" id="portfolio_title" name="portfolio_title" value=" {{ $portfolio->portfolio_title }}">
                                        @error('portfolio_title')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('portfolio_description') is-invalid @enderror" id="elm1" name="portfolio_description">{{ $portfolio->portfolio_description }}</textarea>
                                        @error('portfolio_description')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{--Изображение--}}
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('portfolio_image') is-invalid @enderror" type="file" name="portfolio_image" id="image">
                                        @error('portfolio_image')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset('storage/upload/portfolio_images/' . $portfolio->portfolio_image) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update portfolio">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
    <script type="module">
        $(document).ready(function () {
            $('#image').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
