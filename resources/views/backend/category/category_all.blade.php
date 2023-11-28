@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('category.add'))
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
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
                            <th style="width: 70%;">Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>
                                @if (Auth::user()->can('category.edit'))
                                <a href="{{ route('edit.category', $item->id) }}" class="btn btn-primary radius-30">Edit</a>
                                @endif
                                @if (Auth::user()->can('category.delete'))
                                <a href="{{ route('delete.category', $item->id) }}" id="delete" class="btn btn-danger radius-30">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection