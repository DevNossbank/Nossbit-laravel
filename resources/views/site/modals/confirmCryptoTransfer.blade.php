<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal" id="modalTransfer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">
          <div class="modal-header" class="text-end">

          </div>
          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">Transferência</H4>
          </div>
          <form method="post" action="">
              <div class="modal-body">
                  <div class="textModal text-start">

                      <div class="row">
                          <div class="col-8">
                              <h5 class="fw-bold">Valor Transferência: </h5>
                          </div>
                          <div class="col-4">
                              <div class="row">
                                  <div class="col-6">
                                      <h5 id="cryptoTroca" class="fw-bold text-end">USDT<span id="selectTrocarSubmit"></span></h5>

                                  </div>
                                  <div class="col-6">
                                      <h5 class="fw-bold text-end"> <span id="AmountCrypto" class="text-end"></span></h5>
                                  </div>
                              </div>

                          </div>

                          <div class="col-8">
                              <h5 class="fw-bold">Taxa:</h5>
                          </div>
                          <div class="col-4">
                              
                          </div>


                          <div class="col-8">
                              <h5 class="fw-bold">Endereço de Transferência:</h5>
                          </div>
                          <div class="col-12">
                              <span id="WalletReceive" class="text-end"></span>

                          </div>

                        
                      </div>

                  </div>
              </div>



              <div class="">
                  <div class="row m-3">
                      <div class="col-6 d-grid gap-2">
                          <button type="button" id="ConfirmarExchange" name="ConfirmarExchange"
                              class="btn btnColor WB" onclick="confirmExchange()">Confirmar</button>
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
    function openModalTransfer() {
        
        valueSendCryptoSubmit = document.getElementById('valueSendCrypto').value;
        walletIDSubmit = document.getElementById('walletID').value;

        if(valueSendCryptoSubmit!="" && walletIDSubmit!=""){

            document.getElementById('modalTransfer').style.display = 'block';
            

            document.getElementById('AmountCrypto').innerHTML = valueSendCryptoSubmit;
            document.getElementById('WalletReceive').innerHTML = walletIDSubmit;
        }
        else{
            //CONFERIR
            alert("Preencha todos os campos");
        }

                
    }

    function closeModal() {
        document.getElementById('modalTransfer').style.display = 'none';

    }

    /*function confirmExchange(){
        var EXv = TrocarValorSubmit.innerHTML;
        var RCv = ReceberValorSubmit.innerHTML;
        var CoinEX=selectTrocarSubmit.innerHTML;
        var CoinRC = selectReceberSubmit.innerHTML;
        var Price = document.getElementById('priceModal').innerHTML;

        console.log("Exchange Value: "+EXv+" Receive Value: "+RCv+" Coin for exchange: "+CoinEX+" Coin that will receive: "+CoinRC+" Price: "+Price);

        try{
            $.ajax({
                type: 'POST',
                url: '/tradeConfirmation',
                data: {
                    EXv: EXv,
                    RCv: RCv,
                    CoinEX: CoinEX,
                    CoinRC: CoinRC,
                    Price: Price,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    if(response == 1){
                        alert('Operação efetuada com sucesso');
                        location.reload();
                    }else{
                        alert('Algo deu errado, por favor tente novamente.')
                        location.reload();
                    }
                
                },
                error: function (error) {
                    console.error(error);
                    alert('Tente novamente mais tarde');
                    location.reload();
                }
            });
        }
        catch(error){
            location.reload();
        }
    }*/



</script>