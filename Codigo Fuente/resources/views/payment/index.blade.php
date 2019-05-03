{{-- @extends('layouts.clienteApp')

@section('content')
@endsection --}}
@extends('layouts.clienteApp')

@section('content')

<!-- Page -->
<div class="page">
      <div class="page-content container-fluid">
        <div id="app">
            <payment></payment>
        </div>
      </div>
    </div>

@endsection 
@section('scripts')
<script src="/js/app.js"></script>
<script src="https://checkout.culqi.com/v2"></script>
<script>
// page is now ready, initialize the calendar...
var id=$('#userId').val();
Culqi.publicKey = 'pk_test_msIFZ7yT7LdTZJEx';
Culqi.init();
function enviarData(){
    Culqi.createToken();
}
</script>
<script>  
    function culqi() {
        if(Culqi.error){
           // Mostramos JSON de objeto error en consola
           console.log(Culqi.error);
           toastr.error(Culqi.error.user_message,'Error')
        }
        else{
                var idCita=$('#idCitaPayment').val();
                var precio=$('#precioPayment').val();
                var idPaciente=$('#idPacientePayment').val();
                var token = Culqi.token.id;
		        var email = Culqi.token.email;
		        var data = {idCita: idCita, precio: precio, idPaciente: idPaciente, token: token,email:email };
		        var url = "/payment";
                $.ajax({
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    url:  url,
                    data: data,
                    beforeSend: function(){
                        $('#reloadPayment').css("visibility","visible");
                    },
                    success:function(res)
                    {
                        $('#reloadPayment').css("visibility","hidden");
                        var messageObject=JSON.parse(res);
                        $('#messageCitaPayment').val(messageObject.message);
                        toastr.success(messageObject.message,'Exito');
                        
                    },
                    error: function(error) {
                        $('#reloadPayment').css("visibility","hidden");
                        var messageObject=JSON.parse(error.responseJSON.message);
                        $('#messageCitaPayment').val(messageObject.merchant_message);
                        toastr.error(messageObject.merchant_message,'Error')
                    }

                })
           }
    };
    </script>  
@endsection