<!DOCTYPE html>
<html lang="ru">
<?php
$r = 500;
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
            width: 500px;
            box-sizing: content-box;
        }
        th, td {
            padding: 0;
            height: 1px;
            width: 1px;
        }
        .td__color_black {
            background-color: black;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
        <?php for ($x = 0; $x < $r; $x++): ?>
            <tr>
            <?php for ($y = 0; $y < $r; $y++):
                if ($arM[$x][$y]): ?>
                    <td class="td__color_black"></td>
                <?php else: ?>
                    <td></td>
                <?php endif;
            endfor; ?>
            </tr>
        <?php endfor; ?>
        </tbody>        
    </table>
</body>

</html>