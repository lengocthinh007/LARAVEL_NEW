@extends('Backend.master')
@section('title','Thêm Sản Phẩm')
@section('main') 
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Forms</div>
          <div class="panel-body">
            <div class="col-md-8">
             @include('Backend.form.formproduct')
            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
      <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
         <div class="panel-heading" style="display: flex; align-items: center;">
           <div style="width: 44%">Thư Viện Ảnh</div>
                <ul class="btn-nav" style="margin-left: 50px;">
                <li><span><img src="../formupload/images/cam_ico.png" /><input type="file" name="" click-type="type1" class="picupload" multiple accept="image/*" /></span></li>
               </ul>
         </div>
        <div class="panel-body">
            <div name="image_preview" style=" padding: 5px;">
                    <div style="margin-left: 4%" id="img_preview">
                    </div>       
            </div>
        </div>
    </div>
</div>
    </div>
      <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
      </div>
    </div><!-- /.row -->
    <!--boostatrp modal-->
    <div class="modal fade popups" id="hint_brand" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content clearfix">
                <div class="modal-body login-box clearfix">
                      <!--user post text -wrap end-->
                    <ul id="media-list" class="clearfix">
                        <li class="myupload">
                            <span><i class="fa fa-plus" aria-hidden="true"></i><input name="img" type="file" click-type="type2" id="picupload" class="picupload" multiple></span>
                        </li>
                    </ul>

                    <!--post btn wrap-->
                    <div class="user-post-btn-wrap clearfix">
                        <input url="{{asset('admin/product/add-img/'.$data['id'])}}" type="submit" class="btn addimg" value="Thêm">
                    </div>
                    <!--post btn wrap end-->
                </div>
            </div>
        </div>
    </div>
    <!--bootstrap modal end-->
@stop
@section('script')
<script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });
 $(document).ready(function(){
      function load_img()
     {
        let url="{{ route('getimg') }}";
        var id ="{{$data['id']}}";
        $.ajax({
         url:url,
         method:"POST",
         data:{id:id},
         dataType:"json",
         success:function(data)
         { 
                var html = '';
                       if(data!='')
                         {
                            $.each (data, function (key, item){
                            html +=  '<div  id="'+item['id']+'"  style="display:inline; padding: 5px;">';
                             html +=  '<img idHinh="'+item['id']+'" width="110px" src="../../public/HinhDetails/'+item['img']+'">';
                             html += '<a data-key="'+item['id']+'" style="position: relative;top: -50px;left: -40px;font-size: 10px;border-radius: 45px" class="btn btn-danger btn-circle icon_del dell"  href="../../admin/product/delimg/'+item['id']+'"><i class="fa fa-times"></i></a>';
                                html +=  '</div>';
                            });
                         }
                        else
                        {
                          html+='<div id="rong" style="text-align: center;margin-right:45px">Chưa có ảnh</div>';
                        }
                      $('#img_preview').html(html);
          }//endsuccess
         });
      }; 

        load_img();

});
</script>
@stop