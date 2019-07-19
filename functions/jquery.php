<script type="text/javascript">
     $(document).ready(function(){
      $("#navDrop").click(function(){
  
      if ($("#dropClass").is(":hidden")) {
    $("#dropClass").slideDown('slow');

    }else{
    $("#dropClass").slideUp('slow');
    }
        });
      });
</script>






<script>
var firefoxTestDone = false
function reportFirefoxTestResult(result) {
  if (!firefoxTestDone) {
    $('#ff-bug-test-result')
      .addClass(result ? 'text-success' : 'text-danger')
      .text(result ? 'PASS' : 'FAIL')  
  }
  firefoxTestDone = true
}

$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
  $('#tall-toggle').click(function () {
    $('#tall').toggle()
  })
  $('#ff-bug-input').one('focus', function () {
    $('#myModal2').on('focus', function () {
      reportFirefoxTestResult(false)
    })
    $('#ff-bug-input').on('focus', function () {
      reportFirefoxTestResult(true)
    })
  })
})
</script>