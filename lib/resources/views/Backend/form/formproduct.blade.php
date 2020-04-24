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
                  <label>Giá</label>
                   <input type="number" name="price" class="form-control" value="{!! old('price',isset($data) ? $data['price'] : '') !!}">
                    @if($errors->has('price'))
                     <span class="err">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                 <div class="form-group">
                  <label>Giá Khuyến Mãi</label>
                    <input type="number" name="Sale" class="form-control" value="{!! old('Sale',isset($data) ? $data['pro_sale'] : '') !!}">
                    @if($errors->has('Sale'))
                     <span class="err">{{ $errors->first('Sale') }}</span>
                    @endif
                </div>
                  <div class="form-group">
                  <label>Số Lượng</label>
                     <input type="number" name="pro_number" class="form-control" value="{!! old('pro_number',isset($data) ? $data['pro_number'] : '') !!}">
                    @if($errors->has('pro_number'))
                     <span class="err">{{ $errors->first('pro_number') }}</span>
                    @endif
                </div>
                      <div class="form-group">
                  <label>Mô tả</label>
                <textarea id="demo1" rows="5" class="form-control" name="description">{!! old('description',isset($data) ? $data['description'] : null) !!}</textarea>
                  <script type="text/javascript">
                      var editor = CKEDITOR.replace('demo1',{
                        language:'vi',
                        filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>
                  @if($errors->has('description'))
                     <span class="err">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                  <label>Nội Dung</label>
                <textarea id="demo" rows="5" class="form-control" name="content">{!! old('content',isset($data) ? $data['pro_content'] : null) !!}</textarea>
                  <script type="text/javascript">
                      var editor = CKEDITOR.replace('demo',{
                        language:'vi',
                        filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>
                  @if($errors->has('content'))
                     <span class="err">{{ $errors->first('content') }}</span>
                    @endif
                </div>
               <button type="submit" class="btn btn-primary">Lưu</button>
               <button type="reset" class="btn btn-default">Hủy</button>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Danh Mục</label>
                      <select name="cate" class="form-control">
                      <option value="0"> Vui lòng chọn danh mục cha </option>
                     <?php cate_parent($cate,0,"--",old('cate',isset($data) ? $data['cate_id'] : null)); ?>
                      </select>
                    @if($errors->has('cate'))
                     <span class="err">{{ $errors->first('cate') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Ảnh sản phẩm </label>
                      <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" value="{!! old('img',isset($data) ? $data['image'] : null) !!}"> <br>
                             @if(isset($data['image']))
                              <img id="avatar" class="thumbnail thum" width="200px" height="200px" src="{{asset('public/Hinh/'.$data['image'])}}">
                              @else
                             <img id="avatar" class="thumbnail thum" width="300px" src="../Hinh/new_seo-10-512.png">
                              @endif
                    @if($errors->has('img'))
                     <span class="err">{{ $errors->first('img') }}</span>
                    @endif
                             
                  </div>
                </div>
              </form>