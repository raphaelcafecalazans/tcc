$(function(){
    // Executa o evento click no button
    $('button').click(function(){
        // Seleciona o conteúdo do input
        $('input').select();
        // Copia o conteudo selecionado
        var copiar = document.execCommand('copy');
        // Verifica se foi copia e retona mensagem
        if(copiar){
            alert('Copiado');
        }else {
            alert('Erro ao copiar, seu navegador pode não ter suporte a essa função.');
        }
        // Cancela a execução do formulário
        return false;
    });
});