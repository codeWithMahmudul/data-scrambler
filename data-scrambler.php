<?php
include_once "scramblef.php";
$task = "encode";
if(isset($_GET['task']) && !empty($_GET['task'])){
    $task = $_GET['task'];
}
$key = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
if(empty($_POST['key'])){

$key_shuffle_original = str_split($key);
shuffle($key_shuffle_original);
$key_main_original = join("",$key_shuffle_original);
}
if('key' == $task){
    $key_original = str_split($key_main_original);
    shuffle($key_original);
    $key = join("",$key_original);
}else if(isset($_POST['key']) && ($_POST['key']) != ""){
    $key_main_original = $_POST['key'];
}
$scrambleData = "";
if('encode' == $task){
    $data = $_POST['data'] ?? "";
    if($data != ""){
       $scrambleData = scrambleData($data,$key_main_original);
    }
}
if('decode' == $task){
    $data = $_POST['data'] ?? "";
    if($data != ""){
       $scrambleData = decodeData($data,$key_main_original);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <title>Data Scrambler</title>
    <style>
body{
    margin-top: 40px;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
            <h2>Data Scrambler</h2>
            <p>Use this application to scramble your data...</p>
            <p>
            <a href="/data-scrambler.php?task=encode">Encode</a> |
            <a href="/data-scrambler.php?task=decode" target="_blank">Decode</a> |
            <a href="/data-scrambler.php?task=key" >Genarate</a>
            </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
            <form action="data-scrambler.php<?php if("decode" == $task) {echo "?task=decode";}?>" method="POST">
            <label for="key">Key</label>
            <input type="text" name="key" id="key" style="width: 100%; height: 40px;" <?php display($key_main_original) ?> > 
            <label for="data">Data</label>
            <textarea name="data" id="data" style="min-height: 14.5rem;"><?php if(isset($_POST['data'])) {
                echo $_POST['data'];
            }?></textarea>
            <label for="result">Result</label>
            <textarea name="result" id="result" style="min-height: 14.5rem;"><?php echo $scrambleData; ?></textarea>
            <button type="submit">Do It For Me!</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>