
$(document).ready(function () {
    $('#ExchangeValue').on('input', function () {
        tradePrice();
    });
});

$("#selectExchangeCoin").on('change', function () {
    adjustOptions(this.value, selectReceipt);
    tradePrice();
}).select2({
    templateResult: formatState
});

$("#selectReceipt").on('change', function () {
    adjustOptions(this.value, selectExchangeCoin);
    tradePrice();
}).select2({
    templateResult: formatState
});


// Função para ajustar as opções
function adjustOptions(selectedValue, selectElement) {
    var options = selectElement.options;
    for (var i = 0; i < options.length; i++) {
        if (selectedValue === 'BRL' && options[i].value !== 'BRL') {
            options[i].disabled = false;
        } else if (selectedValue !== 'BRL' && options[i].value === 'BRL') {
            options[i].disabled = false;
        } else {
            options[i].disabled = true;
        }
    }
}

function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "img/icon"; //Na pasta em questão adicione as imagens. Cada imagem deverá ter o nome igual ao value correspodente no option
    var $state = $(
        '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '-icon.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
};





function tradePrice() {
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
    } else {
    }

}
