<?php
$r = 100;
$squareSize = 10;
$squareCount = intdiv($r, $squareSize);
$inscribedSquareSize = round((($squareCount * 4 * (2 ** 0.5)) / 8), 0, PHP_ROUND_HALF_DOWN);
$arM = array_fill(0, $squareCount, array_fill(0, $squareCount, 0));
$absPos = 0;
$countForIt = $squareCount - $inscribedSquareSize;
$lenLongLine = round(($squareCount / 3), 0, PHP_ROUND_HALF_DOWN);
$lenShortLine = round(($squareCount / 5), 0, PHP_ROUND_HALF_DOWN);
for ($i = 0; $i < $countForIt; $i++) {
    if ($i == 0) {
        for ($j = 0; $j < $lenLongLine; $j++) {
            $arM[$i][$j] = 1;
            $arM[$squareCount - $j - 1][$squareCount - $i - 1] = 1;
        }
        $absPos += $lenLongLine;
    } else {
        for ($j = 0; $j < $lenShortLine; $j++) {
            $arM[$i][$j + $absPos] = 1;
            $arM[$squareCount - ($j + $absPos) - 1][$squareCount - $i - 1] = 1;
        }
        $absPos += $lenShortLine;
    }
    if (($absPos + $lenShortLine) >= $squareCount) {
        break;
    }
}?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>Круг</title>
    <style>
        table {
            border: 1px solid black;
            border-spacing: 0px;
            border-collapse: collapse;
            width: 100px;
            box-sizing: content-box;
        }
        thead {
            width: 100px;
        }
        tbody {
            height: 100px;
            width: 100px;
        }
        th, td {
            padding: 0;
            height: 1px;
            width: 1px;
            /* border: 1px solid black; */
        }
        .td__color_black {
            background-color: black;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="100">1/4 circle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arM as $key => $value) {?>
            <tr>
                <?php
                foreach ($arM[$key] as $k => $v) {
                    if ($arM[$key][$k] == 1) {?>
                        <td class="td__color_black"></td>
                    <?php } else {?>
                        <td></td>
                    <?php }
                }?>
            </tr>
            <?php }?>
        </tbody>
        
    </table>
</body>
</html>