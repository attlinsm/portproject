@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="card-title font-size-18">Footer</p><br>

                        <form method="POST" action="{{ route('update.footer', $footer->id) }}">
                            @csrf
                            {{--Поля--}}

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->number }}" id="number" name="number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->address }}" id="address" name="address">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $footer->email }}" id="email" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->facebook }}" id="facebook" name="facebook">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">LinkedIn</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->linkedin }}" id="linkedin" name="linkedin">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Gitlab</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->gitlab }}" id="gitlab" name="gitlab">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->copyright }}" id="copyright" name="copyright">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" class="form-control" rows="5" style="height: 291px;">{{ $footer->short_description }}</textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update footer">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
