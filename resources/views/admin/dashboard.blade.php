@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
      <div>
        <h3 class="fw-bold mb-3">Main Dashboard</h3>
        <h6 class="op-7 mb-2">Welcoome <a href="{{ Auth::user()->name }}">{{ Auth::user()->name }}</a>,
            you are logged in  as {{ Auth::user()->name }}</h6>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body ">
              <div class="row align-items-center">
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4 class="card-title">{{$todayTotalPayAmount}}</h4>
                    <p class="card-category text-success">Todays payable</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4 class="card-title">{{$todayTotalReceiveAmount}}</h4>
                    <p class="card-category text-info">Todays Receivable</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4 class="card-title">{{$last7DaysTotalPayAmount}}</h4>
                    <p class="card-category text-warning">Next 7 days Payable</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4 class="card-title">{{$last7DaysTotalReceiveAmount}}</h4>
                    <p class="card-category text-danger">Next 7 days Receivable</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  <div class="card-title">Previous 7days Payable</div>
                </div>
                <div class="card-body">
                  <div class="chart-container"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="payableBarChart" style="display: block; width: 100%; height: 200px;" width="748" height="300" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  <div class="card-title">Next 30 days Receivable</div>
                </div>
                <div class="card-body">
                  <div class="chart-container"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="recieveBarChart" style="display: block; width: 100%; height: 200px;" width="748" height="300" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    // First chart (Payable Bar Chart)
const ctx1 = document.getElementById('payableBarChart').getContext('2d');
const payableBarChart = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: @json($sevendays),
    datasets: [{
      label: 'Total Amount',
      data: @json($sevenamounts),
      backgroundColor: 'rgba(54, 162, 235, 0.5)', // Customize the color as needed
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
      legend: {
        display: true,
        position: 'top'
      }
    }
  }
});

// Second chart (Recieve Bar Chart)
const ctx2 = document.getElementById('recieveBarChart').getContext('2d');
const recieveBarChart = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: @json($sevendaysrec),
    datasets: [{
      label: 'Total Amount',
      data: @json($sevenamountsrec),
      backgroundColor: 'rgba(54, 162, 235, 0.5)', // Customize the color as needed
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
      legend: {
        display: true,
        position: 'top'
      }
    }
  }
});

  </script>

@endsection
