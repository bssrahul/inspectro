@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.sqoptions.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.sqoptions.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('service_question_id', 'Service Question:') !!}		
		{!! Form::select('service_question_id',$question, null, ['class' => 'form-control']) !!}
		{!! $errors->first('service_question_id', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('option_type', 'Options Type:') !!}		
		{!! Form::select('option_type',$op_type, null, ['class' => 'form-control']) !!}
		{!! $errors->first('option_type', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group row">
		{!! Form::label('email', 'Email:',['class' => 'col-md-1']) !!}		
		{!! Form::checkbox('email',1, null, ['class' => 'pull-left']) !!}
		{!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group row">
		{!! Form::label('zip', 'Zip:',['class' => 'col-md-1']) !!}		
		{!! Form::checkbox('zip',2, null, ['class' => 'pull-left']) !!}
		{!! $errors->first('zip', '<div class="text-danger">:message</div>') !!}
	</div >
	
	 <button type ="button" class="btn btn-primary" id="addButton"><i class="glyphicon glyphicon-plus"></i> Add More Options</button>
	<div class="space"></div>
	<div id='TextBoxesGroup'>
	<div id="TextBoxDiv1" class="form-group address">
	
		<label>Option #1 : </label><input type='text' name="options[0]" maxlength="100" id='textbox1' class='form-control' >
		<div class="inputRemove">&times;</div>
		<div class="disableOption"><input type="checkbox" value="1"  name="optioncks[0]"> Do you want to disable it? </div>
	</div>
    </div>

	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@section('script')
	
	{!! script('vendor/ckeditor/ckeditor.js') !!}
	{!! script('vendor/ckfinder/ckfinder.js') !!}
	
	<script type="text/javascript">
		CKEDITOR.editorConfig = function( config ) {
			var prefix = '/{!! option("ckfinder.prefix") !!}';

		   config.filebrowserBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html';
		   config.filebrowserImageBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Images';
		   config.filebrowserFlashBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Flash';
		   config.filebrowserUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
		   config.filebrowserImageUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
		   config.filebrowserFlashUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		};

		var editor = CKEDITOR.replace( 'ckeditor' );
		var prefix = '/{!! option("ckfinder.prefix") !!}';
		CKFinder.setupCKEditor( editor, prefix + '/vendor/ckfinder/') ;
	</script>
	
	
	
	<script type="text/javascript">
	
	var counter = 1;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr({
			 id:'TextBoxDiv' + counter,
			 class:'form-group address'
		 });
                
	newTextBoxDiv.after().html('<label>Option #'+ counter + ' : </label>' +
	      '<input type="text" maxlength = "100"  name="options[' + counter + 
	      ']" id="textbox' + counter + '" value="" class="form-control"><div class="inputRemove">&times;</div><div class="disableOption"><input type="checkbox" value="1"  name="optioncks['+counter+']"> Do you want to disable it? </div>');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });
	 $(document).on("click",".address .inputRemove",function(){
   $(this).closest(".address").remove(); 
});
	</script>
@stop


<style>
.space{
	height:15px !important;
	width:100%;}
.address{
	position: relative;
}
#TextBoxesGroup div {
    line-height: 1;
}
.address input[type=text] {
	
    padding-right:25px !important;    
}
.inputRemove {
  bottom: 37px;
  cursor: pointer;
  display: inline-block;
  font-size: 36px;
  left: 1072px;
  position: relative !important;
}
.disableOption {
    bottom: 42px;
    cursor: pointer;
    display: inline-block;
    font-size: 19px;
    left: 828px;
    position: relative !important;
}
.inputRemove:hover{
    color:#DD3366;
}</style>
