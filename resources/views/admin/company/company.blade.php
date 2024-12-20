@extends('layouts.admin')
@section('title', 'Company')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Manage Company</h4>
                </div>
                @can('Add Company')
                <a href="{{route("company.create")}}">
                    <button type="button" class="btn btn-primary">Add Company</button>
                </a>
                @endcan
                {{-- @if (session('success'))
                <span class="alert alert-success">{{session('success')}}</span>
                @elseif (session('danger'))
                <span class="alert alert-danger">{{session('danger')}}</span>
                @endif --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover table-head-bg-info">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Phone</th>
                                @can('Status Company')
                                <th>Status</th>
                                @endcan
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
                                    @can('Status Company')
                                    <td>
                                        @if ($company->status)
                                            <a href="{{route('status.company',$company->id)}}" class="badge rounded-pill bg-primary text-decoration-none">
                                                Active
                                            </a>
                                        @else
                                            <a href="{{route('status.company',$company->id)}}" class="badge rounded-pill bg-danger text-decoration-none">
                                                Inactive
                                            </a>
                                        @endif
                                    </td>
                                    @endcan
                                    <td>
                                        <div class="form-button-action ">
                                            @can('Update Company')
                                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-link btn-primary edit ps " title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            @endcan
                                            @can('Delete Company')
                                            <form action="{{ route('company.destroy', $company->id) }}" method="POST" class="d-inline-block" onsubmit="event.preventDefault(); confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger delete" data-bs-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            @endcan
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
</div>

<script>
    function confirmDelete(form) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            icon: "warning",
            buttons: ["Cancel", "Yes, delete it!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
                swal("Deleted!", "The company has been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }
</script>


@endsection

