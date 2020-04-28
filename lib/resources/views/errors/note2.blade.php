@if(Session::has('message'))
<div class="alert alert-{!!Session::get('level')!!}" style="text-align: center;">
		{!!Session::get('message')!!}
	</div>
@endif
<!-- @foreach($errors->all() as $error)
<p class='alert alert-danger'>{{$error}}</p>
@endforeach -->
@if(count($errors) > 0)
	<div class="alert alert-danger" style="text-align: center;">
		@foreach($errors->all() as $error)
			{{$error}}<br>
		@endforeach
	</div>
@endif


<!-- @if(Session('loi'))
<p class='alert alert-danger'>{{Session('loi')}}</p>
@endif -->