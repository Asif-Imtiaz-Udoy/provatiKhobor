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
                    <form action="{{ route('admin.prayer.update', $prayer->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="fozor" class="col-sm-1 col-form-label text-nowrap">ফজরের নামাজ <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="fozor" id="fozor"
                                        value={{ $prayer->fozor }}>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="johor" class="col-sm-1 col-form-label text-nowrap">যোহরের নামাজ
                                    <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="johor" id="johor"
                                        value={{ $prayer->johor }}>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="ashor" class="col-sm-1 col-form-label text-nowrap">আছরের নামাজ <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ashor" id="ashor"
                                        value={{ $prayer->ashor }}>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="magriv" class="col-sm-1 col-form-label text-nowrap">মাগরিবের নামাজ
                                    <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="magriv" id="magriv"
                                        value={{ $prayer->magriv }}>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="esha " class="col-sm-1 col-form-label text-nowrap">এশার নামাজ <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="esha" id="esha"
                                        value={{ $prayer->esha }}>
                                </div>
                            </div>
                        </div>


                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="sunrise" class="col-sm-1 col-form-label text-nowrap">সূর্যদয় <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="sunrise" id="sunrise"
                                        value={{ $prayer->sunrise }}>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row d-flex">
                                <label for="sunset" class="col-sm-1 col-form-label text-nowrap">সূর্যাস্ত<span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="sunset" id="sunset"
                                        value={{ $prayer->sunset }}>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.prayer.index') }}" type="button" class="btn btn-outline-primary"
                                data-dismiss="modal">বাতিল</a>
                            <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
