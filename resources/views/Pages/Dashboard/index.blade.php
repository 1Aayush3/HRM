@extends('layouts.index')
@section('main-content')
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-chart-pie"></i>
            Employee Chart</div>
        <div class="card-body">
            <canvas id="PieChart" width="100%" height="100"></canvas>
        </div>
    <div class="card-footer small text-muted">This is pie chart </div>
    </div>
</div>
</div>
@endsection
@push('page-script')
<script>
    var s="";var m="";var j="";var i="";
    var data ={{$data}};
    // console.log(data);
    $.each(data, function( index, value ) {
    //    console.log(value);
        if(value==1){s++;}
        if(value==2){m++;}
        if(value==3){j++;}
        if(value==4){i++;}   
    });
    // console.log(i);
    var ctx = document.getElementById("PieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Senior Developer", "Mid-Level Developer", "Junior Developer", "Intern"],
            datasets: [{
                data: [s, m, j, i],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
        },
    });
</script>
@endpush