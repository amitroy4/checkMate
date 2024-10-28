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
                        <form action="{{route("company.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Name</label>
                                        <input id="company_name" type="text" class="form-control" name="company_name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Address</label>
                                        <textarea id="company_address" type="text" class="form-control" name="company_address"></textarea>
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
                                        <input id="contact_number" type="text" class="form-control" name="contact_number">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Whatsapp Number</label>
                                        <input id="whatsapp_number" type="text" class="form-control" name="whatsapp_number">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Land Line Number</label>
                                        <input id="land_line_number" type="text" class="form-control" name="land_line_number">
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
                                        <input id="company_website" type="url" class="form-control" name="company_website">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Facebook Uri</label>
                                        <input id="company_facebook_url" type="url" class="form-control" name="company_facebook_url">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Company Logo</label>
                                        <input id="company_logo" type="file" class="form-control" name="company_logo">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label class="form-label">Registration Number</label>
                                        <input id="registration_number" type="text" class="form-control" name="registration_number">
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
                                        <button type="submit" class="btn btn-primary">Add Company</button>
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
                                        @foreach ($companies as $key =>$company)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$company->company_name}}</td>
                                                <td>{{$company->company_address}}</td>
                                                <td>{{$company->contact_number}}</td>
                                                <td>
                                                    @if ($company->status == 1)
                                                        <span class="badge rounded-pill bg-primary">Active</span>
                                                    @elseif ($company->status == 0)
                                                        <span class="badge rounded-pill bg-warning">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action ">
                                                        <a href="#" class="btn btn-link btn-primary edit ps " data-bs-toggle="modal" data-bs-target="#updateClientModal"
                                                        data-client-id="">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('company.destroy', $company->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" data-bs-toggle="tooltip" title="Remove" class="btn btn-link btn-danger delete" data-original-title="Remove">
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
                <div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

