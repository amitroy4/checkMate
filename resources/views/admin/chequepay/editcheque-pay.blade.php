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
                                            <option value="{{ $company->id }}" {{ $chequePay->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_date">Cheque Payment Date<span class="required-label">*</span></label>
                                    <input id="cheque_date" type="date" class="form-control" name="cheque_date" value="{{ $chequePay->cheque_date }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="payee">Payee <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="payee" name="payee_id" aria-label="Example select with button addon" required>
                                            <option value="" disabled>Choose...</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" {{ $chequePay->payee_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#addvendor">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="bank">Bank <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="bank" name="bank_id" aria-label="Example select with button addon" required>
                                            <option value="" disabled>Choose...</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}" {{ $chequePay->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#addbank">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="amount">Cheque Amount<span class="required-label">*</span></label>
                                    <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount" value="{{ $chequePay->amount }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="paytype">Payment Type<span class="required-label">*</span></label>
                                    <select id="paytype" class="form-control form-select" name="paytype" required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="No Cross" {{ $chequePay->paytype == 'No Cross' ? 'selected' : '' }}>No Cross</option>
                                        <option value="Cross Only" {{ $chequePay->paytype == 'Cross Only' ? 'selected' : '' }}>Cross Only</option>
                                        <option value="Cross A/C Payee + Not Negotiable + Or Brear" {{ $chequePay->paytype == 'Cross A/C Payee + Not Negotiable + Or Brear' ? 'selected' : '' }}>Cross A/C Payee + Not Negotiable + Or Brear</option>
                                        <option value="Cross A/C Payee + Or Brear" {{ $chequePay->paytype == 'Cross A/C Payee + Or Brear' ? 'selected' : '' }}>Cross A/C Payee + Or Brear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_number">Cheque Number<span class="required-label">*</span></label>
                                    <input id="cheque_number" type="text" class="form-control" placeholder="Enter Cheque Number" name="cheque_number" value="{{ $chequePay->cheque_number }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="is_fly_cheque">IS Fly Cheque<span class="required-label">*</span></label>
                                    <select id="is_fly_cheque" class="form-control form-select" name="is_fly_cheque" required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="1" {{ $chequePay->is_fly_cheque == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $chequePay->is_fly_cheque == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_status">Cheque Status</label>
                                    <select id="cheque_status" class="form-control form-select" name="cheque_status" required>
                                        <option value="" disabled>Choose...</option>
                                        <option value="Pending" {{ $chequePay->paytype == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $chequePay->paytype == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="Reject" {{ $chequePay->paytype == 'Reject' ? 'selected' : '' }}>Reject</option>
                                        <option value="Bounce" {{ $chequePay->paytype == 'Bounce' ? 'selected' : '' }}>Bounce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_clearing_date">Cheque Payment Date</label>
                                    <input id="cheque_clearing_date" type="date" class="form-control" name="cheque_clearing_date" value="{{ $chequePay->cheque_clearing_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                            <button type="button" id="printButton" class="btn btn-primary btn-lg mx-2" style="display: none;">Print</button>
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
    });
</script>
@endsection
