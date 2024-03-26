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
                        <h3 class="modal-title fw-bold" id="coinModalLabel"></h3>
                        <h5 id="coinToken"></h5>
                        <p id="coinNet"></p>
                    </div>
                    <hr class="mt-5">
                    <h5 class="mt-5">Saldo:<h5> 
                    <h1>   <span id="coinBalance" class=""></span></h1>
                    <br>
                    

                </div>
                <div class="col-md-6 qrcode">
                    <h5 class=" text-center">Endereço:</h5>
                    <div style="margin-left: 20px;">
                        <div id="qrCodeContainer" class="mb-5" style="display: flex; justify-content: center; align-items: center;">
                        </div>
                        <p>Código copia e cola:</p>
                        <input id="addressWallet" class="form-control addressWallet" type="text" value="" readonly/>
                    </div>
                </div>

                
              </div>
              
          </div>
         
      </div>
  </div>
</div>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script>
    var coinToken;

    document.querySelectorAll('.saldoEmMoedas').forEach(box => {
        box.addEventListener('click', function() {
            var coinName = this.querySelector('h4').textContent;
            var coinBalance = this.querySelector('h3').textContent;
            coinToken = this.querySelector('h5').textContent;
            var coinNetwork = this.querySelector('p').textContent;

            var coinImageSrc = this.querySelector('img').getAttribute('src');

            console.log(coinToken)

            try{
                $.ajax({
                    type: 'POST',
                    url: '/Wallet',
                    data: {
                        coinToken: coinToken,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        
                        document.getElementById('coinModalLabel').textContent = coinName;
                        document.getElementById('coinBalance').textContent = coinBalance;
                        document.getElementById('coinImage').setAttribute('src', coinImageSrc);
                        document.getElementById('coinNet').textContent = coinNetwork;
                        document.getElementById('coinToken').textContent = coinToken;
                        document.getElementById('addressWallet').value = response;

                        var qrcode = new QRCode(document.getElementById("qrCodeContainer"), {
                        text: response,
                        width: 200,
                        height: 200
                    });
                        

                        document.getElementById('coinModal').style.display = 'block';

                        
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


           /* */
        });
    });


    function closeModal() {
        document.getElementById('coinModal').style.display = 'none';
        location.reload();

    }

</script>