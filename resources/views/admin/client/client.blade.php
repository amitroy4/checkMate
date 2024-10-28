@extends('layouts.admin')
@section('title', 'Client')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Client</h4>

                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addclient">
                        <i class="fa fa-plus"></i>
                        New Client
                    </button>
                </div>
                {{-- @if (session('success'))
                <span class="alert alert-success">{{session('success')}}</span>
                @elseif (session('danger'))
                <span class="alert alert-danger">{{session('danger')}}</span>
                @endif --}}
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Add New Client</span>
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('client.store')}}" method="post">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label class="form-label">Client Name<span class="required-label">*</span></label>
                                                <input id="addName" type="text" class="form-control" name="name">
                                                    {{-- @error('name')
                                                    <span class="text-danger mt-2">{{$message}}</span>
                                                    @enderror  --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label class="form-label">Client Mobile Number</label>
                                                <input id="mobileNumber" type="text" class="form-control" name="mobileNumber">

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label class="form-label">Client Email</label>
                                                <input id="email" type="email" class="form-control" name="email">

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label class="form-label">Client Designation</label>
                                                <input id="designation" type="text" class="form-control" name="designation">

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label class="form-label">Company Name</label>
                                                <input id="companyName" type="text" class="form-control" name="companyName">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer border-0">

                                        <button type="button" class="btn btn-danger btn-round" data-bs-dismiss="modal">Close</button>
                                        <button type="Submit" class="btn btn-success btn-round ">Save</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Client_Name</th>
                                <th>Designation</th>
                                <th>Phone_NO</th>
                                <th>Email</th>
                                <th>Company_Name</th>
                                <th> Client_Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Client Name</td>
                                <td>Designation</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Company Name</td>
                                <td>
                                    <span class="badge rounded-pill bg-primary">Active</span>

                                </td>
                                <td>
                                    <div class="form-button-action ">
                                        <a href="#" class="btn btn-link btn-primary edit ps " data-bs-toggle="modal" data-bs-target="#updateClientModal"
                                        data-client-id="">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="" method="post" class="d-inline-block">
                                            <button type="submit" data-bs-toggle="tooltip" title=""
                                                class="btn btn-link btn-danger delete" data-original-title="Remove" >
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
        </div>
    </div>
</div>

@endsection

