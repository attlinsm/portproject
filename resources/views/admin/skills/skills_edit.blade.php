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

                            <form method="POST" action="{{ route('skills.update', $skill->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{--Поля--}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name of skill</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"  value="{{ $skill->name }}" id="name" name="name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('short_description') is-invalid @enderror" type="text" value="{{ $skill->short_description }}" id="short_description" name="short_description">
                                        @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Pros of knowledge</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('pros_list') is-invalid @enderror" type="text" value ="@foreach($skill->pros_list as $pros){{ $pros }} @endforeach"  id="pros_list" name="pros_list">
                                        @error('pros_list')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{--Изображение--}}
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty(asset('storage/upload/skills_images/' . $skill->image))) ? asset('storage/upload/skills_images/' . $skill->image) : url('storage/upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('icon') is-invalid @enderror" type="file" name="icon" id="icon">
                                        @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showIcon" class="rounded avatar-lg" src="{{ (!empty(asset('storage/upload/skills_images/icons/' . $skill->icon))) ? asset('storage/upload/skills_images/icons/' . $skill->icon) : url('storage/upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update skill">
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
        $(document).ready(function () {
            $('#icon').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#showIcon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
