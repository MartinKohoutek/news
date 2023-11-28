@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Photo Gallery</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Photos</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('photo.add'))
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.photo.gallery') }}" class="btn btn-primary">Add Photos</a>
            </div>
        </div>
        @endif
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ asset($item->photo_gallery) }}" alt="" style="width: 50px; height: 50px"></td>
                            <td>{{ $item->photo_title }}</td>
                            <td>{{ $item->post_date }}</td>
                            <td>
                                @if (Auth::user->can('photo.edit'))
                                <a href="{{ route('edit.photo.gallery', $item->id) }}" class="btn btn-primary radius-30">Edit</a>
                                @endif
                                @if (Auth::user()->can('photo.delete'))
                                <a href="{{ route('delete.photo.gallery', $item->id) }}" id="delete" class="btn btn-danger radius-30">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection