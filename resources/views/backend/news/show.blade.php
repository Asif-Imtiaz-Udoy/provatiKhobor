@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="card pl-2">
                    <div class="header">
                        <h2><strong>বিস্তারিত</strong> সংবাদ</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                        class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right" style="list-style: none">
                                    <li><a href="{{ route('admin.news.edit', $news->id) }}">Edit</a></li>
                                    <li>
                                        <a href="javascript:void(0)" id={{ $news->id }} class="delete" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body mb-2">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-12">
                                <div class="card mcard_3 mb-0">
                                    <div class="body py-0">
                                        <a href="javascript:void(0)"><img
                                                src="{{ url('/images/news/' . $news->news_image) }}"
                                                class="shadow-sm w-100" alt="profile-image"></a>
                                        <h4 class="m-t-10">{{ $news->image_caption }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-12">
                                <div class="product details">
                                    <h3 class="product-title mb-0 pb-2">সংবাদ শিরোনাম : {{ $news->title }}</h3>
                                    <h5 class="price mt-0 pb-2">সংবাদ সাব-শিরোনাম : <span
                                            class="col-amber">{{ $news->sub_title }}</span></h5>
                                    <h5 class="price mt-0 pb-2">লিড নিউজ : <span
                                            class="col-amber">{{ $news->lead_news == 0 ? 'না' : 'হ্যা' }}</span></h5>
                                    <h5 class="price mt-0 pb-2">নিউজ বক্স : <span
                                            class="col-amber">{{ $news->news_box == 0 ? 'না' : 'হ্যা' }}</span>
                                    </h5>
                                    <h5 class="price mt-0 pb-2">সংবাদের ধরন: <span class="col-amber">
                                            @if ($news->type == 0)
                                                সাধারণ সংবাদ
                                            @elseif($news->type == 1)
                                                মতামত
                                            @elseif($news->type == 2)
                                                খেলাধুলা
                                            @endif

                                        </span></h5>
                                    <h5 class="price mt-0 pb-2">প্রতিবেদকের নাম : <span
                                            class="col-amber">{{ $news->reporter }}</span></h5>
                                    <p class="price mt-0 pb-2">পুরো সংবাদ: {!! $news->news_body !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                $url = "{{ route('admin.news.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
