@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">বিজ্ঞাপন এডিট করুন</h5>
                </div>
                <div class="card p-3">
                    <form action="{{ route('admin.advertisement.update', $advertisement->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="ad_category">বিজ্ঞাপনের ক্যাটাগরি নির্বাচন করুন</label>
                                    <select class="form-control" name="ad_category" id="ad_category">

                                        <option value="1" {{ $advertisement->ad_category == 1 ? 'selected' : '' }}>top
                                            left sidebar</option>
                                        <option value="2" {{ $advertisement->ad_category == 2 ? 'selected' : '' }}>
                                            job/notice/advertisement</option>
                                        <option value="3" {{ $advertisement->ad_category == 3 ? 'selected' : '' }}>under
                                            first news section</option>
                                        <option value="4" {{ $advertisement->ad_category == 4 ? 'selected' : '' }}>under
                                            second news section</option>
                                        <option value="5" {{ $advertisement->ad_category == 5 ? 'selected' : '' }}>top of
                                            the video section</option>
                                        <option value="6" {{ $advertisement->ad_category == 6 ? 'selected' : '' }}>under
                                            the motamot section</option>
                                        <option value="7" {{ $advertisement->ad_category == 7 ? 'selected' : '' }}>top of
                                            the photo gallery section</option>
                                        <option value="8" {{ $advertisement->ad_category == 8 ? 'selected' : '' }}>Under
                                            the photo gallery section</option>

                                    </select>
                                    @if ($errors->has('ad_category'))
                                        <span style="color:red">{{ $errors->first('ad_category') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="add_type">বিজ্ঞাপনের ধরন</label>
                                    <select class="form-control" name="add_type" id="add_type" value="">

                                        <option value="1" {{ $advertisement->add_type == 1 ? 'selected' : '' }}>Image
                                        </option>
                                        <option value="2" {{ $advertisement->add_type == 2 ? 'selected' : '' }}>Script
                                        </option>
                                    </select>
                                    @if ($errors->has('add_type'))
                                        <span style="color:red">{{ $errors->first('add_type') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- ----------add type input image fild start --}}
                            <div class="col-5" id="add_image-div"
                                style=" {{ $advertisement->add_type == 1 ? 'display:block' : 'display:none' }}">
                                <div class="form-group">
                                    <label for="thumbnail">বিজ্ঞাপনের ছবি</label>
                                    <input type="file" class="dropify" data-height="150" name="thumbnail"
                                        id="add_image"
                                        data-default-file="{{ url('/images/advertisement', $advertisement->add_image) }}">
                                    @if ($errors->has('thumbnail'))
                                        <span style="color:red">{{ $errors->first('add_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- ------------add type input image field end ----------- --}}

                            {{-- --------add type input script field start --}}
                            <div class="col-5" id="add_script_div"
                                style="{{ $advertisement->add_type == 2 ? 'display:block' : 'display:none' }}"">
                                                <div class="    form-group">
                                <label for="add_script">বিজ্ঞাপন স্ক্রিপ্ট</label>
                                <textarea class="form-control summernote" name="add_script" id="add_script">{!! $advertisement->add_script !!}</textarea>
                                @if ($errors->has('add_script'))
                                    <span style="color:red">{{ $errors->first('add_script') }}</span>
                                @endif
                            </div>
                        </div>
                        {{-- -----------add type input script field end --}}

                        <div class="col-6">
                            <div class="form-group">
                                <label for="vendor">বিজ্ঞাপনদাতা</label>
                                <input type="text" class="form-control" name="vendor" id="vendor"
                                    value="{{ $advertisement->vendor }}">
                                @if ($errors->has('vendor'))
                                    <span style="color:red">{{ $errors->first('vendor') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 pt-4">
                            <div class="form-group">
                                <label for="link">বিজ্ঞাপন লিংক</label>
                                <input type="text" class="form-control" name="link" id="link"
                                    value="{{ $advertisement->link }}">
                                @if ($errors->has('link'))
                                    <span style="color:red">{{ $errors->first('link') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="pl-5 pr-5 pt-3">
                            <button type="submit" class="btn btn-primary">সংযুক্ত করুন</button>
                        </div>
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
                $url = "{{ route('admin.advertisement.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });

        $(document).ready(function() {
            $("#add_type").change(function() {

                var value = $("#add_type option:selected").val();
                console.log(value);
                if ($("#add_type").val() == 1) {
                    $("#add_image-div").css("display", "block");
                    $("#add_script_div").css("display", "none");
                }
                if ($("#add_type").val() == 2) {
                    $("#add_script_div").css("display", "block");
                    $("#add_image-div").css("display", "none");
                }
            });
        });

        // dropify for image
        $('.dropify').dropify();
    </script>
@endsection
