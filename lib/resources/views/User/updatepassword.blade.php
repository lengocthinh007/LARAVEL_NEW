@extends('User.master')
@section('title','Password')
@section('main') 
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Forms</div>
          <div class="panel-body">
            <div class="col-md-8 col-md-push-2">
            <form method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                 <div class="form-group" style="position: relative;" >
                    <label>Mật Khẩu</label>
                    <input required type="Password" placeholder="******" name="Password_old" class="form-control"
                    value=""
                    >
                    <a style="position: absolute;top: 54%;right: 5%;color: #333" href="javascript:void(0)"> <i class="fa fa-eye"></i> </a>
                  </div>
                <div class="form-group" style="position: relative;">
                    <label>Mật Khẩu Mới</label>
                    <input required type="Password" placeholder="******" name="Password" class="form-control"
                    value="" 
                    >
                    <a style="position: absolute;top: 54%;right: 5%;color: #333" href="javascript:void(0)"> <i class="fa fa-eye"></i> </a>
                  </div>
                <div class="form-group" style="position: relative;">
                    <label>Nhập Lại Mật Khẩu</label>
                    <input required required type="Password" placeholder="******" name="Password_confirm" class="form-control"
                    value="" 
                    >
                    <a style="position: absolute;top: 54%;right: 5%;color: #333" href="javascript:void(0)"> <i class="fa fa-eye"></i> </a>
                  </div>
                  <div class="form-group">
                     @if($errors->has('Password_confirm'))
                     <span class="err">{{ $errors->first('Password_confirm') }}</span>
                    @endif
                  </div>
               <button type="submit" class="btn btn-primary">Lưu</button>
               <button type="reset" class="btn btn-default">Hủy</button>
                </div>
             
                </div>
              </form>
            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
      <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
      </div>
    </div><!-- /.row -->
@stop
@section('script')
<script type="text/javascript">
  $(function(){
      $(".form-group a").click(function(){
        let $this = $(this);
        if($this.hasClass('active'))
        {
          $this.parents('.form-group').find('input').attr('type','Password');
          $this.removeClass('active');
        }
        else
        {
          $this.parents('.form-group').find('input').attr('type','text');
          $this.addClass('active');
        }
      });
  });
</script>
@include('errors.note')
@stop