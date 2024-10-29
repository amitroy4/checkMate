@extends('layouts.admin')
@section('title', 'Client')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Add Cheque Pay</h4>
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
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="payee">Company <span class="required-label">*</span></label>
                                <select id="payee" class="form-control form-select" name="payee">
                                    <option selected>Choose...</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="date">Cheque Payment Date<span class="required-label">*</span></label>
                                <input id="date" type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="payee">Payee <span class="required-label">*</span></label>
                                <div class="input-group">
                                    <select class="form-select" id="payee" name="payee" aria-label="Example select with button addon">
                                      <option selected>Choose...</option>
                                      @foreach ($vendors as $vendor)
                                      <option value="{{$vendor->vendor_name}}">{{$vendor->vendor_name}}</option>
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
                                    <select class="form-select" id="bank" name="bank" aria-label="Example select with button addon">
                                      <option selected>Choose...</option>
                                      @foreach ($banks as $bank)
                                      <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                                      @endforeach
                                    </select>
                                    <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#addbank">+</button>
                                  </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="amount">Cheque Amount<span class="required-label">*</span></label>
                                <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="paytype">Payment Type<span class="required-label">*</span></label>
                                <select id="paytype" class="form-control form-select" name="paytype">
                                    <option selected>Choose...</option>
                                    <option value="">No Cross</option>
                                    <option value="">Cross Only</option>
                                    <option value="">Cross A/C Payee + Not Negotiable + Or Brear</option>
                                    <option value="">Cross A/C Payee + Or Brear</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="amount">Cheque Number<span class="required-label">*</span></label>
                                <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="flyCheque">IS Fly Cheque<span
                                        class="required-label">*</span></label>
                                <select id="flyCheque" class="form-control form-select" name="flyCheque">
                                    <option selected>Choose...</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="Submit" class="btn btn-secondary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
