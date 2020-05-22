@extends('Backend.master')
@section('title','Thành Viên')
@section('main') 
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="table-responsive" style="padding: 10px" >
				  <a style="margin-bottom: 10px" href="{{asset('admin/user/add/')}}" class="btn btn-primary">Thêm thành viên</a>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                 	    <th>ID</th>
                      <th width="30%">Tên</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Avatar</th>
                      <th>Tùy Chọn</th>
                  </tr>
                </thead>
                <tbody>
                   @if(isset($user) && $user != '')
                    <?php $stt=0 ?>
                    @foreach($user as $item)
                     <?php $stt= $stt + 1;?>
                <tr>
                  <td style="vertical-align: middle;">{!! $stt !!}</td>
                  <td style="vertical-align: middle;">{!! $item->name !!}</td>
                  <td style="vertical-align: middle;">{!! $item->email !!}</td>
                  <td style="vertical-align: middle;">0{!! $item->phone !!}</td> 
                  @if($item->avatar != null)
                  <td><img src="{{asset('public/Avatar/'.$item->avatar)}}" width="50px"></td>
                  @else
                  <td><img src="{{asset('public/HinhDetails/small/hinhloi.PNG')}}" width="50px"></td>
                  @endif
                  <td style="vertical-align: middle;">
                              <a href="{{asset('admin/user/edit/'.$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/user/delete/'.$item->id)}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                       @endif
                </tbody>
              </table>
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