@extends('layouts.admin')
@section('title', 'Add Cheque Receive')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Add Cheque Receive</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <!-- Modal for Adding client -->
                    <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info border-0">
                                    <h5 class="modal-title">Add New client</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('extra.client.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">client Name <span class="required-label">*</span></label>
                                                    <input id="client_name" type="text" class="form-control" name="client_name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">client Designation</label>
                                                    <input id="client_designation" type="text" class="form-control" name="client_designation">
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
                                                    <label class="form-label">client Mobile Number</label>
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
                                                    <label class="form-label">client Email</label>
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
                                                <label class="form-label">Bank Name <span class="required-label">*</span></label>
                                                <input id="bank_name" type="text" class="form-control" name="bank_name" required>
                                                @error('bank_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Branch Name<span class="required-label">*</span></label>
                                                <input id="branch_name" type="text" class="form-control" name="branch_name" required>
                                                @error('branch_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Address<span class="required-label">*</span></label>
                                                <input id="address" type="text" class="form-control" name="address" required>
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
                    <form action="{{ route('chequereceive.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="company">Company <span class="required-label">*</span></label>
                                    <select id="company" class="form-control form-select" name="company_id">
                                        <option selected>Choose...</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_date">Cheque Receive Date<span class="required-label">*</span></label>
                                    <input id="cheque_date" type="date" class="form-control" name="cheque_date">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="client">Receive From <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="client" name="client_id" aria-label="Example select with button addon">
                                        <option selected>Choose...</option>
                                        @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->client_name}}</option>
                                        @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#addclient">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="bank">Bank <span class="required-label">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="bank" name="bank_id" aria-label="Example select with button addon">
                                        <option selected>Choose...</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                        @endforeach
                                        </select>
                                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#addbank">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="amount">Cheque Reveive Amount<span class="required-label">*</span></label>
                                    <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="receivetype">Receive Cheque Type<span class="required-label">*</span></label>
                                    <select id="receivetype" class="form-control form-select" name="receivetype">
                                        <option selected>Choose...</option>
                                        <option value="No Cross">No Cross</option>
                                        <option value="Cross Only">Cross Only</option>
                                        <option value="Cross A/C client + Not Negotiable + Or Brear">Cross A/C client + Not Negotiable + Or Brear</option>
                                        <option value="Cross A/C client + Or Brear">Cross A/C client + Or Brear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_receiver_name">Cheque Receiver Name<span class="required-label">*</span></label>
                                    <input id="cheque_receiver_name" type="text" class="form-control" placeholder="Enter Cheque Receiver Name" name="cheque_receiver_name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="cheque_number">Cheque Number<span class="required-label">*</span></label>
                                    <input id="cheque_number" type="text" class="form-control" placeholder="Enter Cheque Number" name="cheque_number">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="is_fly_cheque">IS Fly Cheque<span class="required-label">*</span></label>
                                    <select id="is_fly_cheque" class="form-control form-select" name="is_fly_cheque">
                                        <option selected>Choose...</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="submitButton" class="btn btn-success btn-lg mx-2" style="display: none;">Submit</button>
                            <button type="submit" id="printButton" class="btn btn-primary btn-lg mx-2" style="display: none;">Print</button>
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
                $('#submitButton').hide();
            } else if (flyChequeValue === '0') { // No
                $('#submitButton').show();
                $('#printButton').hide();
            } else {
                // Hide both buttons if "Choose..." is selected
                $('#submitButton').hide();
                $('#printButton').hide();
            }
        });
    });
</script>
@endsection
