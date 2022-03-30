@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সা-ক্যাটগরি এডিট করুন</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <form action="{{ route('admin.subCategory.update', $sub_cat->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="sub_name" class="col-sm-1 col-form-label text-nowrap">ক্যাটগরির নাম <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sub_name" id="sub_name"
                                    value="{{ $sub_cat->sub_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="category_id" class="col-sm-1 col-form-label text-nowrap">মেইন ক্যাটগরি <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="category_id">
                                    <option value="0">সাব ক্যাটগরি নির্বাচন করুন</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $cat->id == $sub_cat->category_id ? 'selected' : '' }}>
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-outline-primary" href="{{ route('admin.category.index') }}">বাতিল
                        </a>
                        <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
