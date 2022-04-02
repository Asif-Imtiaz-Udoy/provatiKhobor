@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-8">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল বিজ্ঞাপন</h5>

                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Image/script</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">imgae</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($advertisements as $add)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">
                                        {{ $add->ad_category == 1 ? 'top left sidebar' : '' }}
                                        {{ $add->ad_category == 2 ? 'top left sidebar mini' : '' }}
                                        {{ $add->ad_category == 3 ? 'job/notice/advertisement' : '' }}
                                        {{ $add->ad_category == 4 ? 'top of sofol person news section' : '' }}
                                        {{ $add->ad_category == 5 ? 'under the sofol person news section' : '' }}
                                        {{ $add->ad_category == 6 ? 'under unnoyoner ongshider section' : '' }}
                                        {{ $add->ad_category == 7 ? 'under the motamot news section' : '' }}
                                        {{ $add->ad_category == 8 ? 'Under the photo gallery section' : '' }}
                                        {{ $add->ad_category == 9 ? 'top right section of news details' : '' }}
                                        {{ $add->ad_category == 10 ? 'bottom of the news details page' : '' }}
                                        {{ $add->ad_category == 11 ? 'top right sidebar of category details page' : '' }}
                                        {{ $add->ad_category == 12 ? 'under the video section' : '' }}

                                    </td>

                                    <td class="text-center">
                                        @if ($add->add_image)
                                            <img class="w-50"
                                                src="{{ url('/images/advertisement/' . $add->add_image) }}" alt="">
                                        @elseif($add->add_script)
                                            {{ $add->add_script }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-link text-primary"
                                            href="{{ route('admin.advertisement.edit', $add->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $add->id }}" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-sm btn-link text-danger delete" type="button"><i
                                                class="fas fa-trash"></i></button>
                                        <a class="btn btn-sm btn-link text-info"
                                            href="{{ route('admin.advertisement.show', $add->id) }}"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- create add section --}}
        <div class="col-lg-4">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white"> বিজ্ঞাপন সংযুক্ত করুন</h5>

                </div>
                <div class="card p-3">
                    <form action="{{ route('admin.advertisement.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ad_category">বিজ্ঞাপনের ক্যাটাগরি নির্বাচন করুন</label>
                                    <select class="form-control" name="ad_category" id="ad_category">
                                        <option value="" selected disabled>--select category--</option>

                                        <option value="1">top left sidebar</option>
                                        <option value="2">top left sidebar mini</option>
                                        <option value="3">job/notice/advertisemen</option>
                                        <option value="4">top of the sofol news section</option>
                                        <option value="5">under the sofol news section</option>
                                        <option value="6">under unnoyoner ongshidar section</option>
                                        <option value="7">under motamot section</option>
                                        <option value="8">Under the photo gallery section</option>
                                        <option value="9">top right section of news details page</option>
                                        <option value="10">bottom of the news details page</option>
                                        <option value="11">top right sidebar of category details page</option>
                                        <option value="12">under the video section</option>
                                    </select>
                                    @if ($errors->has('ad_category'))
                                        <span style="color:red">{{ $errors->first('ad_category') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <label for="add_type">বিজ্ঞাপনের ধরন</label>
                                    <select class="form-control" name="add_type" id="add_type" value="">
                                        <option value="" selected disabled>--select type--</option>

                                        <option value="1">Image</option>
                                        <option value="2">Script</option>
                                    </select>
                                    @if ($errors->has('add_type'))
                                        <span style="color:red">{{ $errors->first('add_type') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- ----------add type input image fild start --}}
                            <div class="col-6" id="add_image-div" style="display:none">
                                <div class="form-group">
                                    <label for="thumbnail">বিজ্ঞাপনের ছবি</label>
                                    <input type="file" class="dropify" data-height="150" name="thumbnail"
                                        id="add_image">
                                    @if ($errors->has('thumbnail'))
                                        <span style="color:red">{{ $errors->first('add_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- ------------add type input image field end ----------- --}}

                            {{-- --------add type input script field start --}}
                            <div class="col-12" id="add_script_div" style="display:none">
                                <div class="form-group">
                                    <label for="add_script">বিজ্ঞাপন স্ক্রিপ্ট</label>
                                    <textarea class="form-control summernote" name="add_script" id="add_script"></textarea>
                                    @if ($errors->has('add_script'))
                                        <span style="color:red">{{ $errors->first('add_script') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- -----------add type input script field end --}}

                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <label for="vendor">বিজ্ঞাপনদাতা</label>
                                    <input type="text" class="form-control" name="vendor" id="vendor"
                                        placeholder=" Write vendor Here">
                                    @if ($errors->has('vendor'))
                                        <span style="color:red">{{ $errors->first('vendor') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <label for="link">বিজ্ঞাপন লিংক</label>
                                    <input type="text" class="form-control" name="link" id="link"
                                        placeholder=" Write link Here">
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
    </div>
@endsection
@section('modal')
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
            })
        });

        // dropify for image
        $('.dropify').dropify();
    </script>
@endsection
