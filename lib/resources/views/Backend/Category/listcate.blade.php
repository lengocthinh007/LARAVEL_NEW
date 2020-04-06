@extends('Backend.master')
@section('title','Danh mục')
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
                      <th>Tên</th>
                      <th>Danh mục cha</th>
                      <th width="20%">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                   <?php $stt=0 ?>
                 @foreach($data as $cate)
                  <?php $stt= $stt + 1;?>
                <tr id="{{$cate['id']}}">
                  <td>{!! $stt !!}</td>
                  <td>{!! $cate["name"] !!}</td>
                  <td>@if($cate["parent_id"] ==0)
                    {!! "None" !!}
                    @else
                    <?php
                        $parent = DB::table('cates')->where('id',$cate['parent_id'])->first();
                        echo $parent->name;
                    ?>
                    @endif
                  </td>
                  <input type="hidden" value="" class="url_delete">
                  <td style="text-align: center;">
                              <a href="{{asset('admin/category/edit/'.$cate['id'])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/category/delete/'.$cate['id'])}}" class="btn btn-danger dell"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
              if(data=="fail"){
               toastr.error("Không Thể Xóa");
              }
              else {
                 toastr.success("Xóa thành công");
                 $("#"+data).remove();
              }
        });
});
</script>
@include('errors.note')
@stop