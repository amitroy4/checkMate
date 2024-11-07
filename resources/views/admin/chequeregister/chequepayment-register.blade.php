@extends('layouts.admin')
@section('title', 'Client')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Manage Cheque Pay</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="fromDate">From Date</label>
                        <input id="fromDate" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="todate">To Date</label>
                        <input id="toDate" type="date" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="payee">Payee<span class="required-label">*</span></label>
                            <select id="payee" class="form-control" name="payee">
                              <option value="">Select Payee</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->company_name}}">{{$vendor->company_name}}</option>
                                    @endforeach
                            </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bank">Bank<span class="required-label">*</span></label>
                            <select id="bank" class="form-control" name="bank">
                                <option value="">Select bank</option>
                                @foreach ($banks as $bank)
                                        <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                                    @endforeach
                            </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select id="paytype" class="form-control" name="paytype">
                            <option value="">Select Pay Type</option>
                            <option value="No Cross">No Cross</option>
                            <option value="Cross Only">Cross Only</option>
                            <option value="Cross A/C Payee + Not Negotiable + Or Brear">Cross A/C Payee + Not Negotiable + Or Brear</option>
                            <option value="Cross A/C Payee + Or Brear">Cross A/C Payee + Or Brear</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-end col-md-1">
                        <button type="button" class="btn btn-info mb-2" id="filterButton">Download</button>
                    </div>
                </div>
                <hr>


                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Issue Date</th>
                                <th>Bank Name</th>
                                <th>Vendor Name</th>
                                <th>Cheque Amount</th>
                                <th>Clearing Date</th>
                                <th>Type Of Cheque</th>
                                <th>Cheque Status</th>
                                <th>Over Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chequepays as $key=>$chequepay)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$chequepay->cheque_date}}</td>
                                <td>{{$chequepay->bank->bank_name}}</td>
                                <td>{{$chequepay->company->company_name}}</td>
                                <td>{{$chequepay->amount}}</td>
                                <td>{{$chequepay->cheque_clearing_date ?? "N/A"}}</td>
                                <td>{{$chequepay->paytype}}</td>
                                <td>
                                    @if ($chequepay->cheque_status == 'Approved')
                                        <span class="badge rounded-pill bg-success">{{$chequepay->cheque_status}}</span>
                                    @endif
                                    @if ($chequepay->cheque_status == 'Rejected')
                                        <span class="badge rounded-pill bg-danger">{{$chequepay->cheque_status}}</span>
                                    @endif
                                    @if ($chequepay->cheque_status == 'Pending')
                                        <span class="badge rounded-pill bg-info">{{$chequepay->cheque_status}}</span>
                                    @endif
                                    @if ($chequepay->cheque_status == 'Bounce')
                                        <span class="badge rounded-pill bg-warning">{{$chequepay->cheque_status}}</span>
                                    @endif
                                </td>
                                <td>23-10-2024</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


            {{-- @if (session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
            @elseif (session('danger'))
            <span class="alert alert-danger">{{session('danger')}}</span>
            @endif --}}
        </div>
    </div>
</div>
@endsection


