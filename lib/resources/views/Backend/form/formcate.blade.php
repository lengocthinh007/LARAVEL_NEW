    <form method="post" enctype="multipart/form-data" role="form">
                 {{csrf_field()}}
                    <div class="form-group">
                    <label>Danh mục cha</label>
                    <select required name="parent_id" class="form-control">
                      <option value="0"> None </option>
                     <?php cate_parent($parent,0,"",old('parent_id',isset($data) ? $data['parent_id'] : null)); ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label>Tên Danh mục</label>
                  <input type="text" name="name" class="form-control" value="{!! old('name',isset($data) ? $data['name'] : null) !!}">
                   @if($errors->has('name'))
                     <span class="err">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                  <div class="form-group">
                  <label>Từ Khóa</label>
                  <input type="text" name="keywords" class="form-control" value="{!! old('keywords',isset($data) ? $data['keywords'] : null) !!}">
                    @if($errors->has('keywords'))
                     <span class="err">{{ $errors->first('keywords') }}</span>
                    @endif
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                   <textarea required rows="5" class="form-control" name="description">{!! old('description',isset($data) ? $data['description'] : null) !!} </textarea>
                    @if($errors->has('description'))
                     <span class="err">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                  <button type="submit" class="btn btn-primary">Lưu</button>
                  <button type="reset" class="btn btn-default">Hủy Bỏ</button>
                </div>
              </form>