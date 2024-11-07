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
                            </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bank">Bank<span class="required-label">*</span></label>
                            <select id="bank" class="form-control" name="bank">
                                <option value="">Select bank</option>
                            </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="paytype">Pay Type<span class="required-label">*</span></label>
                                <select id="paytype" class="form-control" name="paytype">
                                    <option value="">Select Pay Type</option>
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
                            <tr>
                                <td>1</td>
                                <td>22-05-2024</td>
                                <td>AB BANK</td>
                                <td>Qbittech</td>
                                <td>100000.00</td>
                                <td>30-08-2024</td>
                                <td>no type</td>
                                <td>
                                    <span class="badge rounded-pill bg-primary">Active</span>
                                </td>
                                <td>23-10-2024</td>
                            </tr>
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


