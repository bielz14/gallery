<?php
 
class Upload
{

  function upload()
  {//session_start();
   $description_str;


  if ($_SESSION['flash_message3']){

              $message_one = $_SESSION['flash_message3'];

            echo "<div class='message_block' id='message3'>$message_one</div>

                  <script>setTimeout(function(){document.getElementById('message3').style.display = 'none';}, 2500);</script>";

                  unset($_SESSION['flash_message3']);

 

                        }  

 if ($_SESSION['flash_message1']){

                  $message_one = $_SESSION['flash_message1'];

 echo "<div  id='message1'>$message_one</div>

                  <script>setTimeout(function(){document.getElementById('message1').style.display = 'none';}, 2500);</script>";

                  unset($_SESSION['flash_message1']);

              }

              if ($_SESSION['flash_message2']){

              $message_one = $_SESSION['flash_message2'];

            echo "<div class='message_block' id='message2'>$message_one</div>

                  <script>setTimeout(function(){document.getElementById('message2').style.display = 'none';}, 2500);</script>";

                  unset($_SESSION['flash_message2']);

                        }  

 


 

if (isset($_POST["submit"]))//if (isset($_FILES["filename"]["name"])) 
{//$data = array();

//
// Проверяем загружен ли файл
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))

{    

        $file_name = $_FILES["filename"]["name"];

// Если файл загружен успешно, перемещаем его
$description_str = $_POST['description'];
$host = "localhost";//"mysql.hostinger.com.ua";
$db_name = "u380785309_bielz";
$login = "root";//"u380785309_bielz";
$pswrd = "";//"slime14101994";
$connect = mysql_connect("$host", "$login", "$pswrd") or die("Не могу соединиться с MySQL.");//mysqli_connect ("$host", "$login", "$pswrd"); 
mysql_select_db("$db_name", $connect);//mysqli_select_db($connect, "$db_name");

mysql_query("SET NAMES 'utf-8'", $connect);//mysqli_query($connect, "SET NAMES 'utf-8'");

       $strSQL = "SELECT * FROM imagesData";

       mysql_query($strSQL, $connect);//mysqli_query($connect, $strSQL) or die("No connect");

 

   

 

 $result2 = mysql_query("SELECT `name` FROM `imagesData` WHERE `name`= '$file_name' LIMIT 1", $connect) or die ("no");//mysqli_query($connect, "SELECT `name` FROM `imagesData` WHERE `name`= '$file_name' LIMIT 1");

$temp = mysql_fetch_array($result2, MYSQL_NUM);//$result2->fetch_array(MYSQLI_NUM);
echo "<script language = 'javascript'>    
            document.location.href='http://test1.ua/test3.php/upload';</script>";
if($temp[0]){$_SESSION['flash_message2']='Файл существует'; mysql_close($connect); /*mysqli_close($connect);*/ /*header('Location:http://test1.ua/upload.php', true, 303);*/}

if(!$temp[0]){    move_uploaded_file($_FILES["filename"]["tmp_name"], "images/uploads/".$_FILES["filename"]["name"]); 
echo "<script language = 'javascript'>    
            document.location.href='http://test1.ua/test3.php/upload';</script>";
  $_SESSION['flash_message1']='Файл загружен';  

                                                $description_str = $_POST['description'];


$strSQL2 = "INSERT INTO `u380785309_bielz`.`imagesData` (`name`, `width`, `heigth`, `description`, `url`) VALUES ('$file_name', '300', '300', '$description_str', 'http://test1.ua/images/uploads/$file_name')";


mysql_query($strSQL2, $connect) or die ("No connect");//mysqli_query($connect, $strSQL2) or die ("No connect");

mysql_close($connect);/*mysqli_close($connect)*/; /*header('Location: http://test1.ua/upload.php', true, 303);*/}

} else { if($connect)mysql_close($connect); /*mysqli_close($connect);*/               $_SESSION['flash_message2']='Файл не выбран'; echo "<script language = 'javascript'>    
            document.location.href='http://test1.ua/test3.php/upload';</script>"; /*header('Location: http://test1.ua/upload.php', true, 303);*/}        

}/*echo "<style>.block1{ width: 100px; background: red;color: white;padding: 10px;text-align: center;margin-left: 37%; position:absolute; border-radius: 25%; margin-bottom: 25%;}</style>";*/

echo "<br><br><br><div style='display: inline-block; text-align: left; padding-left: 27%; color: #CBA844'>
<form action='' enctype='multipart/form-data' method='post'>
  <input name='filename' type='FILE' style=''/><br><br><br><br>
  <label for='description' style='position: absolute;margin-top: -2%'>Description</label>
  <textarea id='description' cols='31' name='description' rows='3'></textarea>
  <input name='submit' type='submit' value='Загрузка'/></p>
</form></div>
<div style='margin-top: -15%; height: 20%; width: 20%;  margin-left: 67%'><img style='border-radius: 8%' src='http://test1.ua/images/upload_img.gif'></div>";
} 
}

$obj_upload = new Upload();
?>