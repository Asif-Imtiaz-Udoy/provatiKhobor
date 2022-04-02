@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">ভোটের টাইটেল এডিট করুন</h5>
                </div>
                <form action="{{ route('admin.poll.update', $poll->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="question" class="col-sm-3 col-form-label text-nowrap">ভোটের টাইটেল <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="question" id="question"
                                    value="{{ $poll->question }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-item-center">
                        <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
