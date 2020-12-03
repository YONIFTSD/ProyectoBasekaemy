(function($){
    "use strict";

// Configura tu llave pública
Culqi.publicKey = 'pk_test_TyABKnTYn6DcMUaB';
// Configura tu Culqi Checkout

$('#btn-finalize-order').on('click', function(e) {
    e.preventDefault();
		
	
	var url = APP_URL+"/cart/validate-order";
	var btn = document.getElementById("btn-finalize-order");
	  $.ajax({
		  type: "POST",
		  url: url,
		  dataType:"json",
		  cache: false,
		  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		  data: null,
		  beforeSend: function(){
			// btn.disabled = true;
			$("#spinnerc").removeClass("d-none");
		  },
		  success: function (response)
		  {
			  if (response.status == 200) {
				fnc_culqi(response.sumary);
			  }else{
				  	alert(response.message);
					btn.disabled = false;
					$("#spinnerc").addClass("d-none");
			  }
		  }
	  });




});

function fnc_culqi(sumary) {
	//culqi options
	Culqi.options({
		lang: 'auto',
		modal: true,
		customButton: 'Pagar S/ '+sumary.total+' PEN',
		style: {
			maincolor: '#000000',
			buttontext: '#FFFFFF',
			maintext: '#0034CD',
			desctext: '#000000'
		}
	});

	//culqi setting
	Culqi.settings({
		title: 'GOODYEAR',
		currency: 'PEN',
		description: '',
		amount: (sumary.total*100)
	});

	Culqi.open();
}



  
})(jQuery);


function culqi() {
    if (Culqi.token) {
        var token = Culqi.token.id;
        //send
        send_order(token);
        // SendPayment(token);
    } else {
        console.log(Culqi.error);
    }
};


function send_order(token) {

	var url = APP_URL+"/cart/send-order";
	var btn = document.getElementById("btn-finalize-order");

	var parameters = {
		culqi_token : token,
	}

	  $.ajax({
		  type: "POST",
		  url: url,
		  dataType:"json",
		  cache: false,
		  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		  data: parameters,
		  beforeSend: function(){
			btn.disabled = true;
			$("#spinnerc").removeClass("d-none");
		  },
		  success: function (response)
		  {
			  console.log(response);
			  if(response.status == 200){
				var url = APP_URL+"/cart/order-complete/"+response.order_id;
				open(url,'_parent');
			  }else{
				btn.disabled = false;
			  }
		  }
	  });
	
}