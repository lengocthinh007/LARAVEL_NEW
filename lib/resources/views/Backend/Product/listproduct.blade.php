@extends('Backend.master')
@section('title','Sản Phẩm')
@section('main') 
<style type="text/css">
  .stars-outer {
  position: relative;
  display: inline-block;
  margin-bottom: 5px;
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-outer::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #ccc;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #f8ce0b;
}
</style> 
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				  <div class="table-responsive" style="padding: 10px" >
				  <a style="margin-bottom: 10px" href="{{asset('admin/product/add/')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                 	  <th>ID</th>
                      <th width="25%">Tên</th>
                      <th>Hình</th>
                      <th>Thời gian</th>
                       <th>Trạng Thái</th>
                       <th>Nổi Bật</th>
                       <th>Danh mục</th>
                      <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $stt=0 ?>
                    @foreach($data as $pro)
                    <?php $stt= $stt + 1;
                      $age = 0;
                      $star=0;
                      if($pro->pro_total_rating)
                      {
                        $age = round($pro->pro_total_number / $pro->pro_total_rating,1);
                        $star = ($age / 5)*100;
                      }
                    ?>
                <tr id="{{$pro->id}}">
                  <td>{!! $stt !!}</td>
                  <td>
                        {!! $pro->name !!}
                    <ul style="margin:0px;list-style:circle;">
                      <li><span>Giá {!!number_format($pro->price,0,',','.') !!}(đ)</i></span></li>
                      <li><span>KM {!! $pro->pro_sale !!}(%)</i></span></li>
                      <li style="margin-top: 0px"><span>Số lượng: {{$pro->pro_number}}</span></li>
                      <li><span>Đánh Giá</span>
                         <div class="stars-outer">
                            <div class="stars-inner" style="width:{{$star}}%"></div>
                        </div>
                      <span class="number-rating">{{$age}}</span>
                    </li>
                   
                    </ul>
                  </td>
                  <td><img src="{{asset('public/Hinh/'.$pro->image)}}" width="100px"></td>
                  <td>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($pro->created_at))->diffForHumans() !!}
                  </td>
                  <td>
                    <a href="{{ route('admin.product.action',['active',$pro->id]) }}" class="label {{ $pro->getstatus($pro->pro_active)['class']}}">{{ $pro->getstatus($pro->pro_active)['name']}}</a>
                  </td>
                  <td>
                    <a href="{{ route('admin.product.action',['hot',$pro->id]) }}" class="label {{ $pro->gethot($pro->pro_hot)['class']}}">{{ $pro->gethot($pro->pro_hot)['name']}}</a>
                  </td>
                  <td>
                    <?php
                        $parent = DB::table('cates')->where('id',$pro->cate_id)->first();
                        echo $parent->name;
                    ?>
                  </td>
                   <input type="hidden" value="" class="url_delete">
                  <td style="text-align: center;">
                              <a href="{{asset('admin/product/edit/'.$pro->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/product/delete/'.$pro->id)}}" class="btn btn-danger dell"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                </tbody>
              </table>
            </div>
				</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 100px">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thông Báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có chắc muốn xóa ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
         <button type="button" class="btn btn-primary yess">Yes</button>
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
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });

  $(".dell").click(function (e) {
        event.preventDefault();
        $('#exampleModalCenter').modal('show');
        let $this = $(this);
        let url = $this.attr('href');
        $(".url_delete").val(url);
  });

  $(".yess").click(function (e) {
        event.preventDefault();
        let url = $(".url_delete").val();
        $.ajax({
              url: url,
              type: 'GET',
        }).done(function(data) {
              $('#exampleModalCenter').modal('hide');
                toastr.success("Xóa thành công");
                 $("#"+data).remove();
              
        });
});
</script>
@include('errors.note')
@stop