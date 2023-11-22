<?php
$r = 100;
$squareSize = 1;
$squareCount = intdiv($r, $squareSize);
$inscribedSquareSize = round((($squareCount * 4 * (2 ** 0.5)) / 8), 0, PHP_ROUND_HALF_DOWN);
$arM = array_fill(0, $squareCount, array_fill(0, $squareCount, 0));
$absPos = 0;
$countForIt = $squareCount - $inscribedSquareSize;
$lenLongLine = round(($squareCount / 3), 0, PHP_ROUND_HALF_DOWN);
$lenShortLine = round(($squareCount / 5), 0, PHP_ROUND_HALF_DOWN);
$lenDotLine = round(($squareCount / 10), 0, PHP_ROUND_HALF_DOWN);
for ($i = 0; $i < $countForIt; $i += 1) {
    if ($i == 0) {
        for ($j = 0; $j < $lenLongLine; $j += 1) {
            $arM[$i][$j] = 1;
            $arM[$squareCount - $j - 1][$squareCount - $i - 1] = 1;
        }
        $absPos += $lenLongLine;
        // for ($k = 0; $k < $lenDotLine; $k += 1) {
        //     $arM[$k + $i][$k + $absPos] = 1;
        //     $arM[$squareCount - ($k + $absPos) - 1][$squareCount - ($k + $i) - 1] = 1;
        // }
        // $absPos += $lenDotLine;
    } else if ($i < $lenDotLine + $lenShortLine) {
        for ($j = 0; $j < 2; $j += 1) {
            if (($j + $absPos - 7) > $inscribedSquareSize) {
                break;
            }
            $arM[$i][$j + $absPos] = 1;
            $arM[$squareCount - ($j + $absPos) - 1][$squareCount - $i - 1] = 1;
        }
        $absPos += 2;
    } else {
        for ($j = 0; $j < $lenShortLine; $j += 1) {
            if (($j + $absPos - 7) > $inscribedSquareSize) {
                break;
            }
            $arM[$i][$j + $absPos] = 1;
            $arM[$squareCount - ($j + $absPos) - 1][$squareCount - $i - 1] = 1;
        }
        $absPos += $lenShortLine;
        for ($k = 0; $k < $lenDotLine; $k += 1) {
            if (($k + $absPos - 1) > $inscribedSquareSize) {
                break;
            }
            $arM[$k + $i][$k + $absPos] = 1;
            $arM[$squareCount - ($k + $absPos) - 1][$squareCount - ($k + $i) - 1] = 1;
        }
        $absPos += $lenDotLine;
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
        body {
            position: relative;
        }
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
        div {
            position: absolute;
            top: 20px;
            width: 200px;
            height: 200px;
            border: 1px solid red;
            border-radius: 50%;
            left: -100px
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
    <div></div>
</body>
</html>