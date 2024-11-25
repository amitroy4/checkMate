@extends('layouts.admin')
@section('title', 'Banks')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Bank</h4>
                    @can('Add Bank')
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addbank">
                        <i class="fa fa-plus"></i>
                        New Bank
                    </button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <!-- Modal for Adding bank -->
                <div class="modal fade" id="addbank" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Add New bank</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('bank.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="form-label">Bank Name <span class="required-label">*</span></label>
                                            <input id="bank_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                            @error('bank_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Branch Name<span class="required-label">*</span></label>
                                            <input id="branch_name" type="text" class="form-control" name="branch_name" placeholder="Branch Name" required>
                                            @error('branch_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input id="address" type="text" class="form-control" name="address" placeholder="Address">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-danger btn-round" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-round">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal for Editing bank -->
                <div class="modal fade" id="updatebankModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Edit bank</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" id="editbankForm">
                                @csrf
                                @method('PUT') <!-- Use PUT for updates -->
                                <div class="modal-body">
                                    <input type="hidden" id="edit_bank_id" name="bank_id" value="">
                                    <div class="form-group">
                                        <label class="form-label">Bank Name <span class="required-label">*</span></label>
                                        <input id="edit_bank_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                        @error('bank_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Branch Name<span class="required-label">*</span></label>
                                        <input id="edit_branch_name" type="text" class="form-control" name="branch_name" placeholder="Branch Name" required>
                                        @error('branch_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input id="edit_address" type="text" class="form-control" name="address" placeholder="Address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-danger btn-round" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-round">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Bank Name</th>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banks as $index => $bank)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $bank->bank_name }}</td>
                                    <td>{{ $bank->branch_name }}</td>
                                    <td>{{ $bank->address }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Update Bank')
                                            <a href="#" id="edit" class="btn btn-link btn-primary" data-bs-toggle="modal" data-bs-target="#updatebankModal"
                                               data-bank-id="{{ $bank->id }}"
                                               data-bank-name="{{ $bank->bank_name }}"
                                               data-branch-name="{{ $bank->branch_name }}"
                                               data-address="{{ $bank->address }}" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('Delete Bank')
                                            <form action="{{ route('bank.destroy', $bank->id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            @endcan
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

@endsection

@section('scripts')
<script>
    $(document).on('click', '#edit', function () {
        const bankId = $(this).data('bank-id');
        const bankName = $(this).data('bank-name');
        const branchName = $(this).data('branch-name');
        const address = $(this).data('address');


        // Populate the fields in the edit modal
        $('#edit_bank_id').val(bankId);
        $('#edit_bank_name').val(bankName);
        $('#edit_branch_name').val(branchName);
        $('#edit_address').val(address);
    });

    $('#editbankForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get the form data
    const formData = $(this).serialize(); // Serializes the form's elements

    const bankId = $('#edit_bank_id').val(); // Get the bank ID for the URL

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `/dashboard/bank/${bankId}`,
        type: 'PUT',
        data: formData,
        success: function (response) {
            $('#updatebankModal').modal('hide');
            location.reload();
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('An error occurred while updating the bank. Please try again.'); // Optional user notification
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
                swal("Deleted!", "bank has been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }
</script>
@endsection
