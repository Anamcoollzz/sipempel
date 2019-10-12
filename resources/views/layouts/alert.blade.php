@if(session($type.'_msg'))
<div class="col-md-12">
	<div class="alert alert-{{$type}}">
		{{ session($type.'_msg') }}
	</div>
</div>
@endif