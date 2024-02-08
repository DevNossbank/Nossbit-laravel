<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal" id="modalWithdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">

          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">SAQUE (BRL)
                <img src="/img/icon/brl-icon.png"  width="35">
              </H4>
          </div>
          <form method="post" action="">
            @csrf
            <div class="modal-body">
                <div class="textModal text-start">

                    <div class="row">
                        <div class="col-8">
                            <h5 class="fw-bold">Valor Saque: </h5>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-end">BRL <span id="withdrawValue" class="text-end"></span></h5>
                        </div>

                        <div class="col-8">
                            <h5 class="fw-bold">Taxa: </h5>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-end">BRL 2.99</h5>
                        </div>

                        <div class="col-8">
                            <h5 class="fw-bold">Destinatário: </h5>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-end"><span id="pix" class="text-end"></span></h5>
                        </div>
                    </div>

                </div>
            </div>



            <div class="">
                <div class="row m-3">
                    <div class="col-6 d-grid gap-2">
                        <button type="button" id="ConfirmarExchange"
                            class="btn btnColor WB" onclick="ConfirmWithDraw()">Confirmar</button>
                    </div>
                    <div class="col-6 d-grid gap-2">
                        <button type="button" class="btn btn-dark WB" data-bs-dismiss="modal"  onclick="closeModal()">Cancelar</button>

                    </div>
                </div>
            </div>
        </form>

            
      </div>
  </div>
</div>

<script>
    var PIXSubmit;
    var BRLwithdrawSubmit;

    function openModalWithdraw() {
        
        BRLwithdrawSubmit = document.getElementById('BRLwithdraw').value;
        PIXSubmit = document.getElementById('PIX').value;

        if(BRLwithdrawSubmit!="" && PIXSubmit!=""){

            document.getElementById('modalWithdraw').style.display = 'block';

            document.getElementById('withdrawValue').innerHTML = BRLwithdrawSubmit;
            document.getElementById('pix').innerHTML = PIXSubmit;
        }
        else{
            //CONFERIR
            alert("Preencha todos os campos");
        }

       
    }

    function closeModal() {
        document.getElementById('modalWithdraw').style.display = 'none';

    }

    function ConfirmWithDraw(){
     
        try{
            $.ajax({
                type: 'POST',
                url: '/withdrawConfirmation',
                data: {
                    PIXSubmit: PIXSubmit,
                    BRLwithdrawSubmit: BRLwithdrawSubmit,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response=="processing"){
                        alert('Sua solicitação está sendo processada');
                        location.reload();

                    }
                    else if(response=="sent"){
                        alert('Sua solicitação foi aprovada');
                        location.reload();

                    }
                    else{
                        alert('Algo deu errado, por favor, verifique seu saldo.');
                        location.reload();

                    }
                
                },
                error: function (error) {
                    alert('Tente novamente mais tarde');
                    location.reload();
                }
            });
        }
        catch(error){
            location.reload();
        }
    }

  


</script>