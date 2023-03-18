$(document).ready(function() {
    $('#dataCompra').mask('99/99');
});

$(document).ready(function() {
    $('#valorCota').maskMoney({
        thousands: '',
        decimal: ',',
        allowZero: true,
        allowNegative: false,
        precision: 2
    });
});

$(document).ready(function() {
    $('#cnpj').mask('00.000.000/0000-00', {
        reverse: true
    });
});

function copiaMensagem() {
    // Seleciona a saída gerada
    var mensagem = document.getElementById("resultado").textContent;

    // Cria um elemento de área de transferência temporária
    var tempInput = document.createElement("textarea");
    tempInput.value = mensagem;
    document.body.appendChild(tempInput);

    // Seleciona e copia o texto na área de transferência temporária
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    // Exibe uma mensagem de sucesso
    var messageDiv = document.getElementById("copiaMensagem");
    messageDiv.innerHTML = "Texto copiado para a área de transferência!";
    messageDiv.classList.add("show");
    setTimeout(function() {
        messageDiv.classList.remove("show");
    }, 2000); // 2 segundos
}