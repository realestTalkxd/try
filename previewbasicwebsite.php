<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>

<body>
    
<form action="previewbasicwebsite.php" method="POST">
Name: <input type="text" name="how" >
Name: <input type="text" name="maybe" >
Name: <input type="text" name="corn" >
Name: <input type="text" name="let" >
Name: <input type="text" name="cheese">
Name: <input type="text" name="bacon" >
Name: <input type="text" name="why are you here" >
Name: <input type="text" name="final" >
Name: <input type="text" name="precau" >
Name: <input type="text" name="crash" >

Name: <input type="html" name="html" required>
Name: <input type="password" name="password" required>
<button type="submit" name="submit">UPLOAD</button>
</form>
<br>
<?php 
if(isset($_POST["password"])) {
        //echo $_POST["html"];
        //create html file with answer in it
        $file = "Answer.html";
        $fileNameNew = uniqid('',true).".".$file;
        $zipName = uniqid('',true);
        $write = $_POST["html"];
        $passWrd = $_POST["password"];
        //file_put_contents($fileNameNew,$write);
        //Convert html file to password protected zip
        $zip = new ZipArchive();
        $zip->open($zipName.'.zip', ZIPARCHIVE::CREATE);
        $zip->setPassword($_POST["password"]);
        $zip->addFromString($fileNameNew, $write);
        $zip->addFromString("HowToUnZip.txt", "Click linkvertise link in discord dm for password to zip. Must use be using 7zip or winrar");
        $zip->setEncryptionName($fileNameNew, ZipArchive::EM_AES_256);
        $zip->close();

        //Echo aka recieve back location to zip from post method
        echo "<div>";
        echo 'http://localhost/site/'.$zipName.'.zip';
        echo "</div>";

    }

?>
</body>
</html>