@extends('layouts.admin')
@section('title', 'Clients')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Client</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addclient">
                        <i class="fa fa-plus"></i>
                        New Client
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal for Adding Client -->
                <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Add New Client</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('client.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Client Name <span
                                                        class="required-label">*</span></label>
                                                <input id="client_name" type="text" class="form-control"
                                                    name="client_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Client Designation</label>
                                                <input id="client_designation" type="text" class="form-control"
                                                    name="client_designation">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Company Name</label>
                                                <input id="company_name" type="text" class="form-control"
                                                    name="company_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Client Mobile Number</label>
                                                <input id="mobile_number" type="text" class="form-control"
                                                    name="mobile_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">WhatsApp Number</label>
                                                <input id="whatsapp_number" type="text" class="form-control"
                                                    name="whatsapp_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Client Email</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    required>
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
                                    <button type="button" class="btn btn-danger btn-round"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-round">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal for Editing Client -->
                <div class="modal fade" id="updateClientModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Edit Client</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" id="editClientForm">
                                @csrf
                                @method('PUT')
                                <!-- Use PUT for updates -->
                                <div class="modal-body">
                                    <input type="hidden" id="edit_client_id" name="client_id" value="">
                                    <div class="form-group">
                                        <label class="form-label">Client Name <span
                                                class="required-label">*</span></label>
                                        <input id="edit_client_name" type="text" class="form-control" name="client_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Client Designation</label>
                                        <input id="edit_client_designation" type="text" class="form-control"
                                            name="client_designation">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Company Name</label>
                                        <input id="edit_company_name" type="text" class="form-control"
                                            name="company_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Client Mobile Number</label>
                                        <input id="edit_mobile_number" type="text" class="form-control"
                                            name="mobile_number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">WhatsApp Number</label>
                                        <input id="edit_whatsapp_number" type="text" class="form-control"
                                            name="whatsapp_number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Client Email</label>
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
                                    <button type="button" class="btn btn-danger btn-round"
                                        data-bs-dismiss="modal">Close</button>
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
                                <th>Client Name</th>
                                <th>Designation</th>
                                <th>Phone No</th>
                                <th>WhatsApp No</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Client Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $index => $client)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $client->client_name }}</td>
                                <td>{{ $client->client_designation }}</td>
                                <td>{{ $client->mobile_number }}</td>
                                <td>{{ $client->whatsapp_number }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->company_name }}</td>
                                <td>
                                    @if ($client->status)
                                    <a href="{{route('status.client',$client->id)}}"
                                        class="badge rounded-pill bg-primary text-decoration-none">
                                        Active
                                    </a>
                                    @else
                                    <a href="{{route('status.client',$client->id)}}"
                                        class="badge rounded-pill bg-danger text-decoration-none">
                                        Inactive
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="#" id="edit" class="btn btn-link btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateClientModal" data-client-id="{{ $client->id }}"
                                            data-client-name="{{ $client->client_name }}"
                                            data-client-designation="{{ $client->client_designation }}"
                                            data-company-name="{{ $client->company_name }}"
                                            data-mobile-number="{{ $client->mobile_number }}"
                                            data-whatsapp-number="{{ $client->whatsapp_number }}"
                                            data-email="{{ $client->email }}" data-status="{{ $client->status }}"
                                            title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('client.destroy', $client->id) }}" method="POST"
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

@endsection

@section('scripts')
<script>
    $(document).on('click', '#edit', function () {
        const clientId = $(this).data('client-id');
        const clientName = $(this).data('client-name');
        const clientDesignation = $(this).data('client-designation');
        const companyName = $(this).data('company-name');
        const mobileNumber = $(this).data('mobile-number');
        const whatsappNumber = $(this).data('whatsapp-number');
        const email = $(this).data('email');
        const status = $(this).data('status');
        console.log(status);


        // Populate the fields in the edit modal
        $('#edit_client_id').val(clientId);
        $('#edit_client_name').val(clientName);
        $('#edit_client_designation').val(clientDesignation);
        $('#edit_company_name').val(companyName);
        $('#edit_mobile_number').val(mobileNumber);
        $('#edit_whatsapp_number').val(whatsappNumber);
        $('#edit_email').val(email);
        $('#edit_status').val(status); // Ensure the status dropdown is correctly set
    });

    $('#editClientForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the form data
        const formData = $(this).serialize(); // Serializes the form's elements

        const clientId = $('#edit_client_id').val(); // Get the client ID for the URL

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: `/dashboard/client/${clientId}`,
            type: 'PUT',
            data: formData,
            success: function (response) {
                $('#updateClientModal').modal('hide');
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
                'An error occurred while updating the client. Please try again.'); // Optional user notification
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
                swal("Deleted!", "Client been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }

</script>
@endsection
