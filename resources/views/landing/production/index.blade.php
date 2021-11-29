@extends('layouts.app')

@section('content')
<section id="statistic" class="wrapper bg-white d-flex">
    <div class="container my-auto">
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</section>
@endsection

@push('js-lib')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('js-additional')
<script>
    $(document).ready(function(){
        $.ajax({
            url: `http://datalas.test:8080/api/v1/productions`,
            type: 'GET',
            dataType: 'JSON',
            success: (res) => {
                const labels = []
                const production = []
                $.each(res.data, (i, val) => {
                    labels.push(val.name)
                    production.push(val.stock)
                })
                production.push(1000)
                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Akumulasi Produksi',
                        backgroundColor: 'rgb(67, 170, 139)',
                        borderColor: 'rgb(67, 170, 139)',
                        data: production,
                    }]
                }
                const config = {
                    type: 'bar',
                    data: data,
                    color: '#43AA8B'
                }
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                )
            }
        });
    });
</script>
@endpush