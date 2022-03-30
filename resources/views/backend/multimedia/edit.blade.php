@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">মাল্টিমিডিয়া আপডেট করুন</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.multimedia.update', $multimedia->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="caption" class="col-sm-1 col-form-label text-nowrap">ক্যাপশন<span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="caption" id="caption"
                                        value="{{ $multimedia->caption }}">
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row d-flex">
                                <label for="category" class="col-sm-1 col-form-label text-nowrap">ক্যাটগরির<span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="category" id="category" value="">

                                        <option value="1" {{ $multimedia->category == 1 ? 'selected' : '' }}>Image
                                        </option>
                                        <option value="2" {{ $multimedia->category == 2 ? 'selected' : '' }}>Script
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body" id="add_image-div"
                            style="{{ $multimedia->category == 1 ? 'display:block' : 'display:none' }}">
                            <div class="form-group row">
                                <label for="photo" class="col-sm-1 col-form-label text-nowrap">ছবি<span
                                        class="text-danger">
                                        *</span></label>
                                <div class="col-sm-5">
                                    <input type="file" class="dropify" data-height="150" name="photo" id="add_image"
                                        data-default-file="{{ url('/images/multimedia', $multimedia->photo) }}">
                                </div>
                            </div>
                        </div>

                        <div class="modal-body" id="add_script_div"
                            style="{{ $multimedia->category == 2 ? 'display:block' : 'display:none' }}">
                            <div class="form-group row">
                                <label for="video_link" class="col-sm-1 col-form-label text-nowrap">ভিডিও<span
                                        class="text-danger">
                                        *</span></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control summernote" name="video_link" id="video_link">{!! $multimedia->video_link !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a type="button" class="btn btn-outline-primary"
                                href={{ route('admin.multimedia.index') }}>বাতিল</a>
                            <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                let id = $(this).attr('id');
                $url = "{{ route('admin.subCagtegory.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });


            $(document).ready(function() {
                $("#category").change(function() {

                    var value = $("#category option:selected").val();
                    console.log(value);
                    if ($("#category").val() == 1) {
                        $("#add_image-div").css("display", "block");
                        $("#add_script_div").css("display", "none");
                    }
                    if ($("#category").val() == 2) {
                        $("#add_script_div").css("display", "block");
                        $("#add_image-div").css("display", "none");
                    }
                })
            });

        });
        // dropify for image
        $('.dropify').dropify();
    </script>
@endsection
