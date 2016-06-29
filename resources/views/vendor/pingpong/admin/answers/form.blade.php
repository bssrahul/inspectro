@if(isset($model))
	
		{!! Form::model($model, ['method' => 'PUT', 'files' => true,'id'=>'AnswerForm', 'route' => ['admin.answers.update', $model->id]]) !!}
	
	
		
@else
{!! Form::open(['files' => true, 'route' => 'admin.answers.store','id'=>'AnswerForm']) !!}
@endif
	<div class="form-group">
		
	@if(!empty($qid))
	
		
		<input type="hidden" name="qid" class="form-control" value="<?php echo $qid ;?>">

	@endif
	
		
	</div>
	<div class="form-group">
		
	@if(!empty($qid))
		{!! Form::label('question_id', 'Question:') !!}		
		{!! Form::select('question_id',$questionArr, $qid, ['class' => 'form-control required']) !!}
		{!! $errors->first('question_id', '<div class="text-danger">:message</div>') !!}
	@else
		{!! Form::label('question_id', 'Question:') !!}		
		{!! Form::select('question_id',$questionArr, null, ['class' => 'form-control required']) !!}
		{!! $errors->first('question_id', '<div class="text-danger">:message</div>') !!}
	
	@endif
		
	<?php if((isset($qid)) ){ ?>
	<input type="hidden" value="<?php echo $qid; ?>" name="question_id">
	<input type="hidden" value="<?php echo $serviceid; ?>" name="service_id">
	
	<?php } ?>	
		
	</div>
	
	<hr>
	<div id='TextBoxesGroup'>

			<div id="TextBoxDiv1" class="form-group address hclass sh answerOptionBox">
				<div class="form-group answerInput">
					<label>Answer : </label><input type='text' name="answers[0]" value = "<?php if(!empty($answer['answers'])){ echo $answer['answers'];} ?>" maxlength="100" id='textbox1' class='form-control required' >
					{!! $errors->first('answers[0]', '<div class="text-danger">:message</div>') !!}
					<div class="disableOption"> <div class="inputRemove">&times;</div></div>
				</div>
				<div class="form-group_part">
							<label for="custom_answer[0]"> Custom Answer  :</label>
							&nbsp;&nbsp;&nbsp;<br>
							<input type="radio" name="custom_answer[0]" value='0' <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 0)){ echo "checked=checked";} ?> checked><span><?php echo" None ";?> </span>
							<br>
							<input type="radio" name="custom_answer[0]" value='text' <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 'text')){ echo "checked=checked";} ?> ><span><?php echo" Input Text ";?> </span>
							<br>
							<input type="radio" name="custom_answer[0]" value='date' <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 'date')){ echo "checked=checked";} ?> ><span><?php echo" Date ";?> </span>
							<br>
							
							<span> <br> <?php echo"( If you want to use Custom Answer, Please select above box )";?> </span>
				</div>
				<div class="form-group_part">
							<label for="next_question_id[0]"> Next Question  :</label>
							<select name="next_question_id[0]" class = 'form-control' >
									<?php foreach($nextQuestionArr as $k =>$questions){ ?>
											<option value="<?php echo $k;?>"<?php if((!empty($answer['next_question_id'])) && ($answer['next_question_id'] == $k)){ echo "selected=selected";} ?>><?php echo $questions;?></option>
									<?php } ?>
							</select>
						
				</div>
				<div class="form-group_part">
						
							<label for="sort[0]"> Sort Option  :</label>
							&nbsp;&nbsp;&nbsp;
							<input type="number" name="sort[0]" class = 'form-control'  value = "<?php if(!empty($answer['sort'])){ echo $answer['sort'];} ?>">
							<div class="text-danger"></div>
						
				
				</div>
				
				<div class="form-group_part2">
							<label for="option_description[0]"> Option Description :</label>
							&nbsp;&nbsp;&nbsp;
							<input type="text" name="option_description[0]" class = 'form-control'  value = "<?php if(!empty($answer['option_description'])){ echo $answer['option_description'];} ?>">
							<div class="text-danger"></div>
				</div>
			</div>
		
    </div>
	<hr>
	 <button type ="button" class="btn btn-primary" id="addButton"><i class="glyphicon glyphicon-plus"></i> Add More Options</button>
	<div class="space"></div>
	
	<div class="form-group">
	
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@section('style')
<link href="{!! admin_asset('adminlte/css/custom.css') !!}" rel="stylesheet" type="text/css" />
<style>

textarea.form-control {
    height: 100px;
}
.form-group_part{
	
	width:31%;
	float:left;
	margin: 0 2% 1% 0;
}
.form-group_part2{
	
	width:65% !important ;
	float:left;
	margin: 1% 2% 1% 0;
}
</style>
@stop


@section('script')

<script src="{!! admin_asset('components/jquery/jquery.validate.js') !!}" type="text/javascript"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#AnswerForm').validate();
			});
	</script>
	<script type="text/javascript">
	
	var counter = 0;
		if((counter==0 )){
				
		   $('.inputRemove').hide();
		  
		} 
		
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
			 class:'form-group address hclass answerOptionBox'
		 });
                
	newTextBoxDiv.after().html('<div class="form-group answerInput"><label>Answer : </label>' +
	      '<input type="text" maxlength = "100"  name="answers[' + counter + 
	      ']" id="textbox' + counter + '" value="" class="required form-control ">'+
		  '<div class="disableOption">'+
		  ' <div class="inputRemove">&times;</div></div></div>'+
		  '<div class="form-group_part"><label for="custom_answer['+counter+']"> Custom Answer  :</label>&nbsp;&nbsp;&nbsp;<br>	<input type="radio" name="custom_answer['+counter+']" value="0" <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 0)){ echo "checked=checked";} ?> checked><span><?php echo" None ";?> </span>'+
							'<br><input type="radio" name="custom_answer['+counter+']" value="text" <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 'text')){ echo "checked=checked";} ?> ><span><?php echo" Input Text ";?> </span>'+
							'<br><input type="radio" name="custom_answer['+counter+']" value="date" <?php if((!empty($answer['custom_answer'])) && ($answer['custom_answer'] == 'date')){ echo "checked=checked";} ?> ><span><?php echo" Date ";?> </span>'+
							'<br><span> <br> <?php echo"( If you want to use Custom Answer, Please check above box )";?> </span></div>'+
		  '<div class="form-group_part"><label for="next_question_id['+counter+']"> Next Qusetion  :</label><select name="next_question_id['+counter+']" class = "form-control"><?php foreach($nextQuestionArr as $k =>$questions){ ?>'+
		  '<option value="<?php echo $k;?>"><?php echo $questions;?></option><?php } ?></select></div><div class="form-group_part"><label for="custom_answer['+counter+']"> Sort Option  :</label>'+
		  '&nbsp;&nbsp;&nbsp;<input type="number" name="sort['+counter+']" class = "form-control"><div class="text-danger"></div></div> <div class="form-group_part2"><label for="option_description['+counter+']"> Option Description :</label>'+
		  '&nbsp;&nbsp;&nbsp; <input type="text" name="option_description['+counter+']" class = "form-control"  value = "<?php if(!empty($answer['option_description'])){ echo $answer['option_description'];} ?>">'+
		  '<div class="text-danger"></div></div>');
            
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
		<?php if((isset($hd)) ){ ?>
				$('#addButton').hide();
		<?php }?>
	<?php if((isset($optId)) ){ ?>
		var optId = "<?php echo $optId;  ?>";
		
   function hideElements()
	{
		
		// for disable a Question
		
		var $selectdropDown = $('#question_id') ,
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
	
	if(optId != "" ) {
		
		hideElements();
		showElements(optId);
		
    // optId could get resolved and it's defined
     }
	<?php } ?>
	
}); 
	
	</script>
@stop


<style>

.answerOptionBox{
	float: left;
	width: 100%;
	border: 1px solid rgb(214, 214, 214);
	padding: 15px;
}
.answerInput {
	position:relative;
}

select.disabled {
    color: grey;
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
    cursor: pointer;
    display: inline-block;
    font-size: 36px;
    position: relative;
    top: 5px;
}
.disableOption {
    bottom: 42px;
    cursor: pointer;
    display: inline-block;
    font-size: 19px;
    right: 5px;
    position: absolute;
    top: 10px;
}
.inputRemove:hover{
    color:#DD3366;
}</style>