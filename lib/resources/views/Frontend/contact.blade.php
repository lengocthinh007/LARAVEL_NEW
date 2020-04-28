@extends('Frontend.master')
@section('title','Contact')
@section('main') 
  <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->     
            <!-- Begin Contact Main Page Area -->
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container">
                    <div class="row">
                        <div style="margin-left: 10%" class="col-md-8 col-md-push-2">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Liên hệ với chúng tôi</h3>
                                <div class="contact-form">
                                    <form  enctype="multipart/form-data" method="post" id="contact_form">
                                        <div class="form-group">
                                            <label>Họ Tên <span class="required">*</span></label>
                                            <input type="text" name="c_name" id="contact_form_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="c_email" id="contact_form_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" name="c_title" id="contact_form_phone">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Nội dung</label>
                                            <textarea name="c_content" id="contact_form_message" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	@stop
@section('script') 
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<!-- <script src="js/contact_custom.js"></script> -->
	<script type="text/javascript">
	$(document).ready(function(){

		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		 $('#contact_form').on('submit', function(event){
			  event.preventDefault();
			  if($('#contact_form_email').val() != '' && $('#contact_form_message').val() != '')
			  {
			   var form_data = $(this).serialize();
			   let url="{{ route('lien-he') }}";
			   $.ajax({
			    url:url,
			    method:"POST",
			    data:form_data,
			    success:function(data)
			    {
			     $('#contact_form')[0].reset();

				      toastr.success(data);
			    }
			   });
			  }
			  else
			  {
			   alert("Không được để trống");
			  }
		});
	});	
	</script>
@stop