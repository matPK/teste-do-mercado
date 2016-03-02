<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>teste-do-mercado</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	
	<link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			//função do seletor de quantidade
			var select = '';
			for (i=1;i<=30;i++){
				select += '<option val=' + i + '>' + i + '</option>';
			}
			$('#seletor').html(select);
			
			//função das checkboxes auto-exclusivas
			$('.radioButton').click(function() {
				$('.radioButton').prop("checked", false);
				$(this).prop("checked", true);
			});
			
			//hide e show do contentbox
			$("#cev").click(function(){
				$("#divcom").show();
				$("#oper").hide();
			});
			$("#op").click(function(){
				$("#oper").show();
				$("#divcom").hide();
			});
			
			//printar resultados da consulta ao banco de dados
			$("#buscar").click(function(){
				$.ajax({
					url: "php/retrieve.php",
					success: function(r){
					   $('#retorno').html(r);
					}
				});
			});
				
		});//fim do jQuery
		function calculaValor(valor){
			document.getElementById('valbox').value=50*valor;
		}
		
		
	</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
    <div class="container">
		<!--Header-->
		<div class=".visible-xs-block, hidden-xs">
			<div id="header"></div>
		</div>
		
		<!--Menu-->
		<div class="navbar navbar-default" role="navigation">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			
				<span class="navbar-brand"><a href="index.php">Home</a></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#" id="cev">Compra & Venda</a></li>
					<li><a href="#" id="op">Operações</a></li>
					<li><a href="#" onclick="window.alert('Aplicativo de compra e venda da Valemobi')">Sobre</a></li>
					<li><a href="#" onclick="window.alert('E-mail: mat.dardenne@gmail.com e celular: (11)95590-9346')">Contato</a></li>
				</ul>
			</div>
		
		</div>
		
		<!--Corpo-->
		
		<div class="contentbox">
		
			<div id="divcom">
			
				<FORM ACTION="php/submit.php" METHOD="post">
					<table>
						<tr><td>Nome da Mercadoria:</td>	<td><INPUT TYPE="TEXT" NAME="nome_mer"/></td></tr>
						<tr><td>Tipo da Mercadoria:</td>	<td><INPUT TYPE="TEXT" NAME="tipo_mer"/></td></tr>
						<tr><td>Código da Mercadoria:</td>	<td><INPUT TYPE="NUMBER" NAME = "cod_mer"/></td></tr>
						<tr><td>Quantidade:</td>			<td><select TYPE ="number" NAME="qnt" id='seletor' onclick="calculaValor(+document.getElementById('seletor').value)"></select></td></tr>
						<tr><td>Valor: </td>				<td><INPUT type="number" NAME="valor" id='valbox' readonly value ="50"></input></td></tr>
						<tr>
							<td><input type="checkbox" id="compra" class="radioButton" name="compra" value="1" checked="checked">Compra</input></td>
							<td><input type="checkbox" id="venda" class="radioButton" name="venda" value="0">Venda</input></td>
						</tr>
						<tr><td><INPUT TYPE="SUBMIT" NAME="CMD" VALUE="Confirmar"/></td></tr>
					</table>
				</FORM>
				<br>
				<?php  
					if(isset($_GET["message"])){
					$message = $_GET["message"];
					echo $message;
					};
				?>
				
				
			</div>
			<div id = "oper">
				<div id = "retorno">
					<!-- Retorno da consulta vai aqui -->
				</div>
				<FORM ACTION="">
				
					<INPUT TYPE="button" NAME="buscop" ID="buscar" VALUE="Buscar Operações"/>
				
				</FORM>
			</div>
			
		</div>
		
		
		
		<div id="clear"></div>
		
		
		
		<!--Rodapé-->
		
		<div id="rodape">
			Desenvolvido por Matheus Adorni Dardenne, sem direitos reservados.
		</div>
		
	</div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>