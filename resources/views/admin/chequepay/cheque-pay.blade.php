@extends('layouts.admin')
@section('title', 'Client')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Manage Cheque Pay</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#newChequepay">
                        <i class="fa fa-plus"></i>
                        New Cheque Pay
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="date">Date</label>
                        <input id="date" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
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
                        <button type="button" class="btn btn-info mb-2" id="filterButton">Show</button>
                    </div>
                </div>
                <hr>


                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>

                                <th>Client Name</th>
                                <th>Bank Name</th>
                                <th>Pay Type</th>
                                <th>Amount</th>
                                <th>Cheque Date</th>
                                <th>Client_Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Client Name</td>
                                <td>Bank Name</td>
                                <td>Pay Type</td>
                                <td>Amount</td>
                                <td>Cheque Date</td>
                                <td>
                                    <span class="badge rounded-pill bg-primary">Active</span>

                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="#" class="btn btn-link btn-primary edit" data-bs-toggle="modal"
                                            data-bs-target="#updateClientModal" data-client-id="">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="" method="post" class="d-inline-block">
                                            <button type="submit" data-bs-toggle="tooltip" title=""
                                                class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

 <!-- Modal -->
                <div class="modal fade" id="newChequepay" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Create New Cheque Pay</span>
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="date">Date<span class="required-label">*</span></label>
                                                <input id="date" type="date" class="form-control" name="date">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="payee">Payee<span class="required-label">*</span></label>
                                                <select id="payee" class="form-control" name="payee">
                                                    <option value="">Select Payee</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="bank">Bank<span class="required-label">*</span></label>
                                                <select id="bank" class="form-control" name="bank">
                                                    <option value="">Select bank</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="amount">Amount<span class="required-label">*</span></label>
                                                <input id="amount" type="number" class="form-control"
                                                    placeholder="Enter Amount" name="amount">

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="paytype">Pay Type<span
                                                        class="required-label">*</span></label>
                                                <select id="paytype" class="form-control" name="paytype">
                                                    <option value="">Select Pay Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="flyCheque">IS Fly Cheque<span
                                                        class="required-label">*</span></label>
                                                <select id="flyCheque" class="form-control" name="flyCheque">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="file">File<span class="required-label">*</span></label>
                                                <input id="file" type="file" class="form-control" name="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">

                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="Submit" class="btn btn-secondary">Submit</button>
                                </div>
                        </div>

                        </form>

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
