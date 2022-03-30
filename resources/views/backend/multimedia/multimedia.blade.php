@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল ছবি ও ভিডিও</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Caption</th>
                                <th class="text-center">Image/Video</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Caption</th>
                                <th class="text-center">Image/Vide</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($multimedias as $media)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">{{ $media->caption }}</td>
                                    <td class="text-center">
                                        @if ($media->photo)
                                            <img class="w-50 "
                                                src="{{ url('/images/multimedia/' . $media->photo) }}" alt="">
                                        @elseif($media->video_link)
                                            {!! $media->video_link !!}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-link text-primary edit"
                                            href="{{ route('admin.multimedia.edit', $media->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $media->id }}" data-toggle="modal" data-target="#deleteModal"
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
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content font-kalpurush">
                <form action="{{ route('admin.multimedia.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-none">
                        <h5 class="modal-title" id="exampleModalLabelLogout">ছবি বা ভিডিও এড করুন</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="caption" class="col-sm-3 col-form-label text-nowrap">ক্যাপশন<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="caption" id="caption">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="category" class="col-sm-3 col-form-label text-nowrap">ক্যাটগরির<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category" id="category" value="">
                                    <option value="" selected disabled>--select type--</option>

                                    <option value="1">Image</option>
                                    <option value="2">Script</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body" id="add_image-div" style="display:none">
                        <div class="form-group row">
                            <label for="thumbnail" class="col-sm-3 col-form-label text-nowrap">ছবি<span
                                    class="text-danger">
                                    *</span></label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="150" name="thumbnail" id="add_image">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body" id="add_script_div" style="display:none">
                        <div class="form-group row">
                            <label for="video_link" class="col-sm-3 col-form-label text-nowrap">ভিডিও<span
                                    class="text-danger">
                                    *</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="video_link" id="video_link"></textarea>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                let id = $(this).attr('id');
                $url = "{{ route('admin.multimedia.destroy', '') }}" + "/" + id
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
