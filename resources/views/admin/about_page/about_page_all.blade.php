@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="card-title font-size-18">About page</p><br>

                        <form method="POST" action="{{ route('about.update', $aboutPage->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{--Поля--}}

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" value="{{ $aboutPage->title }}" id="title" name="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short title</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('short_title') is-invalid @enderror" type="text" value="{{ $aboutPage->short_title }}" id="short_title" name="short_title">
                                    @error('short_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="5" style="height: 291px;">{{ $aboutPage->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description" class="form-control @error('long_description') is-invalid @enderror">{{ $aboutPage->long_description }}</textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{--Изображение--}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About page image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('about_image') is-invalid @enderror" type="file" name="about_image" id="image">
                                    @error('about_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty(asset('upload/about_image/' . $aboutPage->about_image))) ? asset('upload/about_image/' . $aboutPage->about_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update about page">
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

@section('scripts')
    @parent
    @if(session('status') === 'about-updated')
        <script>
            toastr.success('About page updated')
        </script>
    @endif
@endsection

