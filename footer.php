
</aside>
</div><!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="jquery.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>


<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/select.js"></script>
<script type="text/javascript">
$(function () {
    //remove the row with delete button
    $(document).on('click', '.adelo_top', function(event) {
      event.preventDefault();
      $(this).parent().parent().remove();
    });

    $("select").select2();
   // add more fileds
   $('button[name=add_more]').click(function(event) {
    event.preventDefault();
    $.ajax({url: "select.php", success: function(result){
      $('.copy').last().after(result);
      $("select").select2();
    }});

  }); 

   function get_client_id () {
  // get the client id
  var cientSelected = $("select[name=client]").find("option:selected");
  var client_id  = cientSelected.val();
  return client_id;
}

//////////////////////// 
$(document).on('change', 'select#products' ,  function(event) {
  thatSelect = $(this);
  var productSelected = $(this).find("option:selected");
  var product_id  = productSelected.val();
  var client_id = get_client_id();
// send ajax call to get the price
$.ajax({
  type: 'POST',
  url: "get_client_price.php", 
  data: { product_id:product_id , client_id:client_id },
  success: function(result){
    var json = JSON.parse(result);
    //   alert(result);
    // alert(json['price']);
    //prev().prev().children('input#price').val(json['price'])
      if(json['type'] == 1) {
        type = "سعر مميز لعميل";
      }
      else {
        type = "سعر البيع العام";
      }
      thatSelect.parent().parent().find('label.price_type').remove();
      thatSelect.parent().parent().find('input#price').after('<label class="price_type">'+ type +'</label>');
      thatSelect.parent().parent().find('input#price').val(json['price']);
      // console.log(thatSelect.parent().prev().prev().children('input#price').val(json['price']));
    }});
});
});
</script>
<script type="text/javascript">
$(function() {
  $('#example1').dataTable();
});


</script>       

</body>
</html>