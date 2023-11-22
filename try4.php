<?php
$r = 100;
$squareSize = 1;
$squareCount = intdiv($r, $squareSize);
$inscribedSquareSize = round((($squareCount * 4 * (2 ** 0.5)) / 8), 0, PHP_ROUND_HALF_DOWN);
$arM = array_fill(0, $squareCount, array_fill(0, $squareCount, 0));

$absPos = 0;
$i = 0;
$j = 0;

for ($i1 = 0; $i1 < 3; $i1++) {
    for ($j1 = 0; $j1 < 6; $j1++) {
        $arM[$i1][$j1 + $absPos] = 1;
        $arM[$squareCount - $j1 - $absPos - 1][$squareCount - $i1 - 1] = 1;
    }   
    $absPos += 6;
}
    
$i += 3;
$j += 3 * 6;
$absPos = 0;

for ($i1 = 0; $i1 < 6; $i1++) {
    for ($j1 = 0; $j1 < 3; $j1++) {
        $arM[$i + $i1][$j + $j1 + $absPos] = 1;
        $arM[$squareCount - ($j + $j1 + $absPos) - 1][$squareCount - ($i + $i1) - 1] = 1;
    }   
    $absPos += 3;
}

$i += 6;
$j += 6 * 3;
$absPos = 0;

while ($i < ($r - $inscribedSquareSize - 5)) {
    for ($j1 = 0; $j1 < 2; $j1++) {
        $arM[$i][$j + $j1 + $absPos] = 1;
        $arM[$squareCount - ($j + $j1 + $absPos) - 1][$squareCount - $i - 1] = 1;
    }
    $absPos += 2;
    $i += 1;
}

while ($i < ($r - $inscribedSquareSize)) {
    for ($j1 = 0; $j1 < 1; $j1++) {
        $arM[$i][$j + $j1 + $absPos] = 1;
        $arM[$squareCount - ($j + $j1 + $absPos) - 1][$squareCount - $i - 1] = 1;
    }
    $absPos += 1;
    $i += 1;
}

?>
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
        /* div {
            position: absolute;
            top: 20px;
            width: 200px;
            height: 200px;
            border: 1px solid red;
            border-radius: 50%;
            left: -100px
        } */
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