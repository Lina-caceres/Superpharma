<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Este software se hizo para el resultado de aprendizaje CRUD 
Elaboro:  Víctor J. Rodríguez P.
Para que entiendan como se actualiza, borra, inserta, en una base de datos en Xampp 
Se deben tener concentos claros ya de Php, mysql, html, css, java script -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consulta de Compra</title>
</head>
<body>
<h1 ALIGN=CENTER>CONSULTA COMPRA</h1>
<center>
<table width="900" border="1">
	<tr>
		<td>ID COMPRA</td>
		<td>FECHA EXPEDICION</td>
		<td>FECHA VENCIMIENTO</td>
		<td>CANTIDAD</td>
		<td>REFERENCIA</td>
		<td>UNITARIO</td>
		<td>VALOR TOTAL</td>
	</tr>

	<?php
		include(".\conexion.php");
		$codigo=$_POST["txtidcompra"];
		$query="SELECT compra.id_compra,com_fecha_expedicion,com_fecha_vencimiento,com_cantidad_pro,com_referencia_pro,com_unitario_pro,com_valor_total_pro
				FROM compra
				where compra.id_compra=$codigo
				order by 1";

		// $result=mysql_query($query,$link) or die("error en la consulta de productos"); en versiones anteriores
		$result=mysqli_query($link,$query) or die("error en la consulta de compra");
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
				var pagina='../indexCOM.html';
				location.href=pagina
			}
			setTimeout ('redireccionar()', 10000);
		       </script>
		";
	?>
</table>
</body>
</html>