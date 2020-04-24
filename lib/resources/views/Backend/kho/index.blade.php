@extends('Backend.master')
@section('title','Kho')
@section('main') 
<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
          <div class="panel-body tabs">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">Hàng Bán Chạy</a></li>
              <li><a href="#tab2" data-toggle="tab">Hàng Tồn Kho</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <h4>Bán Chạy</h4>
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
                    @foreach($data1 as $pro)
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
              <div class="tab-pane fade" id="tab2">
                <h4>Tab 2</h4>
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
                    @foreach($data2 as $pro)
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
          </div>
        </div><!--/.panel-->

					<!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!-- /.row -->
@stop
@section('script')
@include('errors.note')
@stop