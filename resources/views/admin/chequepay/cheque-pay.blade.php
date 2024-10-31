@extends('layouts.admin')
@section('title', 'Client')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"> Manage Cheque Pay</h4>
                    <a href="{{route('chequepay.create')}}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            New Cheque Pay
                        </button>
                    </a>
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
                            @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->vendor_name }}">{{ $vendor->vendor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bank">Bank<span class="required-label">*</span></label>
                        <select id="bank" class="form-control" name="bank">
                            <option value="">Select bank</option>
                            @foreach ($banks as $bank)
                            <option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="paytype">Pay Type<span class="required-label">*</span></label>
                        <select id="paytype" class="form-control" name="paytype">
                            <option value="">Select Pay Type</option>
                            <option value="No Cross">No Cross</option>
                            <option value="Cross Only">Cross Only</option>
                            <option value="Cross A/C Payee + Not Negotiable + Or Brear">Cross A/C Payee + Not Negotiable + Or Brear</option>
                            <option value="Cross A/C Payee + Or Brear">Cross A/C Payee + Or Brear</option>
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
                                <th>Sl</th>
                                <th>Vendor Name</th>
                                <th>Cheque Date</th>
                                <th>Bank Name</th>
                                <th>Cheque Amount</th>
                                <th>Clearing Date</th>
                                <th>Cheque Type</th>
                                <th>Cheque Status</th>
                                <th>Over Date</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chequepays as $key => $chequepay)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $chequepay->payee->vendor_name }}</td>
                                    <td>{{ $chequepay->cheque_date }}</td>
                                    <td>{{ $chequepay->bank->bank_name }}</td>
                                    <td>{{ $chequepay->amount }}</td>
                                    <td>{{ $chequepay->cheque_clearing_date ?? "N/A" }}</td>
                                    <td>{{ $chequepay->paytype }}</td>
                                    <td>{{ $chequepay->cheque_status }}</td>
                                    <td>
                                        @php
                                            $clearingDate = \Carbon\Carbon::parse($chequepay->cheque_clearing_date);
                                            $today = \Carbon\Carbon::today();
                                        @endphp
                                        @if ($clearingDate->isPast())
                                            Over
                                        @else
                                            {{ $today->diffInDays($clearingDate) }} days left.
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="#" class="btn btn-link btn-primary edit" data-bs-toggle="modal"
                                                data-bs-target="#updateClientModal" data-client-id="">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('chequepay.destroy', $chequepay->id) }}" method="POST" class="d-inline-block" onsubmit="event.preventDefault(); confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger delete" data-bs-toggle="tooltip" title="Delete">
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
            {{-- Display success or danger messages here if needed --}}
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable(); // Initialize DataTable

        $('#filterButton').click(function() {
            // Capture filter values
            var date = $('#date').val();
            var payee = $('#payee').val();
            var bank = $('#bank').val();
            var paytype = $('#paytype').val();

            table.columns().search('');

            table.columns(2).search(date)
                .columns(1).search(payee)
                .columns(3).search(bank)
                .columns(6).search(paytype);;

            table.draw();
        });
    });

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
                swal("Deleted!", "Client been deleted.", "success");
            } else {
                swal("Your data is safe!");
            }
        });
    }
</script>

@endsection
