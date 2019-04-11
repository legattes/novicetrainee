
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Criar pagina com abas</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Área da Empresa</h1>
			</div>			
			
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#Home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
				<li role="presentation"><a href="#Home" aria-controls="dados_de_acesso" role="tab" data-toggle="tab">Dados de Acesso</a></li>
				<li role="presentation"><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="Home">
					<div style="padding-top:20px;">
						<form id="formulario" method="POST" action="cadastroEmpresa.php">

			<div id="informacoesGerais">

				<h3>Informações Gerais</h3>
				<p>Nome da Empresa:	<input type="text" name="nome"> </p>
				<p>CNPJ:			<input type="text" name="cnpj">  </p>

			</div>

			<div id="Endereco">

				<h3>Endereço</h3>
				<p>Cidade:		<input type="text" name="cidade"> </p>
				<p>UF:			<input type="text" name="uf">  </p>
				<p>Bairro: 		<input type="text" name="bairro"> </p>
				<p>CEP:		    <input type="text" name="cep"> </p>
				<p>Rua: 		<input type="text" name="rua"> </p>
				<p>Logradouro:  <input type="text" name="logradouro"> </p>
				<p>numero: 		<input type="text" name="numero"> </p>

			</div>

			<div id="Contato">

				<h3>Contato</h3>
				<p>E-mail:				<input type="text" name="email"> </p>
				<p>celular:				<input type="text" name="celular"> </p>
				<p>telefone:			<input type="text" name="telefone">  </p>
				<p>telefone para recado:<input type="text" name="recado"> </p>

			</div>

			<div id="Objetivo">

				<p>Objetivo:</p>
					vagas estágio:	<input type="radio" name="estagio">
					vagas aprendiz:	<input type="radio" name="aprendiz">
					<br><br>

			</div>

			<div class = "buttom">
				<input type = "submit" name="atualizar" value = "Atualizar">
				<input type = "submit" name="excluir" value = "Excluir">
			</div>
		</form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dados_de_acesso">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Usuário</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="usuario" placeholder="Usuário">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="senha" placeholder="Senha">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
				
				</div>
			  </div>

			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>