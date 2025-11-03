@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'left-sidebar is-preload')

@section('content')
<div id="main-wrapper">

    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Top 10 legnépesebb város 2019-ben</h1>
    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Lakosság 2019',
                    data: @json($values),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
            </div>
        </div>
    </div>

</div>
@endsection
