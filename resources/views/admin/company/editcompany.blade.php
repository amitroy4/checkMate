@extends('layouts.admin')
@section('title', 'Edit Company')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Edit Company</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-wrap">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name', $company->company_name) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $company->email) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Company Website</label>
                                <input id="company_website" type="url" class="form-control" name="company_website" value="{{ old('company_website', $company->company_website) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Company Facebook URL</label>
                                <input id="company_facebook_url" type="url" class="form-control" name="company_facebook_url" value="{{ old('company_facebook_url', $company->company_facebook_url) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number', $company->contact_number) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">WhatsApp Number</label>
                                <input id="whatsapp_number" type="text" class="form-control" name="whatsapp_number" value="{{ old('whatsapp_number', $company->whatsapp_number) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Land Line Number</label>
                                <input id="land_line_number" type="text" class="form-control" name="land_line_number" value="{{ old('land_line_number', $company->land_line_number) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Company Logo</label>
                                <input id="company_logo" type="file" class="form-control" name="company_logo">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Company Address</label>
                                <textarea id="company_address" class="form-control" name="company_address">{{ old('company_address', $company->company_address) }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Registration Number</label>
                                <input id="registration_number" type="text" class="form-control" name="registration_number" value="{{ old('registration_number', $company->registration_number) }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="1" {{ old('status', $company->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $company->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                @if ($company->company_logo)
                                    <img src="{{ asset('storage/' . $company->company_logo) }}" alt="Current Logo" class="img-thumbnail mt-2" style="width: 100px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Company</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
