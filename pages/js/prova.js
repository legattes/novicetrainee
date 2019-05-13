$(document).on('click','.new-question', function(){
    $('form .perguntas')
    .append("<div class='pergunta'><span>Enunciado</span><div class='btn btn-primary new-answer'><span>Nova Pergunta</span></div><textarea style='display: block' name='pergunta[1]'></textarea><div class='respostas'></div></div>");
});

$(document).on('click','.new-answer', function(){
    $('form .respostas')
    .append("<span>Resposta 1</span><input type='text' name='resposta[1][1]'><input type='radio' name='correta[1]' value='1'><span>Correta</span>");
});