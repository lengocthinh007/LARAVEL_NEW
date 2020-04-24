@extends('Backend.master')
@section('title','Thêm User')
@section('main') 
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Forms</div>
          <div class="panel-body">
            <div class="col-md-8">
             @include('Backend.form.formuser')
            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
    
       
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
                        <input url="{{asset('admin/product/add-img/1')}}" type="submit" class="btn addimg" value="Thêm">
                    </div>
                    <!--post btn wrap end-->
                </div>
            </div>
        </div>
    </div>
    <!--bootstrap modal end-->
@stop
@section('script')
@stop