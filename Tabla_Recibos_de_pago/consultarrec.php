<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Este software se hizo para el resultado de aprendizaje CRUD 
Elaboro:  Víctor J. Rodríguez P.
Para que entiendan como se actualiza, borra, inserta, en una base de datos en Xampp 
Se deben tener concentos claros ya de Php, mysql, html, css, java script -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consulta de recibos de pago</title>
</head>
<body>
<h1 ALIGN=CENTER>CONSULTA DE RECIBOS DE PAGO</h1>
<center>
<table width="900" border="1">
	<tr>
		<td>ID</td>
		<td>VALOR TOTAL</td>
		<td>SUBTOTAL</td>
		<td>FECHA DE EMISION</td>
		<td>CANTIDAD DEL PRODUCTO</td>
		<td>DESCUENTO</td>
		<td>FORMA DE PAGO</td>
	</tr>

	<?php
		include(".\conexion.php");
		$codigo=$_POST["txtrecid"];
		$query="SELECT RECIBO_PAGO.id_recibo,rec_valor_total_recibo,rec_subtotal,rec_fecha_emision,rec_cantidad_producto,rec_descuento,rec_forma_pago
				FROM RECIBO_PAGO
				where RECIBO_PAGO.id_recibo=$codigo
				order by 1";

		// $result=mysql_query($query,$link) or die("error en la consulta de productos"); en versiones anteriores
		$result=mysqli_query($link,$query) or die("error en la consulta de recibos");
		// if(mysql_num_rows($result)>0)
		if(mysqli_num_rows($result)>0)	
		{
			// while($row=mysql_fetch_array($result))
			while($row=mysqli_fetch_array($result))	
			{
			echo "<tr>";
			echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
				  <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td>";
			echo "</tr>";
			}
		}
		else
		{
			echo"La consulta no encontro registros asociados";
		}

		echo " <script>
			function redireccionar()
			{
				var pagina='../indexREC.html';
				location.href=pagina
			}
			setTimeout ('redireccionar()', 10000);
		       </script>
		";
	?>
</table>
</body>
</html>