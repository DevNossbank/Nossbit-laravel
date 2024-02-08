<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal" id="modalDeposit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">
          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">DEPÓSITO (BRL)
                <img src="/img/icon/brl-icon.png"  width="35">
              </H4>
          </div>
          <form method="post" action="">
            @csrf
            <div class="modal-body">
                <div class="textModal text-start">

                    <div class="row"> 
                        <p>Após efetuar o pagamento feche esse pop-up e espere alguns minutos até o saldo atualizar</p>
                      
                        
                        <div class="col-8">
                            <h5 class="fw-bold">Valor Deposito: </h5>
                        </div>
                        <div class="col-4">
                            <h5 class="fw-bold text-end">BRL <span id="depositValue" class="text-end"></span></h5>
                        </div>

                        <hr>
                        <h5 class="mt-3 fw-bold">Pix copia e cola:</h5>

                        <div class="input-group justify-content-center">
                            <button class="btn btn-success" type="button" id="button-addon1" onclick="copiarTexto()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg>
                                <p>COPIAR</p>
                            </button>
                            <input id="textCopy" class="form-control" type="text" value=""/>
                        </div>

                    </div>

                </div>
            </div>



            <div class="">
                <div class="row m-3">
                    <div class="col-6 d-grid gap-2">
                        <button type="button" id="ConfirmarExchange"
                            class="btn btnColor WB" onclick="PaymentComplete()">Pagamento realizado</button>
                    </div>
                    <div class="col-6 d-grid gap-2">
                        <button type="button" class="btn btn-dark WB" data-bs-dismiss="modal"  onclick="closeModalDeposit()">Cancelar</button>

                    </div>
                </div>
            </div>
        </form>

            
      </div>
  </div>
</div>

<script>
    var BRLdeposit;

    function openModalDeposit() {

        BRLdeposit = document.getElementById('BRLdeposit').value;


        if(BRLdeposit!="" ){
        
        makeDeposit()

        }else{
            alert("Preencha todos os campos");
        }
    }

    function closeModalDeposit() {
        document.getElementById('modalDeposit').style.display = 'none';

    }

    function makeDeposit(){
       // 

        
        try{
            $.ajax({
                type: 'POST',
                url: '/deposit',
                data: {
                    BRLdeposit: BRLdeposit,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                   console.log(response)
                   document.getElementById('modalDeposit').style.display = 'block';
                   document.getElementById('depositValue').innerHTML = BRLdeposit;
                   document.getElementById('textCopy').value = response;

                   
                },
                error: function (error) {
                    console.log(error)

                    alert('Tente novamente mais tarde');
                    location.reload();
                }
            });
        }
        catch(error){
            location.reload();
        }
    }

    function PaymentComplete(){
        location.reload();

    }
  


</script>