@extends('Backend.master')
@section('title','Thêm Danh mục')
@section('main') 
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Forms</div>
          <div class="panel-body">
            <div class="col-md-8 col-md-push-2">
             @include('Backend.form.formcate')
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
@stop