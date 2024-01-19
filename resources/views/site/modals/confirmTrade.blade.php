<link rel="stylesheet" type="text/css" href="/css/modal.css">
<link rel="stylesheet" type="text/css" href="/css/buttonGradient.css">


<div class="modal" id="modalTrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content text-center">
          <div class="modal-header" class="text-end">

          </div>
          <iframe src="https://lottie.host/embed/f48b50f1-f89d-46c8-acbc-d0994a59c985/UakZdDBVV3.json"></iframe>
          <div class="trocarModel mb-2">
              <H4 class="text-center">TROCAR</H4>
          </div>
          <form method="posti" action="">
              <div class="modal-body">
                  <div class="textModal text-start">

                      <div class="row">
                          <div class="col-8">
                              <h5 class="fw-bold">Valor de troca: </h5>
                          </div>
                          <div class="col-4">
                              <div class="row">
                                  <div class="col-6">
                                      <h5 id="cryptoTroca" class="fw-bold"><span id="selectTrocarSubmit"></span></h5>

                                  </div>
                                  <div class="col-6">
                                      <h5 id="valorTroca" class="fw-bold">: <span id="TrocarValorSubmit"></span></h5>
                                  </div>
                              </div>

                          </div>

                          <div class="col-8">
                              <h5 class="fw-bold">Cotação:</h5>
                          </div>
                          <div class="col-4">
                              <h5 id="cotacaoModal" class="fw-bold"></h5>
                          </div>


                          <div class="col-8">
                              <h5 class="fw-bold">Para:</h5>
                          </div>
                          <div class="col-4">
                              <div class="row">
                                  <div class="col-6">
                                      <h5 id="cryptoRecebe" class="fw-bold"><span id="selectReceberSubmit"></span></h5>

                                  </div>
                                  <div class="col-6">
                                      <h5 id="valorReceber" class="fw-bold">
                                         :  <span id="ReceberValorSubmit"></span>
                                    </h5>
                                  </div>
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
                              class="btn btnColor WB">Confirmar</button>
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
        
        var TrocarValorSubmit = document.getElementById('TrocaValor').value;
        var ReceberValorSubmit = document.getElementById('ValorRes').value;
        var selectTrocarSubmit = document.getElementById('selectTrocar').value;
        var selectReceberSubmit = document.getElementById('selectReceber').value;

        if(TrocarValorSubmit!="" && ReceberValorSubmit!=""
        && selectTrocarSubmit!="" && selectReceberSubmit!=""){
            document.getElementById('modalTrade').style.display = 'block';
            document.getElementById('TrocarValorSubmit').innerHTML = TrocarValorSubmit;
            document.getElementById('ReceberValorSubmit').innerHTML = ReceberValorSubmit;
            document.getElementById('selectTrocarSubmit').innerHTML = selectTrocarSubmit;
            document.getElementById('selectReceberSubmit').innerHTML = selectReceberSubmit;

           
        }
        else{
            //CONFERIR
            alert("Preencha todos os campos");
        }


       
    }

    function closeModal() {
        document.getElementById('modalTrade').style.display = 'none';
    }

</script>