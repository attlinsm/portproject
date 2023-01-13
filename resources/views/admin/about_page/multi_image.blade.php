@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="card-title font-size-18">Add multi image</p><br>

                        <form method="POST" action="{{ route('multi.image.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{--Поля--}}

                            {{--Изображение--}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About multi image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('multi_image[]') is-invalid @enderror" type="file" name="multi_image[]" id="image" multiple>
                                    @error('multi_image[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add multi image">
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
    @if(session('status') === 'multi-updated')
        <script>
            toastr.success('Multi image updated')
        </script>
    @endif
@endsection


