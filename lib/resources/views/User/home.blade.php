@extends('User.master')
@section('title','Tổng Quang')
@section('main') 

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
          <div class="table-responsive" style="padding: 10px" >
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th width="30%">Tên khác hàng</th>
                      <th>Số điện thoại</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                   @if(isset($Transaction))
                    @foreach($Transaction as $item)
                <tr>
                  <td>{!! $item['id'] !!}</td>
                  <td>{{ isset($item->user->name) ? $item->user->name : 'gdf'}}</td>
                  <td>{!! $item['address'] !!}</td>
                  <td>{!! $item['phone'] !!}</td>
                  <td>{!! $item['total'] !!}</td>
                  <td>@if($item['status'] ==1)
                   <a href="{{asset('admin/transaction/')}}" class="badge badge-primary"> Đã xử lý</a>
                    @else
                    <a href="{{asset('admin/transaction/active/'.$item['id'])}}" class="badge badge-warning">Chưa xử lý</a>
                    @endif
                  </td>
                   <td>{{$item['created_at']->format('d-m-Y')}}</td>
                          </tr>
                       @endforeach
                       @endif
                </tbody>
              </table>
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

@stop