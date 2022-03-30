@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">ক্যাটগরি এডিট করুন</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-1 col-form-label text-nowrap">ক্যাটগরির নাম <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $category->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="order_id" class="col-sm-1 col-form-label text-nowrap">অর্ডার আইডি<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="order_id" id="order_id"
                                    placeholder="Insert Order Id" value="{{ $category->order_id }}">
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="feature" class="col-sm-4 col-form-label text-nowrap">ফিচার করবেন কি না ?<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-8 p-2 pl-5">
                                <input class="form-check-input" type="radio" name="feature" id="feature" value="1" {{ $category->feature == 1 ? 'checked' : '' }} >
                                <label class="form-check-label" for="feature">হ্যা</label>
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
