@extends('layouts.admin')

@section('title', 'Dodaj novi projekt')

@push('stylesheet')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
	<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
@endpush

@push('script')
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js'></script>
	<script> 
	$(function() { 
	$('#projekt-name').froalaEditor({
		height: 300
	});
	}); 

	</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upiši novi projekt</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projekti.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('narucitelj_id')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Naručitelj" name="narucitelj_id" type="text" value="{{ old('narucitelj_id') }}" />
                        {!! ($errors->has('narucitelj_id') ? $errors->first('narucitelj_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Investitor" name="investitor_id" type="text" value="{{ old('investitor_id') }}" />
                    </div>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                       <textarea class="form-control" name="name" id="projekt-name"></textarea>
						
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

 
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
