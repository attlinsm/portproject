@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title font-size-18">Home slide</p><br>

                            <form method="POST" action="{{ route('slide.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{--Поля--}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" value="{{ $slider->title }}" id="title" name="title">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('short_title') is-invalid @enderror" type="text" value="{{ $slider->short_title }}" id="short_title" name="short_title">
                                        @error('short_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('video_url') is-invalid @enderror" type="text" value="{{ $slider->video_url }}" id="video_url" name="video_url">
                                        @error('video_url')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{--Изображение--}}
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('home_slide') is-invalid @enderror" type="file" name="home_slide" id="image">
                                        @error('home_slide')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($slider->home_slide)) ? url($slider->home_slide) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update slide">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

@section('scripts')
    @parent
    @if(session('status') === 'slider-updated')
        <script>
            toastr.success('Slider updated')
        </script>
    @endif
@endsection
