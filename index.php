<!DOCTYPE html>
<html>

<head>
    <title>Ajuda IR</title>
    <link rel="stylesheet" href="style.css">
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<body>

    <h2>Gera Discriminação Ações/FIIs</h2>

    <form method="post">
        <label for="dataCompra">Data da compra:</label>
        <input type="text" id="dataCompra" name="dataCompra" placeholder="dia/mês" required>
        <label for="codigoNegociacao">Código de negociação:</label>
        <input type="text" id="codigoNegociacao" name="codigoNegociacao" required>
        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" required>
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" placeholder="__.___.___/____-__" required>
        <label for="quantidadeCotas">Quantidade de cotas:</label>
        <input type="number" id="quantidadeCotas" name="quantidadeCotas" required>
        <label for="valorCota">Valor por cota:</label>
        <input type="text" name="valorCota" placeholder="0,00" id="valorCota" required>
        <input type="submit" value="Gerar">
    </form>

    <div id="copiaMensagem"></div>

    <div style="display: flex; justify-content: space-around;">
        <?php

        if (!$_POST['dataCompra']) {
            return;
        }

        $dataCompra         = $_POST['dataCompra'] . "/" . (date('Y') - 1);
        $codigoNegociacao   = $_POST['codigoNegociacao'];
        $empresa            = $_POST['empresa'];
        $cnpj               = $_POST['cnpj'];
        $quantidadeCotas    = $_POST['quantidadeCotas'];
        $valorCota          = str_replace(",", ".", $_POST['valorCota']);
        $valorTotal         = str_replace(".", ",", round(floatval($valorCota) * $quantidadeCotas, 2));

        $valorCotaImpressao  = str_replace(".", ",", $valorCota);
        $valorTotalImpressao = str_replace(".", ",", $valorTotal);

        $mensagem = "$empresa - código de negociação $codigoNegociacao, CNPJ $cnpj \n\nEm $dataCompra, comprei $quantidadeCotas cota(s) a R$$valorCotaImpressao cada, totalizando R$$valorTotalImpressao";

        echo "<div class='mensagem'><textarea id='resultado' rows='7'>" . htmlspecialchars($mensagem) . "</textarea></div>"; ?> <br><br>

        <button id="copy-button" style='height: 50px' onclick="copiaMensagem()">Copiar</button>

    </div>

    <script src="funcoes.js"></script>

</body>

</html>