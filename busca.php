
<?php
//inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

//Recupera o que foi selecionado
$campo 		= $conn->real_escape_string($_POST['campo']);
//Recupera a pesquisa feita
$pesquisa 	= $conn->real_escape_string($_POST['palavra']);
//Recupera a data de início
$dtInicio 	= $_POST['dtInicio'];
//Recupera a data de fim
$dtFim 	= $_POST['dtFim'];

//Cria a SQL para fazer a consulta no banco, e onde se poe o nome do campo, trocamos pela váriavel '$campo'
//Também pesquisa pelo período de data

$sql = "SELECT * 
	FROM series 
	WHERE $campo LIKE '%$pesquisa%' and dtLancamento BETWEEN '$dtInicio' AND '$dtFim' 
	order by dtLancamento";
//echo $sql; //exibe o comando sql para testes de desenvolvimento

$query		= $conn->query($sql); //Excuta a SQL

//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
if ($query->num_rows <= 0) {
	echo 'Nenhum registro encontrado! Verifique seus filtros.';
} else {
	//Como é retornado um array, então precisamos colocar novamente a váriavel '$campo' onde colocamos a nome do campo a ser exibido
?>

	<table class="table table-striped">
		<tr>
			<th>Título</th>
			<th>Categoria</th>
			<th>Data</th>
		</tr>

		<?php
		while ($res = $query->fetch_assoc()) {
		?>
			<tr>
				<td> <?php echo $res['titulo'] ?></td>
				<td> <?php echo $res['categoria'] ?></td>
				<td> <?php echo date('d/m/Y', strtotime($res['dtLancamento'])) ?> </td>
			</tr>

	<?php
		}
		echo "</table>";
	}


	?>