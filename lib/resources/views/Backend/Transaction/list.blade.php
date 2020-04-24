@extends('Backend.master')
@section('title','Đơn Hàng')
@section('main') 
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="table-responsive" style="padding: 10px" >
				  <a style="margin-bottom: 10px" href="{{asset('admin/category/add/')}}" class="btn btn-primary">Thêm danh mục</a>
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
                   @if(isset($transaction))
                   <?php $stt=0 ?>
                    @foreach($transaction as $item)
                     <?php $stt= $stt + 1;?>
                <tr>
                  <td>{!! $stt !!}</td>
                  <td>{{ isset($item->user->name) ? $item->user->name : 'gdf'}}</td>
                  <td>{!! $item['phone'] !!}</td>
                  <td>{!! $item['total'] !!}</td>
                  <td>@if($item['status'] ==1)
                   <a href="{{asset('admin/transaction/')}}" class="label label-default"> Đã xử lý</a>
                    @else
                    <a href="{{asset('admin/transaction/active/'.$item['id'])}}" class="label label-info">Chưa xử lý</a>
                    @endif
                  </td>
                  <td style="text-align: center;">
                              <a href="{{asset('admin/transaction/view'.$item['id'])}}" data-key="{{$item['id']}}" class="btn btn-warning js_order_item"><span class="glyphicon glyphicon-edit"></span> Xem</a>
                              <a href="{{asset('admin/transaction/delete/'.$item['id'])}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                       @endif
                </tbody>
              </table>
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


					<!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!-- /.row -->
@stop
@section('script')
<script type="text/javascript">
  function xacnhanxoa(msg)  {
  if(window.confirm(msg)){
    return true;
  }
  return false;
}
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
@include('errors.note')
@stop