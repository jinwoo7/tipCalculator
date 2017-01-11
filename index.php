<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Jinwoo Yom - Tip Calculater thingy for a codepath class">
        <link rel="stylesheet" type="text/css" href="tipStyle.css">
        
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
                        $sel = $_POST['tip'] * 100;
                    }
                    else {
                        $sel = '10';
                    }
                    for($val = 10; $val < 25; $val += 5) {
                        if ($val == $sel)
                           echo '<input type="radio" name="tip" value="' . ($val / 100) . '" checked="checked">' . $val . '%'; 
                        else
                            echo '<input type="radio" name="tip" value="' . ($val / 100) . '">' . $val . '%';
                    }
                ?>
                <input class="submit" type="submit" name="submit">
            </form>
            <!-- What happens after submit button -->
            <?php
                if(isset($_POST['submit']) && (is_numeric($_POST['price']) && $_POST['price'] > 0)) {
                    $subTotal = $_POST['price'];
                    $tipTotal = $subTotal * $_POST['tip'];
                    $result = $subTotal + $tipTotal;
                    echo '<textarea readonly class="box">Tip: $' . number_format($tipTotal, 2) . '&#13;&#10;&#13;&#10;Total: $' . number_format($result, 2) . '</textarea>';
                }
            ?>
            <p class="signature">JinwooYom</p>
        </div>
    </body>
    
    
</html>