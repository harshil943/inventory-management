{{-- {{dd($ordersMonth)}} --}}
@extends('layouts.app')

@section('title')
    Dashboard | Bright Containers
@endsection

@section('breadcrumb')
  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    @section('breadcrumb-title')
      &nbsp; Dashboard
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Dashboard</strong>
      </li>
    @endsection
  @endif
@endsection
@section('content')
<div class="container-fluid p-3" >
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <span class="pull-right text-right">
                            <small>Average value of sales in the past month in: <strong>United states</strong></small>
                            <br/>
                            Total Quantity: 162,862
                        </span>
                        <h1 class="m-b-xs fa fa-inr fa-3x">     {{$totalSell}}</h1>
                        <h3 class="font-bold no-margins">
                            Total Sell
                        </h3>
                        <small>Sales marketing.</small>
                    </div>
                    <div>
                        <canvas id="sellsChart" height="70"></canvas>
                    </div>
                    <div class="m-t-md">
                        <small class="pull-right">
                            <i class="fa fa-clock-o"> </i>
                                Update on 16.07.2015
                        </small>
                        <small>
                            <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2 style="font-weight:bold" >Expence per Month</h2>
            <div class="bg-white">
                <canvas id="expenseChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <h2 style="font-weight:bold" >Orders per Month</h2>
            <div class="bg-white">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <h2 style="font-weight:bold" >Quantity per Month</h2>
            <div class="bg-white">
                <canvas id="quantityChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <h2 style="font-weight:bold" >Raw Material per Month</h2>
            <div class="bg-white">
                <canvas id="rawmaterialChart"></canvas>
            </div>
        </div>
    </div>
    <h2 style="font-weight:bold" class="mt-3">Orders & Payments</h2>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pending Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$pedingOrders}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Completed Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$completedOrders}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pending Payments</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$pendingPayments}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Canceled Payments</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$canceledPayments}}</h1>
                </div>
            </div>
        </div>
    </div>
    <h2 style="font-weight:bold">Employee Details</h2>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>No. Of Admins</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$noOfAdmins}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>NO. Of Employees</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$employees}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Total Salary Expanse</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$totalSalary}}</h1>
                </div>
            </div>
        </div>
    </div>
    <h2 style="font-weight:bold">Inventory</h2>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>No. Of Products</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$totalProducts}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Quantity In Inventory</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$inventoryQuantity}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Total Cost In Inventory</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$inventoryCost[0]->total}} </h1>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
    <script>
        $(function() {
            $('.dashboard').addClass('active');
        });
    </script>

    <script>
        $(document).ready(function() {
            // Expense Chart
            var lineData = {
                labels: <?php echo json_encode($expenseMonth) ?>,
                datasets: [
                    {
                        label: "Monthly Expense",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: <?php echo json_encode($expense) ?>

                    },
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("expenseChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            // Orders Chart
            var lineData = {
                labels: <?php echo json_encode($ordersMonth) ?>,
                datasets: [
                    {
                        label: "Monthly Orders",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: <?php echo json_encode($orders) ?>

                    },
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("ordersChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            // quantity Chart
            var lineData = {
                labels: <?php echo json_encode($ordersMonth) ?>,
                datasets: [
                    {
                        label: "Monthly Quantity",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: <?php echo json_encode($quantityPerMonth) ?>

                    },
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("quantityChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            // Sells Chart
            var lineData = {
                labels: <?php echo json_encode($ordersMonth) ?>,
                datasets: [
                    {
                        label: "Monthly Sells",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: <?php echo json_encode($sellPerMonth) ?>

                    },
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("sellsChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            // Raw Chart
            var lineData = {
                labels: <?php echo json_encode($rawMaterial['rawMonth']) ?>,
                datasets: [
                    {
                        label: "Monthly Raw material cost",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: <?php echo json_encode($rawMaterial['rawPerMonth']) ?>

                    },
                ]
            };
            var lineOptions = {
                responsive: true
            };
            var ctx = document.getElementById("rawmaterialChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
        });

    </script>
@endpush
