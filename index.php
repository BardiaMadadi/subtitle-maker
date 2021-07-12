<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CC maker</title>
    <link rel="stylesheet" href="./CSS/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="continer">
<form  action="" method="post" enctype="multipart/form-data">
<br>
        <p>Name</p> <input name="name" type="text">
        <br>     
        <?php if($_GET['id'] > 0){ ?>
        <p>Subtitle</p> <textarea name="cc" id="" cols="30" rows="10"></textarea>
        <br>
        <p>sec</p> <input name="sec" type="number">
        <br>
        <p>min</p> <input name="min" type="number">
        <br>
        <p>hour</p> <input name="hour" type="number">
        <p>Duration</p>
        <br>
        <p>sec</p> <input name="du" type="number">
        <?php } ?>
        <button class="sub" name="sub" type="submit">SUBMIT</button>
    </form>
</div>


    <?php


    if (isset($_POST['sub'])) {
        
        
        $id = $_GET['id'];
        $name = $_POST['name'];
        $sub = $_POST['cc'];
        $sec = $_POST['sec'];
        $min = $_POST['min'];
        $hour = $_POST['hour'];
        $du = $_POST['du'];

        
        
        if ($_GET['id'] == 0) {
            $myfile = fopen("sub/{$name}.srt", "w") or die("Unable to open file!");
            fclose($myfile);
            header("Location: http://localhost/CC/index.php?id=" . intval($id) + 1 . "");
        } else {
            $file = fopen("sub/{$name}.srt", "a") or die("Unable to open file!");
            $txt = "{$id} \n {$hour}:{$min}:{$sec},000 --> 00:00:".$sec + $du.",000 \n {$sub} \n ";
            fwrite($file, "\n" . $txt);
            fclose($file);
            header("Location: http://localhost/CC/index.php?id=" . $id + 1 . "");
        }
    }




    ?>
</body>

</html>