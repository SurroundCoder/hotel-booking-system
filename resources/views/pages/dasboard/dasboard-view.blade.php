@extends('layout')

@section('content-title')
    Dashboard
@endsection

@section('content-breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $newBooking }}</h3>
                <p>New Booking</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $roomAvail }}</h3>
                <p>Room Available</p>
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $newCustomer }}</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $unqCustomer }}</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    This Week Sales
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cleaning Service on Duty</h3>
            </div>

            <div class="card-body p-0">
                <ul class="users-list clearfix">
                    <li>
                        <img src="{{ asset('assets/adminlte-3.2.0/dist/img/user1-128x128.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date text-success">Idle</span>
                    </li>
                    <li>
                        <img src="{{ asset('assets/adminlte-3.2.0/dist/img/user8-128x128.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date text-danger">Cleaning Room 202</span>
                    </li>
                    <li>
                        <img src="{{ asset('assets/adminlte-3.2.0/dist/img/user7-128x128.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">Jane</a>
                        <span class="users-list-date text-success">Idle</span>
                    </li>
                    <li>
                        <img src="{{ asset('assets/adminlte-3.2.0/dist/img/user6-128x128.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">John</a>
                        <span class="users-list-date text-info">Break</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">
                    <i class="fas fa-calendar mr-1"></i>
                    Check-in Schedule
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0" id="check-in-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Room No.</th>
                                <th>Customer Name</th>
                                <th>Check-in Date</th>
                                <th>Check-out Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const ctx = document.getElementById('myChart');
    const chartData = {!! $chartData !!};
    const checkinData = {!! $checkinData !!};

    var tableElement = document.getElementById('check-in-table').getElementsByTagName('tbody')[0];

    $('#menu-dasboard').addClass('menu-open');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: '# of Sales in USD',
                data: chartData.data,
                borderWidth: 1,
                backgroundColor: chartData.backgroundColor
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            colors: {
                enabled: true
            }
        },
        defaults: {
            color: 'blue'
        }
    });

    if (checkinData.length === 0) {
        var row = tableElement.insertRow(-1);
        var td  = row.insertCell(0);

        td.innerHTML = 'No booking found';
        td.colSpan   = 5;
        td.className = 'text-center';
    } else {
        for(var k in checkinData) {
            let data = checkinData[k];
    
            var row         = tableElement.insertRow(-1);
            var bookingId   = row.insertCell(0);
            var room        = row.insertCell(1);
            var customer    = row.insertCell(2);
            var checkin     = row.insertCell(3);
            var checkout    = row.insertCell(4);
    
            bookingId.innerHTML = data[0];
            room.innerHTML      = data[1];
            customer.innerHTML  = data[2];
            checkin.innerHTML   = data[3];
            checkout.innerHTML  = data[4];
        }
    }
</script>
@endsection