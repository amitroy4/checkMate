@extends('layouts.admin')
@section('title', 'Vendors')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Vendor</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addvendor">
                        <i class="fa fa-plus"></i>
                        New Vendor
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal for Adding vendor -->
                <div class="modal fade" id="addvendor" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Add New vendor</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('vendor.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">vendor Name <span class="required-label">*</span></label>
                                                <input id="vendor_name" type="text" class="form-control" name="vendor_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">vendor Designation</label>
                                                <input id="vendor_designation" type="text" class="form-control" name="vendor_designation">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Company Name</label>
                                                <input id="company_name" type="text" class="form-control" name="company_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">vendor Mobile Number</label>
                                                <input id="mobile_number" type="text" class="form-control" name="mobile_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">WhatsApp Number</label>
                                                <input id="whatsapp_number" type="text" class="form-control" name="whatsapp_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">vendor Email</label>
                                                <input id="email" type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <select id="status" class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
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
                <!-- Modal for Editing vendor -->
                <div class="modal fade" id="updatevendorModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Edit vendor</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" id="editvendorForm">
                                @csrf
                                @method('PUT') <!-- Use PUT for updates -->
                                <div class="modal-body">
                                    <input type="hidden" id="edit_vendor_id" name="vendor_id" value="">
                                    <div class="form-group">
                                        <label class="form-label">vendor Name <span class="required-label">*</span></label>
                                        <input id="edit_vendor_name" type="text" class="form-control" name="vendor_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">vendor Designation</label>
                                        <input id="edit_vendor_designation" type="text" class="form-control" name="vendor_designation">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Company Name</label>
                                        <input id="edit_company_name" type="text" class="form-control" name="company_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">vendor Mobile Number</label>
                                        <input id="edit_mobile_number" type="text" class="form-control" name="mobile_number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">WhatsApp Number</label>
                                        <input id="edit_whatsapp_number" type="text" class="form-control" name="whatsapp_number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">vendor Email</label>
                                        <input id="edit_email" type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select id="edit_status" class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
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
                                <th>vendor Name</th>
                                <th>Designation</th>
                                <th>Phone No</th>
                                <th>WhatsApp No</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>vendor Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendors as $index => $vendor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $vendor->vendor_name }}</td>
                                    <td>{{ $vendor->vendor_designation }}</td>
                                    <td>{{ $vendor->mobile_number }}</td>
                                    <td>{{ $vendor->whatsapp_number }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>{{ $vendor->company_name }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $vendor->status ? 'bg-primary' : 'bg-danger' }}">
                                            {{ $vendor->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="#" id="edit" class="btn btn-link btn-primary" data-bs-toggle="modal" data-bs-target="#updatevendorModal"
                                               data-vendor-id="{{ $vendor->id }}"
                                               data-vendor-name="{{ $vendor->vendor_name }}"
                                               data-vendor-designation="{{ $vendor->vendor_designation }}"
                                               data-company-name="{{ $vendor->company_name }}"
                                               data-mobile-number="{{ $vendor->mobile_number }}"
                                               data-whatsapp-number="{{ $vendor->whatsapp_number }}"
                                               data-email="{{ $vendor->email }}"
                                               data-status="{{ $vendor->status }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" style="display: inline-block;" onsubmit="event.preventDefault(); confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger">
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

@endsection

@section('scripts')
<script>
    $(document).on('click', '#edit', function () {
        const vendorId = $(this).data('vendor-id');
        const vendorName = $(this).data('vendor-name');
        const vendorDesignation = $(this).data('vendor-designation');
        const companyName = $(this).data('company-name');
        const mobileNumber = $(this).data('mobile-number');
        const whatsappNumber = $(this).data('whatsapp-number');
        const email = $(this).data('email');
        const status = $(this).data('status');
        console.log(status);


        // Populate the fields in the edit modal
        $('#edit_vendor_id').val(vendorId);
        $('#edit_vendor_name').val(vendorName);
        $('#edit_vendor_designation').val(vendorDesignation);
        $('#edit_company_name').val(companyName);
        $('#edit_mobile_number').val(mobileNumber);
        $('#edit_whatsapp_number').val(whatsappNumber);
        $('#edit_email').val(email);
        $('#edit_status').val(status); // Ensure the status dropdown is correctly set
    });

    $('#editvendorForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get the form data
    const formData = $(this).serialize(); // Serializes the form's elements

    const vendorId = $('#edit_vendor_id').val(); // Get the vendor ID for the URL

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `/dashboard/vendor/${vendorId}`,
        type: 'PUT',
        data: formData,
        success: function (response) {
            $('#updatevendorModal').modal('hide');
            location.reload();
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('An error occurred while updating the vendor. Please try again.'); // Optional user notification
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
                swal("Deleted!", "vendor has been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }
</script>
@endsection
