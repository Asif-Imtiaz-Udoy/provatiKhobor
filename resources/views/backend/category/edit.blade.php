@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">ক্যাটগরি এডিট করুন</h5>
                </div>
                <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-nowrap">ক্যাটগরির নাম <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $category->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="order_id" class="col-sm-3 col-form-label text-nowrap">অর্ডার আইডি<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="order_id" id="order_id"
                                        placeholder="Insert Order Id" value="{{ $category->order_id }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-item-center">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="feature" id="feature" value="1" {{ $category->feature == 1 ? 'checked' : '' }}>
                              <label class="custom-control-label" for="feature">ফিচার</label>
                            </div>
                          </div>
                          <div>
                            <a type="button" class="btn btn-outline-primary" href="{{ route('admin.category.index') }}">বাতিল
                            </a>
                            <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
