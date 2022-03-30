@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">নামাজের সময়সুচি</h5>
                    <button data-toggle="modal" data-target="#createModal" class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
                </div>
                <div class="table-responsive p-3">
                    @foreach ($prayers as $prayer)
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <tr class="text-center">
                                <th scope="col">ওয়াক্তের নাম</th>
                                <th scope="col"> </th>
                                <td scope="col">সময়</td>
                                <td scope="col">এ্যাকশন</td>
                            </tr>
                            <tr class="text-center">
                                <th> ফজরের নামাজ </th>
                                <th> : </th>
                                <td>{{ $prayer->fozor }} ‍<span>am</span></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th> যোহরের নামাজ </th>
                                <th> : </th>
                                <td>
                                    {{ $prayer->johor }} <span>am</span>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th> আছরের নামাজ </th>
                                <th> : </th>
                                <td>
                                    {{ $prayer->ashor }} <span>pm</span>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th>মাগরিবের নামাজ </th>
                                <th> : </th>
                                <td>
                                    {{ $prayer->magriv }} <span>pm</span>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th> এশার নামাজ</th>
                                <th> : </th>
                                <td> {{ $prayer->esha }} <span>pm</span></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th> সূর্যদয়</th>
                                <th> : </th>
                                <td> {{ $prayer->sunrise }} <span>am</span></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th> সূর্যাস্ত</th>
                                <th> : </th>
                                <td> {{ $prayer->sunset }} <span>pm</span></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-link text-primary"
                                        href="{{ route('admin.prayer.edit', $prayer->id) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button id="{{ $prayer->id }}" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-link text-danger delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </table>
                    @endforeach
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
                <form action="{{ route('admin.prayer.store') }}" method="post">
                    @csrf
                    <div class="modal-header border-none">
                        <h5 class="modal-title" id="exampleModalLabelLogout">নামাজের সময়সুচি এড করুন</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="fozor" class="col-sm-3 col-form-label text-nowrap">ফজরের নামাজ <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fozor" id="fozor">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="johor" class="col-sm-3 col-form-label text-nowrap">যোহরের নামাজ <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="johor" id="johor">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="ashor" class="col-sm-3 col-form-label text-nowrap">আছরের নামাজ <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ashor" id="ashor">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="magriv" class="col-sm-3 col-form-label text-nowrap">মাগরিবের নামাজ <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="magriv" id="magriv">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="esha " class="col-sm-3 col-form-label text-nowrap">এশার নামাজ <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="esha" id="esha">
                            </div>
                        </div>
                    </div>


                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="sunrise" class="col-sm-3 col-form-label text-nowrap">সূর্যদয় <span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sunrise" id="sunrise">
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row d-flex">
                            <label for="sunset" class="col-sm-3 col-form-label text-nowrap">সূর্যাস্ত<span
                                    class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sunset" id="sunset"
                                    placeholder="Insert Order Id">
                                </select>
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
                $url = "{{ route('admin.prayer.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
