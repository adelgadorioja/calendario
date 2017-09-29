<?php
	// obtiene el mes
	$mes=date("n");
	// obtiene el año
	$ano=date("Y");
	// obtiene el dia actual
	$diaActual=date("j");
	// obtiene el día de la semana del primer día del mes (0 domingo, 6 sabado)
	$diaSemana=date("w",mktime(0,0,0,$mes,1,$ano));
	if($diaSemana==0) {
		// convierte el domingo en un 7.
		$diaSemana=7;
	}
	// obtiene el último día del mes
	$ultimoDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$ano)-1));
	// array con los nombres de los meses
	$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
	<title>Calendario 2017</title>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		h1 {
			text-align: center;
			margin-bottom: 1em;
		}
		table {
			margin: 0 auto;
		}
		td {
			text-align: center;
			width: 6em;
			padding: 1em;
		}
		.dia:hover {
			background-color: #70a2f9;
			color: white;
		}
	</style>

</head>

<body>

	<h1>
		<?php
			// printa por pantalla el mes y el año
			echo $meses[$mes]." ".$ano;
		?>
	</h1>

	<table>

		<tr>
			<th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th>
		</tr>

		<tr>
		<?php
			// calcula el número de la ultima celda para no seguir printando números
			$last_cell = $diaSemana+$ultimoDiaMes;

			// bucle hasta 42 (máximo 5 semanas)
			for($i=1; $i<=42; $i++) {

				if($i==$diaSemana) {
					// si i es igual al primer dia de la semana, $day será igual a 1
					$day = 1;
				}

				if($i<$diaSemana || $i>=$last_cell) {
					// si i es menor al primer dia de la semana o superior a la ultima celda se printa una celda vacía
					echo "<td>&nbsp;</td>";
				}

				else {
					// si está dentro del rango, printa el día
					echo "<td class='dia'>$day</day>";
					$day++;
				}

				if($i%7==0) {
					// cuando se termina una semana, se crea otra fila
					echo "</tr><tr>\n";
				}

			}
		?>
		</tr>

	</table>

</body>

</html>