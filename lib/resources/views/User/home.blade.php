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
                      <th>Tên khác hàng</th>
                      <th>Địa Chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Tổng tiền</th>
                      <th>PT Thanh Toán</th>
                      <th>Trạng thái</th>
                      <th>Thời Gian</th>
                      <th>Tùy Chọn</th>
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
                   <td>@if($item['pay_type'] ==1)
                   <a href="#" class="label label-primary">Online</a>
                    @else
                    <a href="#" class="label label-info">Trực Tiếp</a>
                    @endif
                  </td>
                  <td>@if($item['status'] ==1)
                   <a href="#" class="label label-primary"> Đã xử lý</a>
                    @else
                    <a href="#" class="label label-info">Chưa xử lý</a>
                    @endif
                  </td>
                   <td>{{$item['created_at']->format('d-m-Y')}}</td>
                   <td>
                     <a href="{{asset('admin/transaction/view'.$item['id'])}}" data-key="{{$item['id']}}" class="btn btn-warning js_order_item"><span class="glyphicon glyphicon-edit"></span> Xem</a>
                   </td>
                          </tr>
                       @endforeach
                       @endif
                </tbody>
              </table>
            </div>
        </div>
      </div>

<!-- Modal -->
   <div class="modal fade" id="myModalorder" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title" style="float: left">Chi tiết đơn hàng có mã #<b class="transaction_id"></b></h4>
        </div>
        <div class="modal-body" id="md_content">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
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
<script type="text/javascript">
 
  $(function(){
    $('.js_order_item').click(function(event){
      event.preventDefault();
      let $this = $(this);
      let url = $this.attr('href');
      $("#md_content").html('');
      $(".transaction_id").text('').text($this.attr('data-key'));
      $("#myModalorder").modal('show');
     $.ajax({
        url: url,
      }).done(function(result) {
        if(result)
        {
          $("#md_content").append(result);
        }
      });
    }); 
  });
</script>
@stop