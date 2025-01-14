$(document).ready(function() {
    // Quando o botão de sorteio for clicado
    $('#sorteioButton').on('click', function() {
        // Envia a requisição AJAX para o PHP
        $.ajax({
            url: 'sorteio.php',  // Caminho do arquivo PHP
            method: 'GET', // Método da requisição
            success: function(data) {
                // Tenta converter os dados recebidos em JSON
                try {
                    const resultado = JSON.parse(data);  // Converte a resposta JSON
                    if (resultado.success) {
                        // Atualiza a interface com os dados do vencedor
                        $('#vencedor').fadeIn();
                        $('#vencedorNome').text('Nome: ' + resultado.nome);
                        $('#vencedorNumero').text('Número: ' + resultado.numero);
                        $('#vencedorSituacao').text('Situação: ' + resultado.situacao);
                    } else {
                        // Caso não haja vencedor
                        $('#vencedor').fadeIn();
                        $('#vencedorNome').text('Nenhum vencedor encontrado.');
                        $('#vencedorNumero').text('');
                        $('#vencedorSituacao').text('');
                    }
                } catch (e) {
                    console.log(data);
                    console.error('Erro ao processar a resposta:', e);
                    alert('Ocorreu um erro ao tentar processar o sorteio.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Erro ao processar sorteio: ", error);
                alert("Ocorreu um erro na requisição.");
            }
        });
    });
});
