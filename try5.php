<!DOCTYPE html>
<html lang="ru">
<?php
$r = 200;
// $arM = array_fill(0, $squareCount, array_fill(0, $squareCount, 0));

for ($x = 0; $x < $r; $x++) {
    $y = round((($r ** 2 - $x **2) ** 0.5), 0, PHP_ROUND_HALF_DOWN);
    $arM[$r - $y][$x] = 1;
}
?>
<head>
    <meta charset="UTF-8" />
    <title>Круг</title>
    <style>
        body {
            position: relative;
        }
        table {
            border: 1px solid black;
            border-spacing: 0px;
            border-collapse: collapse;
            /* width: 200px; */
            width: 2000px;
            box-sizing: content-box;
        }
        thead {
            /* width: 200px; */
            /* width: 2000px; */
        }
        tbody {
            /* height: 200px; */
            /* width: 200px; */
            /* width: 2000px; */
        }
        th, td {
            
            padding: 0;
            height: 10px;
            width: 10px;
        }
        .td__color_black {
            /* border: 1px solid black; */
            background-color: black;
        }
    </style>
</head>

<body>
    <table>
        <!-- <thead>
            <tr>
                <th colspan="2000">1/4 circle</th>
            </tr>
        </thead> -->
        <tbody>
<?php
for ($x = 0; $x < $r; $x++) {
?>
            <tr>
<?php
for ($y = 0; $y < $r; $y++) {
    if ($arM[$x][$y]) {
?>

                <td class="td__color_black"></td>
<?php 
} else {
?>
                <td></td>
<?php 
    }
}
?>
            </tr>
<?php
}
?>
        </tbody>        
    </table>
</body>

</html>