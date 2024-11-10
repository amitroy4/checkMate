@extends('layouts.admin')
@section('title', 'Cheque Pay')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"> Manage Cheque Pay</h4>
                    <a href="{{ route('chequepay.create') }}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> New Cheque Pay
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal for Show Reason -->
                <div class="modal fade" id="show_reason" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">Reason</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <p id="reason-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="date">Date</label>
                        <input id="date" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="payee">Payee</label>
                        <select id="payee" class="form-control" name="payee">
                            <option value="">Select Payee</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->vendor_name }}">{{ $vendor->vendor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bank">Bank</label>
                        <select id="bank" class="form-control" name="bank">
                            <option value="">Select bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="paytype">Pay Type</label>
                        <select id="paytype" class="form-control" name="paytype">
                            <option value="">Select Pay Type</option>
                            <option value="No Cross">No Cross</option>
                            <option value="Cross Only">Cross Only</option>
                            <option value="Cross A/C Payee / Not Negotiable / Or Brear">Cross A/C Payee / Not Negotiable / Or Brear</option>
                            <option value="Cross A/C Payee / Or Brear">Cross A/C Payee / Or Brear</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-end col-md-1">
                        <button type="button" class="btn btn-info mb-2" id="filterButton">Show</button>
                    </div>
                </div>
                <hr>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Vendor Name</th>
                                <th>Cheque Date</th>
                                <th>Bank Name</th>
                                <th>Cheque Amount</th>
                                <th>Clearing Date</th>
                                <th>Cheque Type</th>
                                <th>Cheque Status</th>
                                <th>Over Date</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chequepays as $key => $chequepay)

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $chequepay->payee->vendor_name }}</td>
                                    <td>{{ $chequepay->cheque_date }}</td>
                                    <td>{{ $chequepay->bank->bank_name }}</td>
                                    <td>{{ $chequepay->amount }}</td>
                                    <td>{{ $chequepay->cheque_clearing_date ?? 'N/A' }}</td>
                                    <td>{{ $chequepay->paytype }}</td>
                                    <td>
                                        <select id="cheque_status_{{ $chequepay->id }}" class="form-control form-select cheque-status" name="cheque_status" data-id="{{ $chequepay->id }}" required>
                                            <option value="" disabled>Choose...</option>
                                            <option value="Pending" {{ $chequepay->cheque_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Approved" {{ $chequepay->cheque_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="Rejected" {{ $chequepay->cheque_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="Bounce" {{ $chequepay->cheque_status == 'Bounce' ? 'selected' : '' }}>Bounce</option>
                                        </select>
                                        <div class="reason-group" id="reason-group-{{ $chequepay->id }}" style="display: {{ in_array($chequepay->cheque_status, ['Rejected', 'Bounce']) ? 'block' : 'none' }};">
                                            <textarea id="cheque_reason_{{ $chequepay->id }}" class="form-control cheque-reason" name="cheque_reason">{{ $chequepay->cheque_reason }}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $clearingDate = \Carbon\Carbon::parse($chequepay->cheque_clearing_date);
                                            $today = \Carbon\Carbon::today();
                                        @endphp
                                        @if ($clearingDate->isPast())
                                            Over
                                        @else
                                            {{ $today->diffInDays($clearingDate) }} days left.
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{route('pdf.chequepayee', $chequepay->id)}}" class="btn btn-link btn-info edit" data-bs-toggle="tooltip" title="Print" target="_blank">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                            <a href="{{ route('chequepay.edit', $chequepay->id) }}" class="btn btn-link btn-primary edit" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('chequepay.destroy', $chequepay->id) }}" method="POST" class="d-inline-block" onsubmit="event.preventDefault(); confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger delete" data-bs-toggle="tooltip" title="Delete">
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
$(document).ready(function() {
    var table = $('#datatable').DataTable(); // Initialize DataTable

    $('#filterButton').click(function() {
        // Capture filter values and apply them to DataTable
        var date = $('#date').val();
        var payee = $('#payee').val();
        var bank = $('#bank').val();
        var paytype = $('#paytype').val();

        table.columns(2).search(date ? '^' + date + '$' : '', true, false)
            .columns(1).search(payee ? '^' + payee + '$' : '', true, false)
            .columns(3).search(bank ? '^' + bank + '$' : '', true, false)
            .columns(6).search(paytype ? '^' + paytype + '$' : '', true, false)
            .draw();
    });

    // Handle showing reason modal
    $('#show_reason').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var reason = button.data('reason');
        $('#reason-text').text(reason || 'No reason provided');
    });

    // Handle status change and show reason if necessary
    $('.cheque-status').on('change', function() {
        var id = $(this).data('id');
        var selectedStatus = $(this).val();
        var reasonGroup = $('#reason-group-' + id);
        var reasonField = $('#cheque_reason_' + id);

        // Show or hide reason field based on status
        reasonGroup.toggle(selectedStatus === 'Rejected' || selectedStatus === 'Bounce');

        // Clear the reason field if status is Pending or Approved
        if (selectedStatus === 'Pending' || selectedStatus === 'Approved') {
            reasonField.val(''); // Clear the reason
            reasonGroup.hide(); // Hide the reason textarea
        }

        // AJAX call to update cheque status
        $.ajax({
            url: '{{ route("chequepay.updateStatus") }}', // Replace with your route
            method: 'POST',
            data: {
                cheque_status: selectedStatus,
                cheque_reason: selectedStatus === 'Rejected' || selectedStatus === 'Bounce' ? reasonField.val() : null,
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Optionally display a success message
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });

    // Handle cheque reason change
    $('.cheque-reason').on('input', function() {
        var id = $(this).attr('id').split('_')[2]; // Extract ID from the textarea ID
        var reasonValue = $(this).val();
        var statusField = $('#cheque_status_' + id);
        var selectedStatus = statusField.val();

        // AJAX call to update cheque reason
        $.ajax({
            url: '{{ route("chequepay.updateReason") }}', // Replace with your route
            method: 'POST',
            data: {
                cheque_reason: selectedStatus === 'Rejected' || selectedStatus === 'Bounce' ? reasonValue : null,
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Optionally display a success message
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});


function confirmDelete(form) {
        swal({
            title: "Are you sure?",
            text: "Want to delete this",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    visible: true,
                    className: "btn btn-default"
                },
                confirm: {
                    text: "Yes, delete it!",
                    className: "btn btn-danger"
                }
            },
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                form.submit(); // Submit the form if confirmed
                swal("Deleted!", "The item has been successfully deleted.", "success");
            }
        });
    }

</script>
@endsection
