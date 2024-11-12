@extends('layouts.admin')
@section('title', 'Edit Cheque Pay')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Edit Cheque Pay</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="modal-body">
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
                                <form action="{{ route('extra.vendor.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Vendor Name <span class="required-label">*</span></label>
                                                    <input id="vendor_name" type="text" class="form-control"
                                                        name="vendor_name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Vendor Mobile Number <span class="required-label">*</span></label>
                                                    <input id="mobile_number" type="text" class="form-control"
                                                        name="mobile_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="display: none;">
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
                                <form action="{{ route('extra.bank.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-label">Bank Name <span
                                                        class="required-label">*</span></label>
                                                <input id="bank_name" type="text" class="form-control" name="bank_name"
                                                    required>
                                                @error('bank_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Branch Name<span
                                                        class="required-label">*</span></label>
                                                <input id="branch_name" type="text" class="form-control"
                                                    name="branch_name" required>
                                                @error('branch_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
                    <form action="{{ route('chequepay.update', $chequePay->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="company">Company <span class="required-label">*</span></label>
                                    <select id="company" class="form-control form-select" name="company_id" required>
                                        <option value="" disabled>Choose...</option>
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $chequePay->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_date">Cheque Payment Date<span
                                            class="required-label">*</span></label>
                                    <input id="cheque_date" type="date" class="form-control" name="cheque_date"
                                        value="{{ $chequePay->cheque_date }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="payee">Payee <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="payee" name="payee_id"
                                            aria-label="Example select with button addon" required>
                                            <option value="" disabled>Choose...</option>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                {{ $chequePay->payee_id == $vendor->id ? 'selected' : '' }}>
                                                {{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal"
                                            data-bs-target="#addvendor">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="bank">Bank <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="bank" name="bank_id"
                                            aria-label="Example select with button addon" required>
                                            <option value="" disabled>Choose...</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}"
                                                {{ $chequePay->bank_id == $bank->id ? 'selected' : '' }}>
                                                {{ $bank->bank_name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal"
                                            data-bs-target="#addbank">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="amount">Cheque Amount<span class="required-label">*</span></label>
                                    <input id="amount" type="number" class="form-control" placeholder="Enter Amount"
                                        name="amount" value="{{ $chequePay->amount }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="paytype">Payment Type<span class="required-label">*</span></label>
                                    <select id="paytype" class="form-control form-select" name="paytype" required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="No Cross"
                                            {{ $chequePay->paytype == 'No Cross' ? 'selected' : '' }}>No Cross</option>
                                        <option value="Cross Only"
                                            {{ $chequePay->paytype == 'Cross Only' ? 'selected' : '' }}>Cross Only
                                        </option>
                                        <option value="Cross A/C Payee + Not Negotiable + Or Brear"
                                            {{ $chequePay->paytype == 'Cross A/C Payee + Not Negotiable + Or Brear' ? 'selected' : '' }}>
                                            Cross A/C Payee + Not Negotiable + Or Brear</option>
                                        <option value="Cross A/C Payee + Or Brear"
                                            {{ $chequePay->paytype == 'Cross A/C Payee + Or Brear' ? 'selected' : '' }}>
                                            Cross A/C Payee + Or Brear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_number">Cheque Number<span
                                            class="required-label">*</span></label>
                                    <input id="cheque_number" type="text" class="form-control"
                                        placeholder="Enter Cheque Number" name="cheque_number"
                                        value="{{ $chequePay->cheque_number }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_clearing_date">Cheque Clearing Date</label>
                                    <input id="cheque_clearing_date" type="date" class="form-control"
                                        name="cheque_clearing_date" value="{{ $chequePay->cheque_clearing_date }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_status">Cheque Status</label>
                                    <select id="cheque_status" class="form-control form-select" name="cheque_status"
                                        required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="Pending" {{ $chequePay->cheque_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $chequePay->cheque_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="Rejected" {{ $chequePay->cheque_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="Bounce" {{ $chequePay->cheque_status == 'Bounce' ? 'selected' : '' }}>Bounce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3" id="reason-group" style="display: none;">
                                <div class="form-group">
                                    <label for="cheque_reason">Reason</label>
                                    <textarea id="cheque_reason" type="text" class="form-control" name="cheque_reason">{{ $chequePay->cheque_reason}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="is_fly_cheque">IS Fly Cheque<span
                                            class="required-label">*</span></label>
                                    <select id="is_fly_cheque" class="form-control form-select" name="is_fly_cheque"
                                        required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="1" {{ $chequePay->is_fly_cheque == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $chequePay->is_fly_cheque == 0 ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                            <button type="button" id="printButton" class="btn btn-primary btn-lg mx-2"
                                style="display: none;">Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#is_fly_cheque').change(function () {
            const flyChequeValue = $(this).val();

            if (flyChequeValue === '1') { // Yes
                $('#printButton').show();
            } else if (flyChequeValue === '0') { // No
                $('#printButton').hide();
            } else {
                // Hide both buttons if "Choose..." is selected
                $('#printButton').hide();
            }
        });


        $('#cheque_status').change(function () {
            const chequeStatus = $(this).val();
            if (chequeStatus === 'Rejected' || chequeStatus === 'Bounce') {
                $('#reason-group').show();
            } else {
                $('#reason-group').hide();
                $('#cheque_reason').val(''); // Clear the textarea when hiding
            }
        }).trigger('change'); // Trigger change on load to set the initial state

    });

</script>
@endsection
