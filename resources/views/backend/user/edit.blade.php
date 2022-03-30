@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">এডমিন এডিট করুন</h5>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('admin.user.update', $user->id )}}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name}}">
                                        @if ($errors->has('name'))
                                        <span style="color:red">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                        <span style="color:red">{!! $errors->first('email') !!}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="role">Roles</label>
                                    <select id="roles" class="form-control" name="roles">
                                        <option value="" selected disabled="">---select Role---</option>
                                        @foreach($roles as $role)
                                        <option @if($user->hasRole($role->name)) selected @endif
                                            value="{{$role->name}}">{{ $role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

