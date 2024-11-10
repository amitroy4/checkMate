@extends('layouts.admin')
@section('title', 'Reports')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Manage Cheque Receive Register Report</h4>
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
                        <label for="client">Client<span class="required-label">*</span></label>
                        <select id="client" class="form-control" name="client">
                            <option value="">Select Client</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->client_name}}">{{$client->client_name}}</option>
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
                        <label for="receivetype">Cheque Type</label>
                        <select id="receivetype" class="form-control" name="receivetype">
                            <option value="">Select Chaque Type</option>
                            <option value="No Cross">No Cross</option>
                            <option value="Cross Only">Cross Only</option>
                            <option value="Cross A/C client / Not Negotiable / Or Brear">Cross A/C client / Not Negotiable / Or Brear</option>
                            <option value="Cross A/C client / Or Brear">Cross A/C client / Or Brear</option>
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
                                <th>Client Name</th>
                                <th>Cheque Amount</th>
                                <th>Clearing Date</th>
                                <th>Cheque Type</th>
                                <th>Cheque Status</th>
                                <th>Over Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chequereceives as $key => $chequereceive)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $chequereceive->cheque_date }}</td>
                                <td>{{ $chequereceive->bank->bank_name }}</td>
                                <td>{{ $chequereceive->client->client_name }}</td>
                                <td>{{ $chequereceive->amount }}</td>
                                <td>{{ $chequereceive->cheque_clearing_date ?? 'N/A' }}</td>
                                <td>{{ $chequereceive->receivetype }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $chequereceive->cheque_status == 'Approved' ? 'success' : ($chequereceive->cheque_status == 'Rejected' ? 'danger' : ($chequereceive->cheque_status == 'Pending' ? 'info' : 'warning')) }}">{{ $chequereceive->cheque_status }}</span>
                                </td>
                                <td>
                                    @php
                                        $clearingDate = \Carbon\Carbon::parse($chequereceive->cheque_clearing_date);
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
        let client = $('#client').val();
        let bank = $('#bank').val();
        let receivetype = $('#receivetype').val();

        // Apply other column filters
        table.column(3).search(client ? '^' + client + '$' : '', true, false); // Exact match for client
        table.column(2).search(bank ? '^' + bank + '$' : '', true, false); // Exact match for Bank
        table.column(6).search(receivetype ? '^' + receivetype + '$' : '', true, false); // Exact match for Pay Type

        // Draw the table to apply all filters
        table.draw();
    }

    // Apply the date filter and other filters on input change
    $('#fromDate, #toDate').on('change', function () {
        table.draw(); // Date range filter is handled by the custom function
        $('#filterButton').show();
    });

    $('#client, #bank, #receivetype').on('change', function () {
        filterTable(); // Other filters are handled by column search
        $('#filterButton').show();
    });

    $('#filterButton').on('click', function() {
    let fromDate = $('#fromDate').val();
    let toDate = $('#toDate').val();
    let client = $('#client').val();
    let bank = $('#bank').val();
    let receivetype = $('#receivetype').val();

    // Redirect to the PDF generation route with filters as query parameters
    let url = `/dashboard/reports/chequereport/receiveregister?fromDate=${fromDate}&toDate=${toDate}&client=${client}&bank=${bank}&receivetype=${receivetype}`;
    window.open(url, '_blank');
});
});

</script>
@endsection
