@if($orders)
 <table class="table table-bordered" style="margin-top:20px;">       
                  <thead>
                    <tr class="bg-info" style="color: white">
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Hình</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=0 ?>
                    @foreach($orders as $pro)
                    <?php $stt= $stt + 1 ?>
                <tr>
                  <td>{!! $stt !!}</td>
                  <td><a href="{{asset('Details/'.$pro->products->id.'/'.$pro->products->alias)}}" target="_blank">{{ isset($pro->products->name) ? $pro->products->name : '' }}</a></td>
                  <td> <img src="{{ isset($pro->products->image) ? asset('public/Hinh/'.$pro->products->image) : '' }}" width="150px"></td>
                  <td>{!! number_format($pro->price),0,",","." !!}VNĐ</td>
                  <td>{!! $pro->qty !!}</td>
                  <td>{{number_format($pro->price*$pro->qty,0,',','.')}} </td>
                          </tr>
                       @endforeach
                  </tbody>
                </table>   
@endif