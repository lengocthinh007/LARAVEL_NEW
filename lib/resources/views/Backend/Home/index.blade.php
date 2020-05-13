@extends('Backend.master')
@section('title','Tổng Quang')
@section('main') 
<style type="text/css">
  .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
  <div class="panel panel-container">
      <div class="row">
        <div class="col-xs-8 col-md-4 col-lg-4 no-padding">
          <div class="panel panel-teal panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
              <div class="large">{{$totaltransaction}}</div>
              <div class="text-muted">Đơn Hàng</div>
            </div>
          </div>
        </div>
        <div class="col-xs-8 col-md-4 col-lg-4 no-padding">
          <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-red"></em>
              <div class="large">{{$totaltransactiondone}} </div>
              <div class="text-muted">Đã xử lí</div>
            </div>
          </div>
        </div>
        <div class="col-xs-8 col-md-4 col-lg-4 no-padding">
          <div class="panel panel-orange panel-widget border-right">
            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-black"></em>
              <div class="large">{{$totaltransaction - $totaltransactiondone}} </div>
              <div class="text-muted">Chưa xử lí</div>
            </div>
          </div>
        </div>
       
      </div><!--/.row-->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Biểu đồ
          
          </div>
          <div class="panel-body">
            <div class="canvas-wrapper">
             <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
            </div>
          </div>
        </div>
      </div>


      <!-- Them nhieu anh -->
     
      <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
      </div>
    </div><!--/.row-->
@stop
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
  let data = "{{$datamoney}}";
  dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
  // Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu đồ doanh thu'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Mức Độ'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}VNĐ'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: dataChart
        }
    ],
});
</script>
@stop