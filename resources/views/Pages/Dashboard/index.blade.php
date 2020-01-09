@extends('layouts.index')
@section('main-content')
<div class="card-columns m-auto p-3">
    <div class="card mb-3">
        <div class="card-header" style="background: #d1d4d4;">
            <i class="fas fa-chart-pie"></i>
            Employee Chart
        </div>
        <div class="card-body">
            <canvas id="PieChart" width="100%" height="100"></canvas>
        </div>
        {{-- <div class="card-footer small text-muted">This is Employee pie chart </div> --}}
    </div>
    <div class="card">
        <div class="card-header" style="background: #d1d4d4;">
            Import Export Excel to database
        </div>
        <div class="card-body">
            <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                @if($errors->has('file'))
                <samll class="error">{{ $errors->first('file') }}*</samll>
                @endif
                <br>
                <button class="btn btn-success" type="submit">Import User Data</button>
                {{-- <a class="btn btn-warning" href="#">Export User Data</a> --}}
            </form>
        </div>
    </div>
</div>
@endsection
@push('page-script')
<script>
    var s="";var m="";var j="";var i="";var ma="";var b="";
    var data ={{$data}};
    $.each(data, function( index, value ) {
        if(value==1){ma++;}
        if(value==2){s++;}
        if(value==7){b++;}
        if(value==8){m++;}
        if(value==201){j++;}   
        if(value==251){i++;}   

    });
    var ctx = document.getElementById("PieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Manager","Senior Developer", "Mid-Level Developer", "Junior Developer", "Intern", 'Business Analyst'],
            datasets: [{
                data: [ma, s, m, j, i, b],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
        },
    });
</script>
@endpush