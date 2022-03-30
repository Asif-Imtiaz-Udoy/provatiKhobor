@extends('layouts.backend')
@section('contents')
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card font-kalpurush mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <h5 class="text-white">মতামত</h5>
                    <a type="button" href="{{ route('admin.user.create') }}" class="btn btn-success"><i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($users as $admin)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">{{ $admin->name }}</td>
                                    <td class="text-center">{{ $admin->email }}</td>
                                    <td  class="text-center">
                                        @foreach($admin->roles as $role)
                                        {{ $role->name }}
                                        @endforeach
    
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-link text-primary"
                                            href="{{ route('admin.user.edit', $admin->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button id="{{ $admin->id }}" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-sm btn-link text-danger delete" type="button"><i
                                                class="fas fa-trash"></i></button>
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
                $url = "{{ route('admin.user.destroy', '') }}" + "/" + id
                $('#deleteForm').attr('action', $url);
            });
        });
    </script>
@endsection
