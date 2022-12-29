@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">নামাজের সময়সুচি এডিট করুন</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.prodesh.update', $prodesh->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-1 col-form-label text-nowrap">প্রদেশের নাম <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value={{ $prodesh->name }}>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <a href="{{ route('admin.prodesh.index') }}" type="button" class="btn btn-outline-primary"
                                data-dismiss="modal">বাতিল</a>
                            <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
