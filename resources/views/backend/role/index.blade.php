@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">সকল রোল পারমিশন</h5>
                    <a type="button" href="{{ route('admin.role.create') }}" class="btn btn-success"><i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @php $count = 1; @endphp -->
                            @foreach ($roles as $role)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{!! $role->name !!}</td>
                                    <td>

                                        @foreach ($role->permissions as $permission)
                                            <span class="badge badge-primary">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>

                                        <a class="btn btn-sm btn-link text-primary"
                                            href="{{ route('admin.role.edit', $role->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $role->id }}" data-toggle="modal" data-target="#deleteModal"
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
                $url = "{{ route('admin.role.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
