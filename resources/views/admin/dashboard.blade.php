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
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4 class="card-title">0</h4>
                    <p class="card-category">Last Day Total amount</p>
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
                    <h4 class="card-title">0</h4>
                    <p class="card-category">Today Total Amount</p>
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
                    <h4 class="card-title">0</h4>
                    <p class="card-category">Tomorrow Total amount</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
