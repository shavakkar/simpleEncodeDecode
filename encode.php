<?php 

    // $alph = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    $alph = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrustuvwxz";
    global $result;
    $encoded = false;

    if(isset($_POST['encode'])){
        $input = $_POST['name'];
        // $length = sizeof($alph);

        if($input !== ""){
            for($i = 0; $i < strlen($input); $i++)
            {
                for($j = 0; $j < strlen($alph); $j++){
                    if($alph[$j] === $input[$i]){
                        $num = $j+1;
                        // $val = (string)$num;
                        // echo $val.'=>'.$input[$i]."<br>";
                        // $result .= $val." ";
                        $result[] = $num; 
                    }
                }
            }
            // var_dump($result);
            // echo $result;
            $encoded = true;
        }
        else{
            $errormsg = "No Inputs";
        }
        // echo "<br>";
        // var_dump($alph);
        // echo '<a href="decode.php">Decode</a>';
    }

    // if(isset($_POST['decode'])){
    //    var_dump($result);
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name" value="<?php echo $input; ?>">Input: </label>
        <input type="text" name="name" id="name">

        <?php
            if($errormsg !== ""){
                echo $errormsg;
                $errormsg = "";
            }
        ?>

        <div class="btn">
        <button type="submit" name="encode">Encode</button>
        </div>
        <p>Your Result:</p>
        <?php 
            foreach($result as $values){
                echo $values." ";
            }
            // var_dump($result);
        ?>
        <?php 
            if($encoded === true){
                echo '<button type="submit" name="decode"><a href="decode.php">Decode</a></button>';
            }
        ?>
    </form>
    
    
</body>
</html>