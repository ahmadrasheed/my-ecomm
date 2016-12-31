
<meta name="_token" content="<?php echo csrf_token(); ?>"/>


<div class="secure">Secure Login form</div>
<?php echo Form::open(array('url'=>'account/login','method'=>'POST', 'id'=>'myform')); ?>

<div class="control-group">
  <div class="controls">
     <?php echo Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Email')); ?>

  </div>
</div>
<div class="control-group">
  <div class="controls">
  <?php echo Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')); ?>

  </div>
</div>
<?php echo Form::button('Login', array('class'=>'send-btn')); ?>

<?php echo Form::close(); ?>





<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>





<script type="text/javascript">
$(document).ready(function(){
  $('.send-btn').click(function(){            
    $.ajax({
      url: 'login',
      type: "post",
      data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
        alert(data);
      }
    });      
  }); 
});
</script>