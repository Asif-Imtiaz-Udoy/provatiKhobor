@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-6">
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
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <!-- if category have sub -->
                                <tr class="text-center">
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{!! $category->name !!}

                                        @foreach ($category->sub as $sub_cat)
                                            <p> -- {{ $sub_cat->sub_name }}
                                                <span><a class="btn btn-sm btn-link text-primary"
                                                        href="{{ route('admin.subCategory.edit', $sub_cat->id) }}"><i
                                                            class="fas fa-pencil-alt fas-lg"></i></a></span>
                                                <button id="{{ $sub_cat->id }}" data-toggle="modal"
                                                    data-target="#subdeleteModal"
                                                    class="btn btn-sm btn-link text-danger subdelete" type="button"><i
                                                        class="fas fa-trash"></i></button>

                                            </p>
                                        @endforeach
                                    <td>{{ $category->order_id }}</td>
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

        <div class="col-lg-6">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল সাব-ক্যাটগরির তালিকা</h5>
                    <button data-toggle="modal" data-target="#subModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($sub_categories as $sub)
                                <!-- if category have sub -->
                                <tr class="text-center">
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{!! $sub->sub_name !!}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-link text-primary"
                                            href="{{ route('admin.subCategory.edit', $sub->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $sub->id }}" data-toggle="modal" data-target="#subdeleteModal"
                                            class="btn btn-sm btn-link text-danger subdelete" type="button"><i
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

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="order_id" class="col-sm-3 col-form-label text-nowrap">অর্ডার আইডি<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="order_id" id="order_id"
                                    placeholder="Insert Order Id" >
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="order_id" class="col-sm-4 col-form-label text-nowrap">ফিচার করবেন কি না ?<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-8 p-2 pl-5">
                                <input class="form-check-input" type="radio" name="feature" id="feature" value="1">
                                <label class="form-check-label" for="feature">হ্যা</label>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- subCategory create modal --}}
    <div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content font-kalpurush">
                <form action="{{ route('admin.subCategory.store') }}" method="post">
                    @csrf
                    <div class="modal-header border-none">
                        <h5 class="modal-title" id="exampleModalLabelLogout">সাব-ক্যাটগরির এড করুন</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="sub_name" class="col-sm-3 col-form-label text-nowrap">সাব-ক্যাটগরির নাম <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sub_name" id="sub_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="category_id" class="col-sm-3 col-form-label text-nowrap">মেইন ক্যাটগরি <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="category_id">
                                    <option value="0">সাব ক্যাটগরি নির্বাচন করুন</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">বাতিল</button>
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

    {{-- subCategory delete modal --}}
    <div class="modal fade" id="subdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="subdeleteForm" method="post">
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

            $('.subdelete').click(function() {
                let id = $(this).attr('id');
                $url = "{{ route('admin.subCategory.destroy', '') }}" + "/" + id
                $('#subdeleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
