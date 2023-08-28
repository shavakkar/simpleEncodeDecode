<?php

// $array = (range('A','Z'));
if(isset($_POST['encode'])){
    $input = $_POST['name'];
    if($input === ""){
        echo "No Input!";
    }
    else{
        for($i=0;$i<strlen($input);$i++){
            // echo $input[$i].'<br>';
            
            if(ctype_upper($input[$i])){
                    $value = ord($input[$i]);
                    $value = $value-64;
                    if($value < 10){
                        $result = "0".strval($value);
                    }
                    else{
                        $result = strval($value);
                    }
                    // echo $value.' ';
                    $array[] = $result;
                }
            else{
                $value = ord($input[$i]);
                $value = $value-65-5;
                // echo $value.' ';
                $array[] = $value;
            }
        }
        // $encoded = true;
    }
}

if(isset($_POST['decode'])){
    $input1 = strval($_POST['name1']);
    if($input1 === ""){
        echo "N0 Input!";
    }
    else{
        // $input1 = explode(" ", $input1);
        for($i=0;$i<strlen($input1);$i=$i+2){
            $num1 = $input1[$i];
            $num2 = $input1[$i+1];
            $value1 = $num1.$num2;
            $array1[] = $value1;
            // foreach($array1 as $val2){
            //     echo $val2." ";
            // }
        }
        for($i=0;$i<count($array1);$i++){
            // echo $val1.'<br>';
            $num = intval($array1[$i]);
            if($num <= 26){
                $num = $num+64;
                $val1 = chr($num);
                $array2[] = $val1;
            }
            if($num >= 27 && $num <= 56){
                $num = $num+70;
                $val1 = chr($num);
                $array2[] = $val1;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Encode Decode</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="name">Input: </label>
            <input type="text" name="name" id="name" value="<?php echo $input; ?>">
            <button name="encode">Encode</button>
            <br>
            <label for="name1">Input: </label>
            <input type="text" name="name1" id="name1">
            <button name="decode">Decode</button>
            <br>
            <?php
                foreach($array2 as $val){
                    echo $val;
                }
            ?>
        </form>
        <?php 
                foreach($array as $val)
                {
                    echo $val;  
                }
        ?>
    </body>
</html>