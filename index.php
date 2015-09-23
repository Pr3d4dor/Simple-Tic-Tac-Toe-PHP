<html>
	<center><h1 class="text-muted">Tic-Tac-Toe Game!</h1></center>
</html>
<?php
	$winner = 'n';
	$box = array('','','','','','','','','');
	
	if (isset($_POST['submitbtn'])){ 
		for ($i=0; $i < 9; $i++){ 
			$box[$i] = $_POST['box'.$i]; 
		}

		if (($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x') || ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') || ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x') || ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') || ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x')){         
			$winner = 'x';         
			printf ("<center><br><span class='help-block alert-danger'> X wins!</span>
<span class='help-block alert-danger'></span> <br></center>");     
		}

		$blank = 0;

		for ($i=0;$i < 9; $i++){ 
			if ($box[$i] == '')
				$blank = 1;
		}
		
		if ($blank == 1 && $winner == 'n'){	
			$i = mt_rand() % 8;
			
			while ($box[$i]!='')
				$i = mt_rand() % 8;

			$box[$i] = 'o';
			if (($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o') || ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') || ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o') || ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') || ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o') || ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o')){
				$winner = 'o';         
				printf ("<center><br><span class='help-block alert-danger'> O wins!</span>
<span class='help-block alert-danger'></span> <br></center>");
			}
		}
		else{
			 if ($winner == 'n'){
				$winner = 't';
				printf("<center><br><span class='help-block alert-danger'> Tied game!</span>
<span class='help-block alert-danger'></span> <br></center>");
			}
		}
	}  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tic-Tac-Toe Game!</title>
	<style type="text/css">
		#teste {
			border: 3px double #CCCCCC;
			width: 100px;
			height: 100px;
			font-size: 50px;
			text-align: center;
		}
		form{
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css"> 
</head>
<body bgcolor="silver">
	<br>
	<form name="tictactoe" method="post" action="index.php">
		<?php  
			for ($i=0; $i<9;$i++) { 
				printf('<input type="text" name="box%s" value="%s" id="teste">',$i,$box[$i]);
				if ($i == 2 || $i == 5 || $i == 8) {
					printf("<br>");
				}	
			}
			if ($winner == 'n'){
				printf("<br>");
				printf('<input type="submit" class="btn btn-primary" name="submitbtn" value="GO">');
			}
			else{
				printf("<br>");
				printf('<input type="button" class="btn btn-primary" name="newgamebtn" value="Play again" onclick="window.location.href=\'index.php\'">');
			}
		?>
	</form>
	<center><h4>Instrucoes: Voce eh o jogador "X" jogando contra o computador "O".<br>Escolha um quadrado disponivel em que queira marcar, digite X e aperte GO.</h4></center>
	<footer class="footer">
        <p class="text-center">Desenvolvido por <a href="https://github.com/Pr3d4dor/">Gianluca Bine</a>
    </footer>
</body>
</html>