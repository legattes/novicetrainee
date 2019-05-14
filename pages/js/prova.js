$(document).on('click', '.new-question', function () {
    xhr = new XMLHttpRequest();

    xhr.open('GET', '/prova/pergunta', true);

    perguntas = $('form .perguntas .pergunta').length + 1;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            html = xhr.responseText;  

            $('form .perguntas')
            .append(html.replace("pergunta[]", "pergunta[" + perguntas + "]")
            .replace("id=''", "id='" + perguntas + "'"));
        }
    }

    xhr.send();
});

$(document).on('click', '.new-answer', function () {
    pergunta = $(this).attr('id');        
    div = $(this); 
    respostas = div.parent().children('.respostas').children('.resposta').length + 1;
    
    xhr = new XMLHttpRequest();    
    xhr.open('GET', '/prova/resposta', true);


    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            html = xhr.responseText;       
            (div.parent().children('.respostas'))
            .append(html.replace("resposta[][]", "resposta["+pergunta+"]["+respostas+"]")
            .replace("'correta[]' value=''", "'correta["+pergunta+"]' value='"+respostas+"'"));
        }
    }

    xhr.send();

});