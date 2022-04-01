@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">মতামত সংযুক্ত করুন</h5>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row pl-5 pr-5">
                            <label for="title" class="col-form-label text-nowrap">টাইটেল<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{!! old('title') !!}">
                            @if ($errors->has('title'))
                                <span style="color:red">{!! $errors->first('title') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row pl-5 pr-5">
                            <label for="sub_title" class="col-form-label text-nowrap">সাব-টাইটেল<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                value="{!! old('sub_title') !!}">
                            @if ($errors->has('sub_title'))
                                <span style="color:red">{!! $errors->first('sub_title') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row pl-5 pr-5">
                            <label for="thumbnail" class=" col-form-label text-nowrap"> ছবি <span class="text-danger">
                                    *</span></label>
                            <input type="file" class="form-control dropify" name="thumbnail" id="thumbnail"
                                value="{!! old('news_image') !!}">
                            @if ($errors->has('thumbnail'))
                                <span style="color:red">{!! $errors->first('thumbnail') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row pl-5 pr-5">
                            <label for="image_caption" class=" col-form-label text-nowrap">ছবির ক্যাপশন<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="image_caption" id="image_caption"
                                value="{!! old('image_caption') !!}">
                            @if ($errors->has('image_caption'))
                                <span style="color:red">{!! $errors->first('image_caption') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row pl-5 pr-5">
                            <label for="news_body" class=" col-form-label text-nowrap">নিউজ<span class="text-danger">
                                    *</span></label>
                            <br>
                            <div>
                                <textarea type="text" class="form-control tinymce-editor" name="news_body" id="news_body"
                                    value="{!! old('news_body') !!}"></textarea>
                            </div>
                            @if ($errors->has('news_body'))
                                <span style="color:red">{!! $errors->first('news_body') !!}</span>
                            @endif
                        </div>
                        <input type="hidden" name="type" value="1">

                        <div class="form-group row pl-5 pr-5">
                            <label for="reporter" class=" col-form-label text-nowrap">রিপোর্টার<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="reporter" id="reporter"
                                value="{!! old('reporter') !!}">
                            @if ($errors->has('reporter'))
                                <span style="color:red">{!! $errors->first('reporter') !!}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 pl-5 pr-5">
                                <label for="category_id" class=" col-form-label text-nowrap">ক্যাটগরি<span
                                        class="text-danger">
                                        *</span></label>
                                <div class="">
                                    <select class="custom-select" name="category_id" value="{!! old('category_id') !!}">
                                        <option selected>ক্যাটাগরি নির্বাচন করুন</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <input class="form-check-input" type="checkbox" name="lead_news" id="lead_news"
                                            value="1">
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
                                        <input class="form-check-input" type="checkbox" name="news_box" id="news_box"
                                            value="1">
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
        $('.dropify').dropify();

        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                height : "480"
            });
        });
    </script>
@endsection
