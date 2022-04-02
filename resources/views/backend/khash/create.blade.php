@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">খাস খবর সংযুক্ত করুন</h5>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-form-label text-nowrap">টাইটেল<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{!! old('title') !!}">
                            @if ($errors->has('title'))
                                <span style="color:red">{!! $errors->first('title') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sub_title" class="col-form-label text-nowrap">সাব-টাইটেল<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                value="{!! old('sub_title') !!}">
                            @if ($errors->has('sub_title'))
                                <span style="color:red">{!! $errors->first('sub_title') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category_id" class=" col-form-label text-nowrap">ক্যাটগরি<span class="text-danger">*</span></label>
                            <select class="custom-select" name="category_id" value="{!! old('category_id') !!}">
                                <option selected>ক্যাটাগরি নির্বাচন করুন</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span style="color:red">{!! $errors->first('category_id') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="thumbnail" class=" col-form-label text-nowrap"> ছবি <span class="text-danger">
                                    *</span></label>
                            <input type="file" class="form-control dropify" name="thumbnail" id="thumbnail"
                                value="{!! old('news_image') !!}">
                            @if ($errors->has('thumbnail'))
                                <span style="color:red">{!! $errors->first('thumbnail') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image_caption" class=" col-form-label text-nowrap">ছবির ক্যাপশন<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="image_caption" id="image_caption"
                                value="{!! old('image_caption') !!}">
                            @if ($errors->has('image_caption'))
                                <span style="color:red">{!! $errors->first('image_caption') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="news_body">নিউজ<span class="text-danger">
                                    *</span></label>
                            <textarea class="form-control" id="news_body" name="news_body" rows="3"></textarea>
                            @if ($errors->has('news_body'))
                                <span style="color:red">{!! $errors->first('news_body') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="reporter" class=" col-form-label text-nowrap">রিপোর্টার<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="reporter" id="reporter"
                                value="{!! old('reporter') !!}">
                            @if ($errors->has('reporter'))
                                <span style="color:red">{!! $errors->first('reporter') !!}</span>
                            @endif
                            <input type="hidden" name="type" value="3">
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="lead_news" id="lead_news" value="1">
                                <label class="custom-control-label" for="lead_news">লিড নিউজ</label>
                              </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="news_box" id="news_box" value="1">
                                <label class="custom-control-label" for="news_box">নিউজ বক্স</label>
                            </div>
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
        $('.dropify').dropify();

        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                height: "480"
            });
        });
    </script>
@endsection
