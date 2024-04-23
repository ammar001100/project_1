@if(count($errors) > 0)
@foreach($errors->all() as $e)
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
{{$e}}
<button class="close" aria-label="Close" type="button" data-dismiss="alert">
	<span aria-hidden="true">×</span>
</button>
</div>
@endforeach
@endif