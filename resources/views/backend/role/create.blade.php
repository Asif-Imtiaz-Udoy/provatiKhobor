@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">এডমিন তৈরী করুন</h5>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.role.store')}}" method="post">

                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            @foreach($permissions as $permission)
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                                        id="permission_{{$permission->id}}" name="permissions[]"
                                        value="{{ $permission->name }}">
                                    <label class="form-check-label" for="permission_{{$permission->id}}">
                                        {{$permission->name}}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
