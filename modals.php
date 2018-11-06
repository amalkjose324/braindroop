<!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_confirm_final_submit">Open Modal</button> -->
<div class="modal fade" id="modal_instruction_round_1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="min-width: 80%;">
    <!-- Modal content-->
    <div class="modal-content modal-instructions">
        <div class="modal-header">
          <h4 class="modal-title">Instructions for Brain Droop, Science Quiz - Tech-Fest, Azure 2k18 </h4>
          <h4 style="display: inline-block;float:right">
            <div class="timer-view col-md-2 col-sm-2 col-lg-2" id="timer-view">
              <h4 class="timer-head">Time Left</h4>
              <h4 style="font-weight:bold;color:red" class="instruction_timer_val">

              </h4>
            </div>
          </h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
          <div class="modal-footer begin-footbar">
            <button type="button" class="btn btn-success btn-begin-round-1" data-dismiss="modal">Ready to Begin Quiz</button>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
  $('#modal_instruction_round_1').modal('show');
  $('.btn-begin-round-1').click(function () {
    $fun="begin_round_1_modal";
    $.ajax({
      type:'post',
      url:'./quizactions.php',
      async:false,
      data:{fun:$fun},
      success:function(response)
      {
        var obj = JSON.parse(response)[0]['val'];
        if(obj){
          $('#modal_instruction_round_1').modal('hide');
          window.location.href = 'console.php';
        }
      }
    });
  })
})
</script>

<script>
setInterval(function(){
  $fun="instruction_timer";
  $.ajax({
    type:'post',
    url:'./quizactions.php',
    async:false,
    data:{fun:$fun},
    success:function(response)
    {
      var obj = JSON.parse(response)[0]['val'];
      if(obj){
          $('.instruction_timer_val').html(JSON.parse(response)[0]['time']);
      }else{
        $('.instruction_timer_val').html("00 : 00");
        $('.begin-footbar').show();

      }
    }
  });

},1000);
</script>