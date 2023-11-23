@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">SEO Setting</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update SEO Settings</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Update SEO Settings</h5>
                    </div>
                    <form action="{{ route('update.seo.setting', $seo->id) }}" method="post" class="row g-3" id="myForm">
                        @csrf
                        <div class="col-md-9 form-group">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $seo->meta_title }}">
                        </div>
                        <div class="col-md-9 form-group">
                            <label for="meta_author" class="form-label">Meta Author</label>
                            <input type="text" name="meta_author" class="form-control" id="meta_author" value="{{ $seo->meta_author }}">
                        </div>
                        <div class="col-md-9 form-group">
                            <label for="tags" class="form-label">Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control" data-role="tagsinput" value="{{ $seo->meta_keyword }}" id="tags">
                        </div>
                        <div class="col-md-9 form-group">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ $seo->meta_description }}">
                        </div>
                       
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary px-5" value="Update Seo Settings" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection