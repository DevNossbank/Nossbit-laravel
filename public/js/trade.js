

$(document).ready(function () {
    $('#ExchangeValue').on('input', function () {
       tradePrice();
    });
});

$(document).ready(function () {
    $('#selectExchangeCoin').on('change', function () {
       tradePrice();
    });
});

$(document).ready(function () {
    $('#selectReceipt').on('change', function () {
       tradePrice();
    });
});

function tradePrice(){
    var valor = $('#ExchangeValue').val()

    var cryptoExchange = $('#selectExchangeCoin').val();

    var cryptoReceipt = $('#selectReceipt').val();

    if (valor != "" && cryptoExchange!= "" && cryptoReceipt!="") {
        $.ajax({
            type: 'POST',
            url: '/tradeAPI',
            data: {
                valor: valor,
                cryptoExchange: cryptoExchange,
                cryptoReceipt: cryptoReceipt,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               $('#cotacao').text("Cotação: "+response[1]);
               $('#ReceiptValue').val(response[0]);
            },
            error: function (error) {
                console.error(error);
                alert('Tente novamente mais tarde');
            }
        });
    }else{
    }

}