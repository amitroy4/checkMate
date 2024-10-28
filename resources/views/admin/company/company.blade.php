@extends('layouts.admin')
@section('title', 'Client')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Company</h4>
                </div>
                {{-- @if (session('success'))
                <span class="alert alert-success">{{session('success')}}</span>
                @elseif (session('danger'))
                <span class="alert alert-danger">{{session('danger')}}</span>
                @endif --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                      <div class="card">
                        <form action="">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Name</label>
                                        <input id="companyName" type="text" class="form-control" name="companyName">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Address</label>
                                        <textarea id="companyAddress" type="text" class="form-control" name="companyAddress"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex">
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label class="form-label">District</label>
                                            <input id="district" type="text" class="form-control" name="district">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label class="form-label">Zipcode</label>
                                            <input id="zipcode" type="text" class="form-control" name="zipcode">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Contact Number</label>
                                        <input id="conatctNumber" type="text" class="form-control" name="conatctNumber">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Whatsapp Number</label>
                                        <input id="whatsappNumber" type="text" class="form-control" name="whatsappNumber">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Land Line Number</label>
                                        <input id="landLineNumber" type="text" class="form-control" name="landLineNumber">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Email Adress</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Website</label>
                                        <input id="companyWebsite" type="url" class="form-control" name="companyWebsite">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Facebook Uri</label>
                                        <input id="companyFacebookUrl" type="url" class="form-control" name="companyFacebookUrl">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Logo</label>
                                        <input id="companyLogo" type="file" class="form-control" name="companyLogo">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Registration Number</label>
                                        <input id="registrationNumber" type="text" class="form-control" name="registrationNumber">
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
                                <div class="col-sm-12">
                                    <div class="form-group d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary">Add Company</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Company Name</th>
                                            <th>Company Address</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Company Name</td>
                                            <td>Address</td>
                                            <td>Phone</td>
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
                <div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

