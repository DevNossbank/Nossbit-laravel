<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal" id="modalTransfer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">
          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">Transferência</H4>
          </div>
          <form method="post" action="">
                <div class="modal-body">
                    <div class="textModal text-start">

                        <div class="row">
                            <h5 class="text-end">Rede: <span id="selectTransferNetworkSubmit"></span></h5>
                            <div class="col-8">
                                <h5 class="fw-bold">Valor Transferência: </h5>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 id="cryptoTroca" class="fw-bold text-end"><span id="selectTransferCoinSubmit"></span></h5>

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

                            <hr class="mt-3">

                            <p>Observação: A NOSSBIT não possui representantes, não promete lucros em investimentos, nem solicita que você realize envios para outras carteiras.
                            </p>
                            <h5 class="fw-bold mt-3">Para prosseguir com o saque, você deve: </h5>
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Certificar-se que o endereço e a rede selecionada estão corretos*.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Declarar que está ciente de que envios são irreversíveis, e dados inseridos incorretamente podem ocasionar em perdas*.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Enviar criptos a terceiros com promessas de retornos podem resultar em perdas*.
                                </label>
                            </div>

                        </div>

                        
                    </div>

                </div>
                  




              <div class="">
                  <div class="row m-3">
                      <div class="col-6 d-grid gap-2">
                          <button type="button"
                              class="btn btnColor WB" onclick="confirmTransfer()">Confirmar</button>
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
        selectTransferCoinSubmit = document.getElementById('selectTransferCoin').value;
        selectTransferNetworkSubmit = document.getElementById('selectTransferNetwork').value;
        selectTransferCoinSubmit = document.getElementById('selectTransferCoin').value;

        
        if(valueSendCryptoSubmit!="" && walletIDSubmit!="" && selectTransferCoinSubmit!=""&& selectTransferNetworkSubmit!=""){

            document.getElementById('modalTransfer').style.display = 'block';
            
            document.getElementById('AmountCrypto').innerHTML = valueSendCryptoSubmit;
            document.getElementById('WalletReceive').innerHTML = walletIDSubmit;
            document.getElementById('selectTransferCoinSubmit').innerHTML = selectTransferCoinSubmit;
            document.getElementById('selectTransferNetworkSubmit').innerHTML = selectTransferNetworkSubmit;


        }
        else{
            //CONFERIR
            alert("Preencha todos os campos");
        }

                
    }

    function closeModal() {
        document.getElementById('modalTransfer').style.display = 'none';

    }

    function confirmTransfer(){
        var Value = valueSendCryptoSubmit;
        var Wallet = walletIDSubmit;
        var Coin = selectTransferCoinSubmit;
        var Network = selectTransferNetworkSubmit;

        let checkbox = document.getElementById('checkbox1');
        let checkbox2 = document.getElementById('checkbox2');
        let checkbox3 = document.getElementById('checkbox3');


        if(checkbox.checked  && checkbox2.checked && checkbox3.checked){
                try{
                $.ajax({
                    type: 'POST',
                    url: '/transferCryptoConfirmation',
                    data: {
                        Value: Value,
                        Wallet: Wallet,
                        Coin: Coin,
                        Network: Network,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        if(response == 1){
                            alert('Transferencia efetuada com sucesso');
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
        }else{
            
        }

       
    }



</script>