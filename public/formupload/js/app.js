$(function() {
    window.selectedImages = [];
    var names = [];
    $('body').on('change', '.picupload', function(event) {
        var files = event.target.files;
        var getAttr = $(this).attr('click-type');
        var output = document.getElementById("media-list");
        var z = 0
        if (getAttr == 'type1') {

            $('#media-list').html('');
            $('#media-list').html('<li class="myupload"><span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" click-type="type2" id="picupload" class="picupload" multiple></span></li>');
            $('#hint_brand').modal('show');
            for (var i = 0; i < files.length; i++) {
                selectedImages.push(files[i]);
                var file = files[i];
                names.push($(this).get(0).files[i].name);
                if (file.type.match('image')) {
                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {
                        var picFile = event.target;

                        var div = document.createElement("li");


                        div.innerHTML = "<img src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $("#media-list").prepend(div);


                    });
                } else {

                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<video src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'></video><div id='" + z + "'  class='post-thumb'><div  class='inner-post-thumb'><a data-id='" + event.target.fileName + "' href='javascript:void(0);' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                        $("#media-list").prepend(div);

                    });

                }
                picReader.readAsDataURL(file);
            }
            // console.log(names);
            // console.log(selectedImages);
        } else if (getAttr == 'type2') {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                selectedImages.push(files[i]);
                names.push($(this).get(0).files[i].name);
                if (file.type.match('image')) {

                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<img src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $("#media-list").prepend(div);

                    });
                } else {
                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<video src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'></video><div class='post-thumb'><div  class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $("#media-list").prepend(div);

                    });
                }
                picReader.readAsDataURL(file);

            }
            // return array of file name
            // console.log(names);
        }

    });

    $('body').on('click', '.remove-pic', function() {
        $(this).parent().parent().parent().remove();
        var removeItem = $(this).attr('data-id');
        var yet = names.indexOf(removeItem);

        if (yet != -1) {
            selectedImages.splice(yet, 1);
            names.splice(yet, 1);
        }
        // return array of file name
        // console.log(names);
    });
    $('#hint_brand').on('hidden.bs.modal', function(e) {
        names = [];
        selectedImages = [];
        z = 0;
    });



     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });


  $(".addimg").click(function (e) {
        event.preventDefault();
        var formData = new FormData();
        for (var a = 0; a < selectedImages.length; a++) {
        formData.append("images[]", selectedImages[a]);
        }
        // var i = formData.get('images[]');
        // console.log(i);
        let $this = $(this);
        let url = $this.attr('url');
        $.ajax({
                url: url,
                method:"POST",
                data:formData,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
        }).done(function(data) {
              $('#hint_brand').modal('hide');
              $('#rong').remove();
                    var html = '';
                       if(data!='')
                         {
                            $.each (data, function (key, item){
                            html +=  '<div  id="'+item['id']+'"  style="display:inline; padding: 5px;">';
                             html +=  '<img idHinh="'+item['id']+'" width="110px" src="../../public/HinhDetails/small/'+item['img']+'">';
                             html += '<a data-key="'+item['id']+'" style="position: relative;top: -50px;left: -40px;font-size: 10px;border-radius: 45px" class="btn btn-danger btn-circle icon_del dell"  href="../../admin/product/delimg/'+item['id']+'"><i class="fa fa-times"></i></a>';
                                html +=  '</div>';
                            });
                         }
                 $('#img_preview').append(html);
               
        });
});

     $('body').on('click', '.dell', function(e) {
        event.preventDefault();
              let idHinh = $(this).attr('data-key');
              let url = $(this).attr('href');
              var xoa = $(this).parent().find("img").attr("idHinh");
              if(idHinh)
              {
                $.ajax({
                      url: url,
                      type: 'GET',
                      data:{
                        idHinh:idHinh
                      }
                }).done(function(data) {
                      if(data="OK"){
                        $("#"+xoa).remove();
                      }
                      else {
                        alert("Error | please contact admin");
                      }
                });
              }
    });
});


