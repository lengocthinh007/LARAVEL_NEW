 @extends('Frontend.master')
@section('title','Lấy lại password')
@section('main')
<div class="container">
      <div class="row justify-content-center">
<div class="col-md-7 col-md-offset-2" style="margin-top: 50px;color:black !important">
   @include('errors.note2')
 <form method="post" enctype="multipart/form-data">
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
                  <a href="#" class="btn btn-danger">Hủy bỏ</a>
             
               {{csrf_field()}}
            </form>
          </div>
        </div>
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
@stop