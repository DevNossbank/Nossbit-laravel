<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal modal-lg" id="modalTrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">
          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">TROCAR</H4>
          </div>
          <form method="post" action="">
              <div class="modal-body">
                  <div class="textModal text-start">

                      <div class="row">
                          <div class="col-8">
                              <h5 class="fw-bold">Valor de troca: </h5>
                          </div>
                          <div class="col-4">
                              <div class="row">
                                  <!--<div class="col-6">
                                      <h5 id="cryptoTroca" class="fw-bold"><span id="selectTrocarSubmit"></span></h5>

                                  </div>-->
                                  <!--<div class="col-">-->
                                      <h5 id="valorTroca" class="fw-bold text-end"> <span id="selectTrocarSubmit"></span>: <span id="TrocarValorSubmit" class="text-end"></span></h5>
                                  <!--</div>-->
                              </div>

                          </div>

                          <div class="col-8">
                              <h5 class="fw-bold">Cotação:</h5>
                          </div>
                          <div class="col-4">
                              <h5 id="priceModal" class="fw-bold text-end"></h5>
                          </div>


                          <div class="col-8">
                              <h5 class="fw-bold">Para:</h5>
                          </div>
                          <div class="col-4">
                              <div class="row">
                                      <h5 id="valorReceber" class="fw-bold text-end">
                                        <span id="selectReceberSubmit" class="text-end"></span> :  <span id="ReceberValorSubmit" class="text-end"></span>
                                    </h5>
                              </div>

                          </div>

                          <div class="col-8">
                              <h5 class="fw-bold">Taxa:</h5>
                          </div>
                          <div class="col-4">
                              <h5 id="valorTaxa" class="fw-bold"></h5>
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
    function openModal() {
        
        var TrocarValorSubmit = document.getElementById('ExchangeValue').value;
        var ReceberValorSubmit = document.getElementById('ReceiptValue').value;
        var selectTrocarSubmit = document.getElementById('selectExchangeCoin').value;
        var selectReceberSubmit = document.getElementById('selectReceipt').value;
        var priceSubmit = document.getElementById('priceValue').innerHTML;


        if(TrocarValorSubmit!="" && ReceberValorSubmit!=""
        && selectTrocarSubmit!="" && selectReceberSubmit!=""){
            document.getElementById('modalTrade').style.display = 'block';
            document.getElementById('TrocarValorSubmit').innerHTML = TrocarValorSubmit;
            document.getElementById('ReceberValorSubmit').innerHTML = ReceberValorSubmit;
            document.getElementById('selectTrocarSubmit').innerHTML = selectTrocarSubmit;
            document.getElementById('selectReceberSubmit').innerHTML = selectReceberSubmit;
            document.getElementById('priceModal').innerHTML = priceSubmit;


            
        }
        else{
            //CONFERIR
            alert("Preencha todos os campos");
        }


       
    }

    function closeModal() {
        document.getElementById('modalTrade').style.display = 'none';

    }

    function confirmExchange(){
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
    }



</script>