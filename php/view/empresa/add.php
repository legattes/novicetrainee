<?php


?>
<!DOCTYPE html>
<html language="pt-br">

<head>
	<title>Novice Trainee</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<meta name="keywords" content="Estágio, emprego, currículo, currículum, sites">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="/css/styles.css">
	<link rel='stylesheet' href='/css/bootstrap.min.css'>
</head>

<body>
	<?php include('../php/view/componentes/menu.php');?>
	<div class='container-fluid'>

	<h1>Cadastro da Empresa</h1>

	<form id="formulario" method="POST" action="../../php/empresa/add.php">
		<div id="informacoesGerais">
			<h2>Informações Gerais</h2>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>CNPJ</label></div><div class='col-md-6 left'><input type="text" name="empresa[cnpj]"> </div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Nome Fantasia</label></div><div class='col-md-6 left'><input type="text" name="empresa[nome_fantasia]"> </div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Razão Social</label></div><div class='col-md-6 left'><input type="text" name="empresa[razao_social]"> </div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Senha de acesso: </label></div><div class='col-md-6 left'><input type="password" name="empresa[senha]"></div></div>
		</div>

		<div id="endereco">
			<h2>Endereço</h2>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Cidade</label></div><div class='col-md-6 left'><input type="text" name="endereco[cidade]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Estado</label></div>
			<div class='col-md-6 left'>
				<select name="endereco[estado]">
					<option value='AC'>AC</option>
					<option value='AL'> AL</option>
					<option value='AP'> AP</option>
					<option value='AM'> AM</option>
					<option value='BA'> BA</option>
					<option value='CE'> CE</option>
					<option value='DF'> DF</option>
					<option value='ES'> ES</option>
					<option value='GO'> GO</option>
					<option value='MA'> MA</option>
					<option value='MT'> MT</option>
					<option value='MS'> MS</option>
					<option value='MG'> MG</option>
					<option value='PA'> PA</option>
					<option value='PB'> PB</option>
					<option value='PE'> PE</option>
					<option value='PI'> PI</option>
					<option value='PR'> PR</option>
					<option value='RJ'> RJ</option>
					<option value='RN'> RN</option>
					<option value='RS'> RS</option>
					<option value='RO'> RO</option>
					<option value='RR'> RR</option>
					<option value='SC'> SC</option>
					<option value='SP'> SP</option>
					<option value='SE'> SE</option>
					<option value='TO'> TO</option>
				</select>
			</div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>CEP</label></div><div class='col-md-6 left'><input type="text" name="endereco[cep]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Bairro</label></div><div class='col-md-6 left'><input type="text" name="endereco[bairro]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Rua</label></div><div class='col-md-6 left'><input type="text" name="endereco[rua]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Número</label></div><div class='col-md-6 left'><input type="text" name="endereco[numero]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Complemento</label></div><div class='col-md-6 left'><input type="text" name="endereco[complemento]"></div></div>
		</div>

		<div id="contato">
			<h2>Contato</h2>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>E-mail</label></div><div class='col-md-6 left'><input type="E-mail" name="contato[email]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Celular</label></div><div class='col-md-6 left'><input type="text" name="contato[celular]"></div></div>
			<div class='row'><div class='col-md-3 col-md-offset-2 left'><label>Telefone</label></div><div class='col-md-6 left'><input type="text" name="contato[telefone]"></div></div>
		</div>

		<div id="buttom">
			<button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
	<footer>
		<h6>Desenvolvido por: Grupo - Faculdade Olavo Bilac</h6>
	</footer>
</body>

</html>