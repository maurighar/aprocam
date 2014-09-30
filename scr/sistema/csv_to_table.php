<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Tabla</title>
		<meta charset="UTF-8" />


	<style>
		table {
			border-collapse: collapse;
			font-family: Futura, Arial, sans-serif;
			border: 1px solid #777;
		}

		caption {
			font-size: larger;
			margin: 1em auto;
		}

		th, td {
			padding: .35em;
		}

		th, thead {
			background: #000;
			color: #fff;
			border: 1px solid #000;
		}

		tr:nth-child(odd) {
			background: #ccc;
		}

		tr:hover {
			background: #aaa;
		}

		td {
			border-right: 1px solid #777;
		}

	</style>



	</head>
	<body>

<?php

$row = 1;
if (($handle = fopen("importar.csv", "r")) !== FALSE) {

    echo '<table border="1">';

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }

        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th>'.$value.'</th>';
            }else{
                echo '<td>'.$value.'</td>';
            }
        }

        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
    }

    echo '</tbody></table>';
    fclose($handle);
}
?>
</body>
</html>