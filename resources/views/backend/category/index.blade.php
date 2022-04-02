@extends('layouts.backend')
@section('breadcrumbs')
<h1 class="h3 mb-0 text-gray-800 font-kalpurush">ক্যাটগরির তালিকা</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category</li>
</ol>
@endsection
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল ক্যাটগরির তালিকা</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">feature</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">feature</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="text-center">
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{!! $category->name !!}
                                    <td>{{ $category->order_id ? $category->order_id : 'নাই' }}</td>
                                    <td>{{ $category->feature == 1 ? 'হ্যা' : 'নাই' }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-link text-primary"
                                            href="{{ route('admin.category.edit', $category->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $category->id }}" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-sm btn-link text-danger delete" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content font-kalpurush">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="modal-header border-none">
                        <h5 class="modal-title" id="exampleModalLabelLogout">ক্যাটগরির এড করুন</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-nowrap">ক্যাটগরির নাম <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex">
                        <label for="order_id" class="col-sm-3 col-form-label text-nowrap">অর্ডার আইডি<span
                                class="text-danger"> *</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="order_id" id="order_id">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-item-center">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="feature" id="feature" value="1">
                              <label class="custom-control-label" for="feature">ফিচার</label>
                            </div>
                          </div>
                        <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">Are you sure you want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                let id = $(this).attr('id');
                $url = "{{ route('admin.category.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
