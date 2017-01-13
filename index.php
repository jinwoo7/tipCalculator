<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Jinwoo Yom - Tip Calculater thingy for a codepath class">
        <link rel="stylesheet" type="text/css" href="tipStyle.css?<?php echo time(); ?>">
        
        <title>JWY - Tip Caculator</title>
    </head>
    <body>
        <div class="masterWrap">
            <header>
                <h1>Tip Calculator</h1>
            </header>
            <form method="post" action="">
                <p class="tText">Bill subtotal: $</p>
                <?php
                    if(isset($_POST['submit'])) {
                        $price = $_POST['price'];
                    }
                    else {
                        $price = "";
                    }
                    echo '<input class="tBox" type="text" name="price" value="' . $price . '"  placeholder="0" autocomplete="off">';
                ?>
                <p class="pText">Tip percentage:</p>
                <?php
                    if(isset($_POST['submit'])) {
                        if ($_POST['tip'] == "on") {
                            $sel = -1;
                        }
                        else {
                            $sel = $_POST['tip'] * 100;
                        }
                        $cusVal = $_POST['customTip'];
                    }
                    else {
                        $sel = '10';
                        $cusVal = 0;
                    }
                    for($val = 10; $val < 25; $val += 5) {
                        if ($val == $sel) {
                            echo '<input type="radio" name="tip" value="' . ($val / 100) . '" checked="checked">' . $val . '%'; 
                        }
                        else {
                            echo '<input type="radio" name="tip" value="' . ($val / 100) . '">' . $val . '%';
                        }                        
                    }
                    if ($sel == -1) {
                        echo '</br>Other:<input type="radio" name="tip" val="' . -1 .'" checked="checked"><input class="customTip" type="number" name="customTip" value="' . $cusVal . '" min="0">%';
                    } 
                    else {
                        echo '</br>Other:<input type="radio" name="tip" val="' . -1 .'"><input class="customTip" type="number" name="customTip" value="' . $cusVal . '" min="0">%';
                    }
                ?>
                <div class="splitDiv">
                    <p class="splitText">Split in</p>
                    <?php
                        if(isset($_POST['submit'])) {
                            $splitVal = $_POST['split'];
                        }
                        else {
                            $splitVal = '1';
                        }
                        echo '<input class="split" type="number" value="' . $splitVal . '" name="split" min="1" max="999">';
                    ?>
                    <p class="splitText">way(s)</p>
                </div>
                <input class="submit" type="submit" name="submit">
            </form>
            <!-- What happens after submit button -->
            <?php
                if(isset($_POST['submit']) && (is_numeric($_POST['price']) && $_POST['price'] > 0)) {
                    $subTotal = $_POST['price'];
                    if ($_POST['tip'] == "on") {
                        $tip = $_POST['customTip'] / 100;
                    }
                    else {
                        $tip = $_POST['tip'];
                    }
                    $tipTotal = $subTotal * $tip;
                    $result = $subTotal + $tipTotal;
                    $split = $_POST['split'];
                    echo '<textarea readonly class="box">Tip: $' . number_format($tipTotal, 2) . '&#13;&#10;&#13;&#10;Total: $' . number_format($result, 2) . '</textarea>'; 
                    if($split > 1) {
                       echo '</br><textarea readonly class="box2">Tip per person: $' .  number_format(($tipTotal/$split), 2) . '&#13;&#10;&#13;&#10;Total per person: $' . number_format(($result/$split), 2) . '</textarea>'; 
                    }
                }
            ?>
            <p class="signature">JinwooYom</p>
        </div>
    </body>
    
    
</html>