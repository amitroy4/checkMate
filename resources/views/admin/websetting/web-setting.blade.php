@extends('layouts.admin')
@section('title', 'Clients')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h4 class="card-title">Company</h4>
                {{-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Add New Client
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-4">
                        <form action="{{route('websetting.update',$websetting->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="company">Company Name <span class="required-label">*</span>
                                </label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $websetting->company_name) }}" placeholder="Enter Company Name" required>
                                    @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="adddress">Company Address <span class="required-label">*</span></label>
                                <input type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address', $websetting->company_address) }}" placeholder="Enter Company Address">
                                @error('company_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact No <span class="required-label">*</span></label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $websetting->contact) }}" placeholder="Enter Contact No">
                                @error('contact')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Company Website <span class="required-label">*</span></label>
                                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $websetting->website) }}" placeholder="Enter Company Website">
                                @error('website')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email ID <span class="required-label">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $websetting->email) }}" placeholder="Enter Email ID">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="landphone">Land Phone Number <span class="required-label">*</span></label>
                                <input type="text" class="form-control @error('landphone') is-invalid @enderror" id="landphone" name="landphone" value="{{ old('landphone', $websetting->landphone) }}" placeholder="Enter Land Phone Number">
                                @error('landphone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="logo">Company Logo <span class="required-label">*</span></label>
                                <input type="file" class="form-control" id="logo" name="logo" value="{{$websetting->logo}}"  placeholder="Enter Company Logo">
                                <img src="{{ asset('storage/' . $websetting->logo) }}" id="logo_preview" alt="Logo Preview" width="100" class="mb-2 {{ $websetting->logo ? '' : 'd-none' }} mt-2">
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <input type="file" class="form-control" id="favicon" name="favicon" value="{{$websetting->favicon}}"  placeholder="Enter Company favicon">
                                <img src="{{ asset('storage/' . $websetting->favicon) }}" id="favicon_preview" alt="favicon Preview" width="100" class="mb-2 {{ $websetting->favicon ? '' : 'd-none' }} mt-2">
                                @error('favicon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="systemLogo">System Logo </label>
                                <input type="file" class="form-control" id="systemLogo" name="systemLogo" value="{{$websetting->systemLogo}}" >
                                <img src="{{ asset('storage/' . $websetting->systemLogo) }}" id="systemLogo_preview" alt="systemLogo Preview" width="100" class="mb-2 {{ $websetting->systemLogo ? '' : 'd-none' }} mt-2">
                                @error('systemLogo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-7">

                        <div class="card shadow-sm">
                            <div class="card-body text-center">

                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $websetting->logo) }}" class="img-fluid" alt="Company Logo" style="max-width: 200px;">
                                </div>

                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <strong>Company Name:</strong> {{ $websetting->company_name ?? 'N/A' }}
                                    </li>
                                    <li class="mb-3">
                                        <strong>Company Address:</strong> {{ $websetting->company_address ?? 'N/A' }}
                                    </li>
                                    <li class="mb-3">
                                        <strong>Contact No:</strong> {{ $websetting->contact ?? 'N/A' }}
                                    </li>
                                    <li class="mb-3">
                                        <strong>Company Website:</strong> <a href="{{ $websetting->website ?? '#' }}">{{ $websetting->website ?? 'N/A' }}</a>
                                    </li>
                                    <li class="mb-3">
                                        <strong>Email ID:</strong> <a href="mailto:{{ $websetting->email ?? 'N/A' }}">{{ $websetting->email ?? 'N/A' }}</a>
                                    </li>
                                    <li class="mb-3">
                                        <strong>Land Line Number:</strong> {{ $websetting->landphone ?? 'N/A' }}
                                    </li>
                                </ul>
                                 <div class="mb-4 d-flex justify-content-around">
                                    <span>Favicon: <img src="{{ asset('storage/' . $websetting->favicon) }}" class="img-fluid" alt="Favicon Logo" style="width: 60px; height: 80px;"></span>
                                    <span>System Icon: <img src="{{ asset('storage/' . $websetting->systemLogo) }}" class="img-fluid" alt="System Logo" style="width: 150px; height: auto;"></span>
                                </div>
                            </div>
                        </div>


                </div>
            </div>

        </div>

    </div>
</div>

@endsection

@push('script')
<script>
    $(document).ready(function(){
        function handleImagePreview(input, previewId) {
            const file = input.files[0]; // Access the file from the passed input element
            const reader = new FileReader();

            reader.onload = function(e) {
                $(previewId).attr('src', e.target.result).removeClass('d-none');
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                $(previewId).addClass('d-none');
            }
        }

        // Bind change events for each input
        $('#logo').on('change', function() {
            handleImagePreview(this, '#logo_preview');
        });
        $('#favicon').on('change', function() {
            handleImagePreview(this, '#favicon_preview');
        });
        $('#systemLogo').on('change', function() {
            handleImagePreview(this, '#systemLogo_preview');
        });

    });
</script>
@endpush


