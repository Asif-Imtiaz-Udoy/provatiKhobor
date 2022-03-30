@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল বিজ্ঞাপন</h5>
                    <a type="button" href="{{ route('admin.advertisement.create') }}" class="btn btn-success"><i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="table-responsive p-3">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="card pl-2">
                                <div class="header">
                                    <h2><strong>বিস্তারিত</strong> সংবাদ</h2>
                                    <ul class="header-dropdown">
                                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                            <ul class="dropdown-menu dropdown-menu-right" style="list-style: none">
                                                <li><a
                                                        href="{{ route('admin.advertisement.edit', $advertisement->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" id={{ $advertisement->id }}
                                                        class="delete" data-toggle="modal"
                                                        data-target="#deleteModal">Delete</a>
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
                                                            src="{{ url('/images/advertisement/' . $advertisement->add_image) }}"
                                                            class="shadow-sm w-100" alt="profile-image"></a>
                                                    <h4 class="m-t-10">{{ $advertisement->image_caption }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-8 col-md-12">
                                            <div class="product details">
                                                <h3 class="product-title mb-0 pb-2">বিজ্ঞাপনের অবস্থান :
                                                    {{ $advertisement->title }}
                                                </h3>
                                                <h5 class="price mt-0 pb-2">বিজ্ঞাপনের ধরন : <span class="col-amber">
                                                        {{ $advertisement->ad_category == 1 ? 'top left sidebar' : '' }}
                                                        {{ $advertisement->ad_category == 2 ? 'under main lead news' : '' }}
                                                        {{ $advertisement->ad_category == 3 ? 'under first news section' : '' }}
                                                        {{ $advertisement->ad_category == 4 ? 'under sofol person' : '' }}
                                                        {{ $advertisement->ad_category == 5 ? 'under motamot' : '' }}
                                                        {{ $advertisement->ad_category == 6 ? 'under sport' : '' }}
                                                        {{ $advertisement->ad_category == 7 ? 'top of photo gallery' : '' }}
                                                        {{ $advertisement->ad_category == 8 ? 'bottom ot photo gallery' : '' }}
                                                    </span></h5>
                                                <h5 class="price mt-0 pb-2">বিজ্ঞাপনদাতা : <span
                                                        class="col-amber">{{ $advertisement->vendo }}</span>
                                                </h5>
                                                <h5 class="price mt-0 pb-2">স্ক্রিপ্ট : <span
                                                        class="col-amber">{{ $advertisement->add_script == true ? $advertisement->add_script : 'নাই' }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
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
                $url = "{{ route('admin.advertisement.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
