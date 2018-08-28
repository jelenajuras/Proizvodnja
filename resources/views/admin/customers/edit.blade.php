<link rel="stylesheet" href="{{ URL::asset('css/clients.css') }}"/>

<div class="Jproj" id="myModal" >
    <div class="Jside-proj">
		<h3 class="">Add new client</h3>
		<p class=""><span>1</span>Client info</h3>
	</div>
	<div class="Jmain-proj">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.update', $customer->id) }}" enctype="multipart/form-data">
			<fieldset>
				<p>company logo</p>
				<div class="logo">
					<img id="output" style="max-height: 100%; max-width: 100%;"/>
					<div class="logo1">
						<label for="files" id="label"><i class="fas fa-cloud-upload-alt"></i><span>click to upload</span><span> .png .jpg</span></label>
						<input id="files" accept="image/*" onchange="loadFile(event)" style="visibility:hidden;" type="file" name="logo"/>
					</div>
				</div>
				<p>clint name</p>
				<div class=" {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
					<input class="form-control" name="naziv" type="text" value="{{ $customer->naziv}}" required/>
					{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>address</p>
				<div class=" {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
					<input class="form-control" name="adresa" type="text" value="{{ $customer->adresa }}" required/>
					{!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>city</p>
				<div class=" {{ ($errors->has('grad')) ? 'has-error' : '' }}">
					<input class="form-control" name="grad" type="text" value="{{ $customer->grad }}" required/>
					{!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>OIB</p>
				<div class=" {{ ($errors->has('oib')) ? 'has-error' : '' }}">
					<input class="form-control" name="oib" type="text" value="{{ $customer->oib }} " required/>
					{!! ($errors->has('oib') ? $errors->first('oib', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="edit">
			</fieldset>
		</form>
    </div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>


<script>
//Preview an image before it is uploaded
$("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
});
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.getElementById('label').style.display = "none";
  };
</script>