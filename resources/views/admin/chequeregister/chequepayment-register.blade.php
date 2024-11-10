@extends('layouts.admin')
@section('title', 'Reports')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Manage Cheque Payment Register Report</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="fromDate">From Date</label>
                        <input id="fromDate" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="toDate">To Date</label>
                        <input id="toDate" type="date" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="payee">Payee<span class="required-label">*</span></label>
                        <select id="payee" class="form-control" name="payee">
                            <option value="">Select Payee</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{$vendor->vendor_name}}">{{$vendor->vendor_name}}</option>
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
                        <label for="paytype">Pay Type</label>
                        <select id="paytype" class="form-control" name="paytype">
                            <option value="">Select Pay Type</option>
                            <option value="No Cross">No Cross</option>
                            <option value="Cross Only">Cross Only</option>
                            <option value="Cross A/C Payee / Not Negotiable / Or Brear">Cross A/C Payee / Not Negotiable / Or Brear</option>
                            <option value="Cross A/C Payee / Or Brear">Cross A/C Payee / Or Brear</option>
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
                            @foreach ($chequepays as $key => $chequepay)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $chequepay->cheque_date }}</td>
                                <td>{{ $chequepay->bank->bank_name }}</td>
                                <td>{{ $chequepay->payee->vendor_name }}</td>
                                <td>{{ $chequepay->amount }}</td>
                                <td>{{ $chequepay->cheque_clearing_date ?? 'N/A' }}</td>
                                <td>{{ $chequepay->paytype }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $chequepay->cheque_status == 'Approved' ? 'success' : ($chequepay->cheque_status == 'Rejected' ? 'danger' : ($chequepay->cheque_status == 'Pending' ? 'info' : 'warning')) }}">{{ $chequepay->cheque_status }}</span>
                                </td>
                                <td>
                                    @php
                                        $clearingDate = \Carbon\Carbon::parse($chequepay->cheque_clearing_date);
                                        $today = \Carbon\Carbon::today();
                                    @endphp
                                    {{ $clearingDate->isPast() ? 'Over' : $today->diffInDays($clearingDate) . ' days left.' }}
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
@endsection

@section('scripts')
<script>
   $(document).ready(function () {
    $('#filterButton').hide();
    var table = $('#datatable').DataTable();

    // Custom filtering function for date range
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            let fromDate = $('#fromDate').val();
            let toDate = $('#toDate').val();
            let issueDate = data[1]; // Issue Date column

            if (fromDate && toDate) {
                // Convert dates to JavaScript Date objects for comparison
                let from = new Date(fromDate);
                let to = new Date(toDate);
                let issue = new Date(issueDate);

                // Check if issueDate falls within the range
                return issue >= from && issue <= to;
            }
            return true; // If no date range is applied, show all records
        }
    );

    // Filter function for all inputs
    function filterTable() {
        let payee = $('#payee').val();
        let bank = $('#bank').val();
        let paytype = $('#paytype').val();

        // Apply other column filters
        table.column(3).search(payee ? '^' + payee + '$' : '', true, false); // Exact match for Payee
        table.column(2).search(bank ? '^' + bank + '$' : '', true, false); // Exact match for Bank
        table.column(6).search(paytype ? '^' + paytype + '$' : '', true, false); // Exact match for Pay Type

        // Draw the table to apply all filters
        table.draw();
    }

    // Apply the date filter and other filters on input change
    $('#fromDate, #toDate').on('change', function () {
        table.draw(); // Date range filter is handled by the custom function
        $('#filterButton').show();
    });

    $('#payee, #bank, #paytype').on('change', function () {
        filterTable(); // Other filters are handled by column search
        $('#filterButton').show();
    });

    $('#filterButton').on('click', function() {
    let fromDate = $('#fromDate').val();
    let toDate = $('#toDate').val();
    let payee = $('#payee').val();
    let bank = $('#bank').val();
    let paytype = $('#paytype').val();

    // Redirect to the PDF generation route with filters as query parameters
    let url = `/dashboard/reports/chequereport/paymentregister?fromDate=${fromDate}&toDate=${toDate}&payee=${payee}&bank=${bank}&paytype=${paytype}`;
    window.open(url, '_blank');
});
});

</script>
@endsection
