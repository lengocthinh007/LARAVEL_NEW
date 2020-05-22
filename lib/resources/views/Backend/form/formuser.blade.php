 <form role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Tên</label>
                   <input type="text" name="name" class="form-control" value="{!! old('name',isset($data) ? $data['name'] : null) !!}">
                     @if($errors->has('name'))
                     <span class="err">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                  <div class="form-group">
                  <label>Mật khẩu</label>
                   <input type="password" name="password" class="form-control" value="{!! old('password',isset($data) ? $data['password'] : '') !!}">
                    @if($errors->has('password'))
                     <span class="err">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                 <div class="form-group">
                  <label>Mail</label>
                    <input type="email" name="email" class="form-control" value="{!! old('email',isset($data) ? $data['email'] : '') !!}">
                    @if($errors->has('email'))
                     <span class="err">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                  <div class="form-group">
                  <label>Phone</label>
                     <input type="number" name="phone" class="form-control" value="{!! old('phone',isset($data) ? $data['phone'] : '') !!}">
                    @if($errors->has('phone'))
                     <span class="err">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                 <div class="form-group">
                  <label>Địa Chỉ</label>
                     <input type="text" name="address" class="form-control" value="{!! old('address',isset($data) ? $data['address'] : '') !!}">
                    @if($errors->has('address'))
                     <span class="err">{{ $errors->first('address') }}</span>
                    @endif
                </div>
              <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="active" value="2" {{isset($data['active']) && $data['active'] ==2 ? 'checked' : ''}}>Có
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="active" value="1"
                        {{isset($data['active'])&&$data['active']==1 ? 'checked' : ''}}>Không
                      </label>
                    </div>
                     @if($errors->has('active'))
                     <span class="err">{{ $errors->first('active') }}</span>
                    @endif
                  </div>
               <button type="submit" class="btn btn-primary">Lưu</button>
               <button type="reset" class="btn btn-default">Hủy</button>
                </div>
                <div class="col-md-4">
                 
                  <div class="form-group">
                    <label>Ảnh sản phẩm </label>
                      <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" value="{!! old('img',isset($data) ? $data['image'] : null) !!}"> <br>
                             @if(isset($data['avatar']))
                              <img id="avatar" class="thumbnail thum" width="200px" height="200px" src="{{asset('public/Avatar/'.$data['avatar'])}}">
                              @else
                             <img id="avatar" class="thumbnail thum" width="300px" src="../Hinh/new_seo-10-512.png">
                              @endif
                    @if($errors->has('img'))
                     <span class="err">{{ $errors->first('img') }}</span>
                    @endif
                             
                  </div>
                </div>
              </form>