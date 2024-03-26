

$(document).ready(function () {
    $('#ExchangeValue').on('input', function () {
       tradePrice();
    });
});

$(document).ready(function () {
    $('#selectExchangeCoin').on('focusout', function () {
       tradePrice();
    });
});

$(document).ready(function () {
    $('#selectReceipt').on('focusout', function () {
       tradePrice();
    });
});

function tradePrice(){
    var valor = $('#ExchangeValue').val()

    var cryptoExchange = $('#selectExchangeCoin').val();

    var cryptoReceipt = $('#selectReceipt').val();

    if (valor && cryptoReceipt && cryptoExchange && cryptoExchange != "Select" && cryptoReceipt != "Select") {
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
               $('#priceValue').text(response[1]);
               $('#ReceiptValue').val(response[0]);
            },
            error: function (error) {
                alert('Tente novamente mais tarde');
                location.reload();
            }
        });
    }else{
    }

}
