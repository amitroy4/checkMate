@extends('layouts.admin')
@section('title', 'Roles')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Role</h4>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal for Editing role -->
                <div class="modal fade" id="updateroleModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Edit role</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" id="editroleForm">
                                @csrf
                                @method('PUT')
                                <!-- Use PUT for updates -->
                                <div class="modal-body">
                                    <input type="hidden" id="edit_role_id" name="role_id" value="">
                                    <div class="form-group">
                                        <label class="form-label">Name <span
                                                class="required-label">*</span></label>
                                        <input id="edit_role_name" type="text" class="form-control" name="role_name" placeholder="Role Name"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-danger btn-round"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-round">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-around">
                    <div class="col-4 p-10">
                        <div class="card">
                            <h5 class="card-header">Add Role</h5>
                            <div class="card-body">
                                <form action="{{ route('manageuserrole.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Role Name <span
                                                            class="required-label">*</span></label>
                                                    <input id="role_name" type="text" class="form-control"
                                                        name="role_name" placeholder="Role Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-success btn-round">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>

                    </div>
                    <div class="col-6">
                        <div class="card">
                            <h5 class="card-header">Manage Role</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Role</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $index => $role)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $role->role_name }}</td>
                                                <td style="width: 100px;">
                                                    <div class="form-button-action">

                                                        <a href="#" id="edit" class="btn btn-link btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#updateroleModal" data-role-id="{{ $role->id }}"
                                                            data-role-role_name="{{ $role->role_name }}"
                                                            data-bs-toggle="tooltip"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('manageuserrole.destroy', $role->id) }}" method="POST"
                                                            style="display: inline-block;"
                                                            onsubmit="event.preventDefault(); confirmDelete(this);">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link btn-danger"
                                                                data-bs-toggle="tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

@section('scripts')
<script>
    $(document).on('click', '#edit', function () {
        const roleId = $(this).data('role-id');
        const roleName = $(this).data('role-role_name');
        console.log(status);


        // Populate the fields in the edit modal
        $('#edit_role_id').val(roleId);
        $('#edit_role_name').val(roleName);
    });

    $('#editroleForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the form data
        const formData = $(this).serialize(); // Serializes the form's elements

        const roleId = $('#edit_role_id').val(); // Get the role ID for the URL

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `/dashboard/manageuserrole/${roleId}`,
            type: 'PUT',
            data: formData,
            success: function (response) {
                $('#updateroleModal').modal('hide');
                location.reload();
                $.notify({
                    // Options
                    message: '{{ session('
                    success ') }}'
                }, {
                    // Settings
                    type: 'success',
                    delay: 3000,
                    allow_dismiss: true,
                    placement: {
                        from: "bottom",
                        align: "right"
                    }
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert(
                'An error occurred while updating the role. Please try again.'); // Optional role notification
            }
        });
    });

    function confirmDelete(form) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            icon: "warning",
            buttons: ["Cancel", "Yes, delete it!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
                swal("Deleted!", "role been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }

</script>
@endsection
