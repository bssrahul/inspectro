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
	
	<div class="form-group">
		
		
		
		{!! Form::label('inputbox', '  Other Input Field  :  ') !!}	
		&nbsp;&nbsp;&nbsp;
		{!! Form::checkbox('inputbox') !!} 
		</br>
		<span> <?php echo"( If you need Other Input field, Please check above box )";?> </span>
		{!! $errors->first('inputbox', '<div class="text-danger">:message</div>') !!}
		
	</div>
	<div id='TextBoxesGroup'>

		<?php if(!empty($optionArr)){
				foreach($optionArr as $k=>$optionData){ ?>
						
			<div id="TextBoxDiv1" class="form-group address hclass sh<?php echo $k; ?>">
		
				<label>Option : </label><input type='text' name="options[<?php echo $k; ?>]" maxlength="100" id='textbox1' class='form-control'value="<?php echo $optionData->option; ?>" >
				<div class="inputRemove">&times;</div>
				<div class="disableOption"><input type="checkbox" value="1"  name="optioncks[<?php echo $k; ?>]" <?php if( $optionData->status == 1 ){echo "checked=checked";}?>> Do you want to disable it? </div>
			</div>
		<?php }	
		}else{ ?>
			<div id="TextBoxDiv1" class="form-group address hclass sh">
		
				<label>Option : </label><input type='text' name="options[0]" maxlength="100" id='textbox1' class='form-control' >
				<div class="inputRemove">&times;</div>
				<div class="disableOption"><input type="checkbox" value="1"  name="optioncks[0]"> Do you want to disable it? </div>
			</div>
			
			
		<?php }	?>
		
    </div>
	
	 <button type ="button" class="btn btn-primary" id="addButton"><i class="glyphicon glyphicon-plus"></i> Add More Options</button>
	<div class="space"></div>
	

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
	
	var counter = 0;
	<?php if(!empty(@$k)){
		?>
		var initialCounter = "<?php echo $k; ?>";
		counter = initialCounter;
		
	<?php } ?>
		
		//console.log(counter);
		// $('#TextBoxesGroup')
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
	counter++;	
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr({
			 id:'TextBoxDiv' + counter,
			 class:'form-group address hclass'
		 });
                
	newTextBoxDiv.after().html('<label>Option : </label>' +
	      '<input type="text" maxlength = "100"  name="options[' + counter + 
	      ']" id="textbox' + counter + '" value="" class="form-control"><div class="inputRemove">&times;</div><div class="disableOption"><input type="checkbox" value="1"  name="optioncks['+counter+']"> Do you want to disable it? </div>');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	
	
     });
	 $(document).on("click",".address .inputRemove",function(){
	   $(this).closest(".address").remove(); 
	   counter--;
	   
	   	if((counter==0 )){
		   $('.inputRemove').hide();
		} 
	 
	 });
	</script>
	
	<script type="text/javascript">
	$(document).ready(function(){
	<?php if((isset($optId))){ ?>
   var optId = "<?php echo $optId;  ?>";

   function hideElements()
	{
		$('.hclass,#addButton').hide();
		// for disable a Option Type
		var $dropDown = $('#option_type') ,
		name = $dropDown.prop('name') ,
		$form = $dropDown.parent('form');
		$dropDown.data('original-name',name); 
		$dropDown.addClass('disabled').prop({'name' : name + "_1" , disabled : true});
		// for disable a Question
		var $selectdropDown = $('#service_question_id') ,
		name = $selectdropDown.prop('name') ,
		$form = $selectdropDown.parent('form');
		$selectdropDown.data('original-name',name); 
		$selectdropDown.addClass('disabled').prop({'name' : name + "_1" , disabled : true});
		 
	}
	function showElements(optId)
	{
		$('.sh'+optId).show();
		//$('input[name="options['+optId+']"]').closest( ".hclass" ).show();
	} 
	
	if(( typeof optId !== 'undefined') && (optId != "" )) {
		
		hideElements();
		showElements(optId);
		
    // optId could get resolved and it's defined
     }
	<?php } ?>
	
}); 
	
	</script>
@stop


<style>

select.disabled {
    color: e1e1e1;
}
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
