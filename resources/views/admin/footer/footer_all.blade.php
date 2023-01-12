@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <p class="card-title font-size-18">Footer</p><br>

                        <form method="POST" action="{{ route('footer.update', $footer->id) }}">
                            @csrf
                            {{--Поля--}}

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone number</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('number') is-invalid @enderror" type="text" value="{{ $footer->number }}" id="number" name="number">
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" value="{{ $footer->address }}" id="address" name="address">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $footer->email }}" id="email" name="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('facebook') is-invalid @enderror" type="text" value="{{ $footer->facebook }}" id="facebook" name="facebook">
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">LinkedIn</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('linkedin') is-invalid @enderror" type="text" value="{{ $footer->linkedin }}" id="linkedin" name="linkedin">
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Gitlab</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('gitlab') is-invalid @enderror" type="text" value="{{ $footer->gitlab }}" id="gitlab" name="gitlab">
                                    @error('gitlab')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('copyright') is-invalid @enderror" type="text" value="{{ $footer->copyright }}" id="copyright" name="copyright">
                                    @error('copyright')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="5" style="height: 291px;">{{ $footer->short_description }}</textarea>
                                    @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

@section('scripts')
    @parent
    @if(session('status') === 'footer-updated')
        <script>
            toastr.success('Footer updated')
        </script>
    @endif
@endsection
