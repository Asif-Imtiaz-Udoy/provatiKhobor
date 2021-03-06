@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সফল ব্যাক্তিবর্গ এডিট করুন</h5>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row pl-5 pr-5">
                            <label for="title" class="col-form-label text-nowrap">টাইটেল<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                            @if ($errors->has('title'))
                                <span style="color:red">{!! $errors->first('title') !!}</span>
                            @endif
                        </div>

                        {{-- <div class="form-group row pl-5 pr-5">
                            <label for="sub_title" class="col-form-label text-nowrap">সাব-টাইটেল<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                value="{{ $news->sub_title }}">
                            @if ($errors->has('sub_title'))
                                <span style="color:red">{!! $errors->first('sub_title') !!}</span>
                            @endif
                        </div> --}}

                        <div class="form-group row pl-5 pr-5">
                            <label for="thumbnail" class=" col-form-label text-nowrap"> ছবি <span class="text-danger">
                                    *</span></label>
                            <input type="file" class="form-control dropify" name="thumbnail" id="thumbnail"
                                data-default-file="{{ url('/images/news', $news->news_image) }}">
                            @if ($errors->has('thumbnail'))
                                <span style="color:red">{!! $errors->first('thumbnail') !!}</span>
                            @endif
                        </div>
                        <input type="hidden" name="type" value="2">

                        <div class="form-group row pl-5 pr-5">
                            <label for="image_caption" class=" col-form-label text-nowrap">ছবির ক্যাপশন<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="image_caption" id="image_caption"
                                value="{{ $news->image_caption }}">
                            @if ($errors->has('image_caption'))
                                <span style="color:red">{!! $errors->first('image_caption') !!}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="news_body">নিউজ<span class="text-danger">
                                    *</span></label>
                            <textarea class="form-control" id="news_body" name="news_body" rows="3">{{ $news->news_body }}</textarea>
                            @if ($errors->has('news_body'))
                                <span style="color:red">{!! $errors->first('news_body') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row pl-5 pr-5">
                            <label for="reporter" class=" col-form-label text-nowrap">রিপোর্টার<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="reporter" id="reporter"
                                value="{{ $news->reporter }}">
                            @if ($errors->has('reporter'))
                                <span style="color:red">{!! $errors->first('reporter') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row ">
                            <div class="col-sm-6 pl-5 pr-5">
                                <label for="category_id" class=" col-form-label text-nowrap">ক্যাটগরি<span
                                        class="text-danger">
                                        *</span></label>
                                <div class="">
                                    <select class="custom-select" name="category_id" value="{!! old('category_id') !!}">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('category_id'))
                                    <span style="color:red">{!! $errors->first('category_id') !!}</span>
                                @endif
                            </div>

                            <div class="col-sm-3">
                                <div class="text-center">
                                    <label for="lead_news" class="form-label text-center mt-2">লিড নিউজ <span
                                            class="text-danger">*</span></label>
                                    <br>
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="lead_news" id="lead_news"
                                            value="1" {{ $news->lead_news == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="lead_news">হ্যা</label>
                                    </div>
                                    @if ($errors->has('lead_news'))
                                        <span style="color:red">{!! $errors->first('lead_news') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="text-center">
                                    <label for="news_box" class="form-label text-center mt-2">নিউজ বক্স <span
                                            class="text-danger">*</span></label>
                                    <br>
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="news_box" id="news_box" value="1"
                                            {{ $news->news_box == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="news_box">হ্যা</label>
                                    </div>
                                    @if ($errors->has('news_box'))
                                        <span style="color:red">{!! $errors->first('news_box') !!}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="pl-5 pr-5 pt-3">
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
        $('.dropify').dropify();

        tinymce.init({
            selector: "textarea",
            height: 600,
            relative_urls: false,
            paste_data_images: true,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: "{{ route('admin.post.image.upload') }}",
            file_picker_types: "image",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            // override default upload handler to simulate successful upload
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement("input");
                input.setAttribute("type", "file");
                input.setAttribute("accept", "image/*");
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = "blobid" + new Date().getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(",")[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });
    });
</script>
@endsection
