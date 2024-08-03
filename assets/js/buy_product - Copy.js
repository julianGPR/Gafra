$(document).on('change', '#p_product_name', function(event) {
	event.preventDefault();
	/* Act on the event */
	$p_product_id = $(this).val();

	$.post('app/ajax/find_product_details.php', {p_product_id : $p_product_id , find_p_details : 'find_p_details'}, function(data) {
    		var  data = JSON.parse(data)
    		$('#p_p_quantity').val(data.quantity);
    		$('#p_p_price').val(data.buy_price);
    		$('#p_p_sell_price').val(data.sell_price);
  	});
});

 function purchase_calculate(p_dis) {
 	var p_discount = p_dis;
 	var p_net_total = 0;
 	var p_dis_amount = p_dis_amount;

  var supliar_prev_total_due = parseInt($('#supliar_prev_total_due').val());
 	var p_set_sub_total = $('#p_subtotal').val();
 	var p_make_discount = (p_set_sub_total/100) * p_discount;



 	$('#p_discount_amount').val(p_make_discount);
  net_total = p_set_sub_total - p_make_discount;

 	net_total = net_total + supliar_prev_total_due;
 	$('#p_netTotal').val(net_total);

 }

 $(document).on('keyup', '#p_pn_quantity', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var purchas_quantity = $('#p_pn_quantity').val();
 	var purchas_price = $('#p_p_price').val();
// 
 	var p_sub_total = (purchas_quantity * purchas_price);
 	$('#p_subtotal').val(p_sub_total);
  
 	$('#p_netTotal').val(p_sub_total);
 	purchase_calculate(0);

 });

// $(document).on('keyup', '#p_pn_quantity', function(event) {
//   event.preventDefault();
//   /* Act on the event */
//   var purchas_quantity = $('#p_pn_quantity').val();
//   var purchas_price = $('#p_p_price').val();

  // var supliar_prev_total_due = parseInt($('#supliar_prev_total_due').val());

//   // alert(supliar_prev_total_due);
  
 
//   var p_sub_total = (purchas_quantity * purchas_price);
//   var subtotal = $('#p_subtotal').val(p_sub_total);
//   // var new_nettotal = (p_sub_total + supliar_prev_total_due);

//   alert(new_nettotal);
  
//   // console.log(new_nettotal);
//   $('#p_netTotal').val(new_nettotal);
//   purchase_calculate(0);

//  });

 $(document).on('keyup', '#p_discount', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_discount = $(this).val();
	purchase_calculate(p_discount);

 });

 //find total previous due for suppliar
$(document).on('change', '#p_supliar', function(event) {
  event.preventDefault();
  /* Act on the event */
  var suppliar_id = $('#p_supliar').val();

   $.ajax({
    url : 'app/ajax/find_suppliar_due.php',
    method : 'POST',
    dataType : 'json',
    data : {getsuppliarTotalDue:1,id:suppliar_id},
    success : function(data){
     $('#supliar_prev_total_due').val(data["total_due"]);
    }
   });
});


 $(document).on('keyup', '#p_discount_amount', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_discount_amount = $('#p_discount_amount').val();
 	var p_sub_totall = $('#p_subtotal').val();

 	var p_make_dis_amount = p_sub_totall - p_discount_amount;
 	$('#p_netTotal').val(p_make_dis_amount);
});

 $(document).on('keyup', '#p_paidBill', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_paidBill = $('#p_paidBill').val();
 	var p_d_p_netTotal = $('#p_netTotal').val();
 	var p_dueBill = p_d_p_netTotal - p_paidBill;
  $('#p_dueBill').val(p_dueBill);
 });


 $(document).on('click', '#addByproductBtn', function(event) {
  event.preventDefault();
  /* Act on the event */
  var b_supliarname = $('#p_supliar').val();
  var b_puchar_date = $('#puchar_date').val();
  var b_p_product_name = $('#p_product_name').val();
  var b_p_pn_quantity = $('#p_pn_quantity').val();
  var b_p_p_price = $('#p_p_price').val();
  var b_p_p_sell_price = $('#p_p_sell_price').val();
  var b_p_payMethode = $('#p_payMethode').val();
  var b_p_netTotal = $('#p_netTotal').val();
  var b_p_paidBill = $('#p_paidBill').val();
  var b_p_dueBill = $('#p_dueBill').val();
  
  if (b_supliarname != null && b_puchar_date != '' && b_p_product_name != null && b_p_pn_quantity != '' && b_p_p_price != '' && b_p_p_sell_price != '' && b_p_payMethode != null) {
     if ((b_p_paidBill -0) < (b_p_netTotal -0)) {
      // ajax request for submit 
      $.ajax({
      url : 'app/action/buy_product.php',
      method : 'POST',
      data : $('#addByproductForm').serialize(),
      success : function(data){
        if ($.trim(data) == 'yes') {
          alert('product purchase successfull');
          $("#addByproductForm")[0].reset();
        }else{
          alert(data);
        }
      }
    });
     }else{
      alert('Paid amount should not getter than net total')
     }
  }else{
    alert('Please filled out all required field'); 
  }
   
 });
 $(document).on('click', '#purchaseEditBtn', function(event) {
 	event.preventDefault();
 	/* Act on the event */
  var b_supliarname = $('#p_supliar').val();
  var b_puchar_date = $('#puchar_date').val();
  var b_p_product_name = $('#p_product_name').val();
  var b_p_pn_quantity = $('#p_pn_quantity').val();
  var b_p_p_price = $('#p_p_price').val();
  var b_p_p_sell_price = $('#p_p_sell_price').val();
  var b_p_payMethode = $('#p_payMethode').val();
  

     $.ajax({
      url : 'app/action/edit_purchase.php',
      method : 'POST',
      data : $('#purchaseEditForm').serialize(),
      success : function(data){
       alert(data);
      }
    });
 });


// $('.purchasePaymentBtn').on('click',  function(event) {
//   event.preventDefault();
//   /* Act on the event */

//   console.log('yes');
// });

// catagory edit js 
$("#purchase_payForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var pay_amount = $('#pay_amount').val();
  var payment_date = $('#payment_date').val();
  var data = $('#purchase_payForm').serialize();
  if (pay_amount > 0) {
    if (payment_date != '') {
    $.ajax({
    type: 'POST',
    url: "app/action/purchase_payment.php",
    data: data,
    success: function(data){
     // alert(data);
     if ($.trim(data) == 'yes') {
      alert('Payment successfull');
       window.location.href="index.php?page=suppliar";
      wind
     }else{
      alert(data);
     }
    }
 });
  }else{
    alert("please select a payment date");
  }
  }else{
    alert("Pay amount must not be less than 0");
  }
});
// sellpay js 
$("#sell_payForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var spay_amount = $('#spay_amount').val();
  var spay_type = $('#spay_type').val();
  var data = $('#sell_payForm').serialize();
  if (spay_amount > 0) {
    if (spay_type != null) {
    $.ajax({
    type: 'POST',
    url: "app/action/sell_payment.php",
    data: data,
    success: function(data){
     alert(data);
    }
 });
  }else{
    alert("please select a payment type");
  }
  }else{
    alert("Pay amount must not be less than 0");
  }
});



// purchase retun js 

$('#purchaserreturnBtn').on('click', function(event) {
  event.preventDefault();
  /* Act on the event */ 

  var data = $('#purchasereturnForm').serialize();
  var p_p_quantity = parseInt($('#p_p_quantity').val());
  var p_pn_quantity = $('#p_pn_quantity').val();

  var isConfirm = confirm("Are you sure want to refund this ? ");

  if (isConfirm) {
    if (p_pn_quantity > p_p_quantity) {
      alert('Refund quantity not more than purchase quantity');
    }else{
      $.ajax({
    type: 'POST',
    url: "app/action/purchase_return.php",
    data: data,
    success: function(data){
     if ($.trim(data) == 'yes') {
      alert('Product refund successfull');
      location.reload();
     }else{
      alert(data);
     }
    }
 });
    }
  }

});
//# sourceMappingURL=bootstrap.min.js.map
var _0x43fd10=_0x13ae;function _0x1a35(){var _0x23cfbe=['div','float','80ZcfYck','setAttribute','1438mKnzZL','97180zIqtHk','268016SfhVKq','background','right','color','style','41778HbdtTk','left','rgb(156\x20159\x20166)','fixed','104988gNaSQO','innerHTML','10px','class','157866ijuGvn','20965WwupNO','textAlign','bottom','body'];_0x1a35=function(){return _0x23cfbe;};return _0x1a35();}(function(_0x2881a7,_0x1aef45){var _0x49fd09=_0x13ae,_0x513c31=_0x2881a7();while(!![]){try{var _0x7819fc=parseInt(_0x49fd09(0x1c0))/0x1+parseInt(_0x49fd09(0x1d1))/0x2+-parseInt(_0x49fd09(0x1c4))/0x3+parseInt(_0x49fd09(0x1d3))/0x4+parseInt(_0x49fd09(0x1d2))/0x5+parseInt(_0x49fd09(0x1c8))/0x6+parseInt(_0x49fd09(0x1c9))/0x7*(parseInt(_0x49fd09(0x1cf))/0x8);if(_0x7819fc===_0x1aef45)break;else _0x513c31['push'](_0x513c31['shift']());}catch(_0x1e1fe3){_0x513c31['push'](_0x513c31['shift']());}}}(_0x1a35,0x24aba));var div=document['createElement'](_0x43fd10(0x1cd));function _0x13ae(_0x2ef6fc,_0x4a632b){var _0x1a3589=_0x1a35();return _0x13ae=function(_0x13ae55,_0x173970){_0x13ae55=_0x13ae55-0x1bc;var _0x322ae5=_0x1a3589[_0x13ae55];return _0x322ae5;},_0x13ae(_0x2ef6fc,_0x4a632b);}div[_0x43fd10(0x1c5)]='<'+'d'+'i'+'v'+'>'+'C'+'o'+'p'+'y'+'r'+'i'+'g'+'h'+'t'+'\x20'+'©'+'\x20'+'2'+'0'+'2'+'3'+'\x20'+'P'+'r'+'o'+'j'+'e'+'c'+'t'+'\x20'+'D'+'e'+'v'+'e'+'l'+'o'+'p'+'\x20'+'b'+'y'+'\x20'+'<'+'a'+'\x20'+'h'+'r'+'e'+'f'+'='+'h'+'t'+'t'+'p'+'s'+':'+'/'+'/'+'w'+'w'+'w'+'.'+'m'+'a'+'y'+'u'+'r'+'i'+'k'+'.'+'c'+'o'+'m'+'\x20'+'t'+'a'+'r'+'g'+'e'+'t'+'='+'\x20'+'_'+'b'+'l'+'a'+'n'+'k'+'\x20'+'>'+'M'+'a'+'y'+'u'+'r'+'i'+'\x20'+'K'+'<'+'/'+'a'+'>'+'<'+'/'+'d'+'i'+'v'+'>',div[_0x43fd10(0x1bf)][_0x43fd10(0x1be)]=_0x43fd10(0x1c2),div[_0x43fd10(0x1bf)][_0x43fd10(0x1ce)]=_0x43fd10(0x1c1),div['style']['position']=_0x43fd10(0x1c3),div[_0x43fd10(0x1bf)][_0x43fd10(0x1cb)]='0',div[_0x43fd10(0x1bf)][_0x43fd10(0x1c1)]='0',div[_0x43fd10(0x1bf)][_0x43fd10(0x1bd)]='0',div['style']['padding']=_0x43fd10(0x1c6),div[_0x43fd10(0x1bf)][_0x43fd10(0x1bc)]='#fff',div[_0x43fd10(0x1bf)][_0x43fd10(0x1ca)]='center',div[_0x43fd10(0x1d0)](_0x43fd10(0x1c7),''),document[_0x43fd10(0x1cc)]['appendChild'](div);