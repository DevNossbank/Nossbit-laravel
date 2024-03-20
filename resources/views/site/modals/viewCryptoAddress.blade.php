<link rel="stylesheet" type="text/css" href="/css/modalDark.css">

<div class="modal modal-lg" id="coinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeModal()" width="25" height="25" fill="#fff" class="bi bi-x-lg mt-3 text-end" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                  </svg>
            </div>

            <div class="modal-body row mb-5">

                <div class="col-md-6 row">
                    <div class="col-md-4">
                        <img id="coinImage" src="" alt="Coin Image" width="90">
                    </div>
                    <div class="col-md-8">
                        <h5 class="modal-title" id="coinModalLabel">Nome da Moeda</h5>
                        <p id="coinNet"></p>
                        <p id="coinToken"></p>
                        Saldo: <span id="coinBalance"></span>
                    </div>
                </div>
                <div class="col-md-6 qrcode">
                    <h5 class=" text-center">Endereço:</h5>
                </div>

                
              </div>
              
          </div>
         
      </div>
  </div>
</div>

<script>
    /*function openModal() {
            document.getElementById('modalCryptoAddress').style.display = 'block';
       
    }*/

    document.querySelectorAll('.saldoEmMoedas').forEach(box => {
        box.addEventListener('click', function() {
            var coinName = this.querySelector('h4').textContent;
            var coinBalance = this.querySelector('h3').textContent;
            var coinToken = this.querySelector('h5').textContent;
            var coinNetwork = this.querySelector('p').textContent;

            var coinImageSrc = this.querySelector('img').getAttribute('src');


            document.getElementById('coinModalLabel').textContent = coinName;
            document.getElementById('coinBalance').textContent = coinBalance;
            document.getElementById('coinImage').setAttribute('src', coinImageSrc);
            document.getElementById('coinNet').textContent = coinNetwork;
            document.getElementById('coinToken').textContent = coinToken;


            document.getElementById('coinModal').style.display = 'block';
        });
    });


    function closeModal() {
        document.getElementById('coinModal').style.display = 'none';

    }

</script>