<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Sistema de Busca com jQuery ( Recriando )</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			//PESQUISA DE FORMULÀRIO POR SUBMIT
			$("#form-pesquisa").submit(function(e) {
				//Cancela a ação padrao o formulário, impedindo que ele atualize a página
				e.preventDefault();

				//Recupera o que foi selecionado
				var campo = $("#campo").val();

				//Recupera oque está sendo digitado no input de pesquisa
				var pesquisa = $("#pesquisa").val();

				//recupera a primeira data informada
				var dtInicio = $("#dtInicio").val();
				//recupera a segunda data informada
				var dtFim = $("#dtFim").val();

				//Caso queira acrescentar outros campos no filtro, deve-se adicionar no form as inputs e criar as variáveis aqui
				//var outrocampo = $("#iddoelemento").val();


				//Se não for digitado nada, então ele mostra um alert
				//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
				var dados = {
					campo: campo,
					palavra: pesquisa,
					dtInicio: dtInicio,
					dtFim: dtFim
				}

				//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
				//O paremetro 'retorna' é responsável por recuperar o que vem do arquivo 'busca.php' e exibir os resultados na tela
				$.post('busca.php', dados, function(retorna) {
					$(".resultados").html(retorna);
				});

			});



			//PESQUISA INSTANTANEA PELO SELECT
			/*
			$("#campo").change(function(){
				//Recupera oque está sendo digitado no input de pesquisa
				var pesquisa = $("#pesquisa").val();

				//Recupera oque foi selecionado
				var campo 		= $(this).val();

				//Verifica se foi digitado algo
				if(pesquisa != ''){
					//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
					var dados = {
						palavra : pesquisa,
						campo 	: campo
					}
					
					//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
					//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
					$.post('busca.php', dados, function(retorna){
						//Mostra dentro da ul com a class 'resultados' oque foi retornado
						$(".resultados").html(retorna);
					});
				}else{
					$(".resultados").html('');
				}
			});
			*/



		});
	</script>
</head>

<body style="padding: 20px;">
	<h2>Informe os dados para a pesquisa</h2>
	<form id="form-pesquisa" action="" method="post">
		Pesquisar por:
		<select id="campo">
			<!-- Os valores das opções devem ser os mesmos nomes dos campos dos quias se quer a pesquisa -->
			<option selected value="titulo">Titulo</option>
			<option value="categoria">Categoria</option>
		</select>
		<label for="pesquisa">Nome da Série:</label>
		<input type="text" name="pesquisa" id="pesquisa"> &nbsp;
		De <input type="date" name="dtInicio" id="dtInicio" required>
		&nbsp; até &nbsp; <input type="date" name="dtFim" id="dtFim" required>
		<input type="submit" name="enviar" value="Pesquisar">
	</form>
	<br>
	<div class="resultados">
		<!--Os dados da busca efetuada pelo aquivo busca.php, serão exibidos aqui-->
	</div>
</body>
</html>