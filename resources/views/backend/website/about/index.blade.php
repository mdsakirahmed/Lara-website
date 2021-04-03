@push('title')
    About
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">About</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
                <a href="{{ route('backend.dashboard') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Back to Dashboard </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">Update website about content</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{ route('backend.aboutUpdate') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Title</label>
                                <div class="col-12">
                                    <textarea name="title" type="text" class="form-control" id="title">{{ get_static_option('about_title') }}</textarea>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-12">
                                <textarea name="description" type="text" class="form-control" id="description">
                                    {!! get_static_option('about_description') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button id="submit-btn" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="mb-5 bg-danger">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <img height="" width="" class="rounded-circle image-display" src="{{ asset(get_static_option('banner_image')) }}" alt="">
                                    <br>
                                    <label class="control-label">Website banner image</label>
                                    <input name="no_image" type="file" accept="image/*"  id="no_image" class="form-control image-importer">
                                    <br>
                                    <button type="button" class="btn btn-info btn-circle image-chose-btn"><i class="fa fa-plus"></i> </button>
                                    <button value="{{ route('backend.bannerImageUpdate') }}" type="button" class="btn btn-info btn-circle image-submit-btn"><i class="fa fa-check"></i> </button>
                                    <button type="button" class="btn btn-warning btn-circle image-reset-btn"  value="{{ asset(get_static_option('banner_image')) }}"><i class="fa fa-times "></i> </button>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')
    <script>
        $('#description').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush
