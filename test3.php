<?php
session_start();

$URI_page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

?>

<html>
	<head>
		<meta type="content" charset="utf-8">
		<title>Test</title>
		<script src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">

jQuery(document).ready(function () {

    var view_hight = screen.height; 

    jQuery('td a').click(function () {

 

        var o=jQuery(this).parent();

        var url=o.find('img').attr('src'); 

 

var html2='<div class="modalDialog"></div>'

o.append(html2); 

        var html='<a  class="clone"><img src="'+url+'" /></a>'

        o.append(html);

        o=o.find('.clone');

        var img = new Image();

        img.src = url

        img.onload = function() {

    var height = this.height;

   var width = this.width; 

   if(height>600 && view_hight<950)height=600;

  if(width>1000)width=1000;

o.animate({width: width, height: height});

            };

 

        o.click(function () {

         jQuery(this).remove();

jQuery('.modalDialog').remove();

        });

    });

});

</script>

<script type="text/javascript">
	
	function makeCounter() {
		var i = 4;

		return function() { // (**)
			return i++;
		};
	}

	var counter = makeCounter();

	function img(){
		
		var j = counter()%3;
  	var img = document.getElementById("tv-display");
    var img2 = document.getElementById("mob-display");	

  		switch(j){

            case 0:
            img.src = 'http://test1.ua/images/safe'+1+'.jpg';
			img2.src = 'http://test1.ua/images/landscape'+1+'.jpg';
            break;

            case 1:
            img.src = 'http://test1.ua/images/safe'+2+'.jpg';
			img2.src = 'http://test1.ua/images/landscape'+2+'.jpg';
            break;

            case 2:
            img.src = 'http://test1.ua/images/safe'+3+'.jpg';
			img2.src = 'http://test1.ua/images/landscape'+3+'.jpg';
            break;
  		}
	}
	
	setInterval(img, 3000);

	</script>

	</head>
	<body>
		<div class="main">
			<div class="body">

				<div class="header">

						<div id="tv-logo" style=" max-width: 20%;   margin-left: 5%; position: absolute; margin-top: 7%;"> 
                    		<img src="http://test1.ua/images/tv.png" style="z-index: 5"/>
                    		<img id="tv-display" src="http://test1.ua/images/safe1.jpg" style="z-index: 1; position: absolute; margin-top: -57.35%; margin-left: 9.5%; width: 81%; height: 70%"/>
                		</div>

                        <div class="container" style="display: block">        
                              <div id="logo" class="logo">
                                                                    <a href="/">
                                      <img id="logo_img" src="http://test1.ua/images/safe_image-8.jpg" alt="test">
                                  </a>
                                                              
                              </div>
                     	</div>

                     	<div id="mob-logo" style="width: 12%; margin-left: 80%; margin-top: -27%; position: absolute; "> 
                    		<img src="http://test1.ua/images/mob.png" style="z-index: 5"/>
                    		<img id="mob-display" src="http://test1.ua/images/landscape1.jpg" style="position: absolute; margin-top: -180%; height: 81%; width:88.5%; 
                    		margin-left: 5.5%; z-index: 1"/>
                		</div>
				</div>

				<div class=nav>
					
						
						<ul>
						<li>
						<a href="http://test1.ua/test3.php">
						<span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View
						</span>
						</a>
						</li>
						<li><a href="http://test1.ua/test3.php/upload"><span style="font-style: italic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dowland</span></a></li>
						</ul>

				</div>
						
				<div id="gis_header_label"><h1>GIS</h1></div>

				<div class="wrapper">

					<div class="view_image">
<?php

//$URI_page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if($URI_page=='http://test1.ua/test3.php' || $_GET['page'])
{
$page = $_GET['page'];

if( isset( $_POST[ 'delite' ] ) ) { 


$top = $_POST['delite'];


unlink("images/uploads/$top");

$host = "localhost"; 
$db_name = "u380785309_bielz"; 
$login = "root";//"u380785309_bielz";
$pswrd = "";
$connect = mysql_connect ("$host", "$login", "$pswrd") or die("No connect MySQL.");//mysqli_connect ("$host", "$login", //"$pswrd")

mysql_select_db("$db_name", $connect);//mysqli_select_db($connect, "$db_name");
mysql_query("SET NAMES 'utf-8'", $connect);//mysqli_query($connect, "SET NAMES 'utf-8'");
$strSQL = "SELECT * FROM imagesData";
$rs = mysql_query($strSQL, $connect) or die("No connect");//mysqli_query($connect, $strSQL) or die("No connect");


$sqlL = "DELETE FROM imagesData WHERE name='$top'";




$strSQL3 = "SELECT * FROM imagesData";

$rs = mysql_query($strSQL3, $connect);

/*mysqli_query($connect, $strSQL3);*/

$i = 0; $j = 0; $loop = -1; $next_element = 0;




while($row2 = mysql_fetch_array($rs, MYSQL_NUM)) {//while($row2 = $rs->fetch_array(MYSQLI_NUM)) {


if($next_element == 0)$i++; 

if($row2[1] == $_POST['delite']) { $next_element = 1;}

if($next_element == 1) $loop++;

}



mysql_query($sqlL, $connect); //mysqli_query($connect, $sqlL); 


if($i%3==1 && $page>1 && $loop == 0)

{

$page= $page-1; //header("Location: http://ddddd.esy.es/index.php?page=$page");

}

}

$host = "localhost"; 
$db_name = "u380785309_bielz"; 
$login = "root";
$pswrd = "";
$connect = mysql_connect ("$host", "$login", "$pswrd") or die("No connect MySQL.");//mysqli_connect ("$host", "$login", //"$pswrd") or die("ÃÃ¥ Ã¬Ã®Ã£Ã³ Ã±Ã®Ã¥Ã¤Ã¨Ã­Ã¨Ã²Ã¼Ã±Ã¿ Ã± MySQL.");

mysql_select_db("$db_name", $connect);//mysqli_select_db($connect, "$db_name");
mysql_query("SET NAMES 'utf-8'", $connect);//mysqli_query($connect, "SET NAMES 'utf-8'");
$strSQL = "SELECT * FROM imagesData ORDER BY id_image";
$rs = mysql_query($strSQL, $connect) or die("No connect");//mysqli_query($connect, $strSQL) or die("No connect");

echo "<center>"; 

//echo "<div class='menu3'>";

$count_row_sql = mysql_query("SELECT COUNT(*) FROM imagesData", $connect);//mysqli_query($connect, "SELECT COUNT(*) FROM imagesData");


$count_row = mysql_fetch_array($count_row_sql, MYSQL_NUM);//$count_row_sql->fetch_array(MYSQLI_NUM);//ÃªÃ®Ã«-Ã¢Ã® Ã±Ã²Ã°Ã®Ãª Ã¢ ÃÃ„


if($count_row[0]!=0){

if($page == NULL)
{
for($i = 0;$row = mysql_fetch_array($rs, MYSQL_NUM); $i++)//for($i = 0;$row = $rs->fetch_array(MYSQLI_NUM); $i++) 
{ 
if($i == 3)break;
echo "<div class='image_gallery'><form method='POST'><table><text-decoration><button type='submit' name='delite' value='$row[1]' class='close'><img src='images/images.jpg'/></button></td></tr><tr><td><a><img src='$row[5]' width='300' height='auto'></a></td></tr><tr></table></form></div>"; 

}
}
if(!$page==NULL)
{ 
for($i = 0;$row = mysql_fetch_array($rs, MYSQL_NUM); $i++)//for($i = 0;$row = $rs->fetch_array(MYSQLI_NUM); $i++) 

{ 
if($i == $page*3)break; 
if($i<$page*3-3)continue;
echo "<div class='image_gallery' ><form method='POST'><table><td><button type='submit' name='delite' value='$row[1]' class='close'><img src='images/images.jpg'/></button></td></tr><tr><td><a><img src='$row[5]' width='300' height='auto'></a></td></tr><tr></table></form></div>"; 
}

} }else{echo "<br><br><br><span style='font-family:Monotype Corsiva;font-size:22px;color:#CBA844;'>No data images</span></center>";} mysql_close($connect); }
elseif ($URI_page=='http://test1.ua/test3.php/upload') {
	require_once "upload.php";
}

?> 


					</div>
					
					
						<?php



if($URI_page=='http://test1.ua/test3.php' || $_GET['page'])
{

	echo "<center>";

$host = "localhost"; 

$db_name = "u380785309_bielz"; 

$login = "root";

$pswrd = "";

$connect = mysql_connect ("$host", "$login", "$pswrd") or die("Ошибка подключения к MySQL");//mysqli_connect ("$host", "$login", "$pswrd") or die("Ошибка подключения к MySQL");

mysql_select_db($db_name, $connect);//mysqli_select_db($connect, $db_name);


mysql_query("SET NAMES 'utf-8'", $connect);//mysqli_query($connect, "SET NAMES 'utf-8'");


$strSQL = "SELECT * FROM imagesData";	

$rs = mysql_query($strSQL, $connect);//mysqli_query($connect, $strSQL);

 

if($rs){

$count_row_sql = mysql_query("SELECT COUNT(*) FROM imagesData", $connect);//mysqli_query($connect, "SELECT COUNT(*) FROM imagesData");

$count_row = mysql_fetch_array($count_row_sql, MYSQL_NUM);//$count_row_sql->fetch_array(MYSQLI_NUM);//кол-во строк в БД


$count_page = ceil($count_row[0]/3);//кол-во стр 3 - это количество элементов

$active_page;//номер активной стр

$url = "index.php";

$url_page = "http://test1.ua/test3.php?page=";

$page = $_GET['page'];

$active_page = 1;

if($count_row[0]>3)echo "<div class='pagination'>"; 

if($page!=NULL)$active_page = $page;

if($count_page>2 && $active_page!=1)

{

printf ("<a href='http://test1.ua/test3.php?page=%d'>< </a>", $active_page-1);

}           

 

if($count_page==2)

{

printf ("<a href='$url_page%d'>%d</a>  ", 1, 1);

printf ("<a href='$url_page%d'>%d</a>  ", 2, 2);

}

else if($count_page>2 && $active_page <4)

{

printf ("<a href='$url_page%d'>%d</a>  ", 1, 1);

printf ("<a href='$url_page%d'>%d</a>  ", 2, 2);

printf ("<a href='$url_page%d'>%d</a>  ", 3, 3);

}

    else if($count_page>2 && $active_page>3)

{

if($active_page>4){printf ("<a href='$url_page%d'>%d</a>  ", 1, 1); echo '...';} 

if($active_page != $count_page){printf ("<a href='$url_page%d'>%d</a>  ", $active_page-1, $active_page-1);

printf ("<a href='$url_page%d'>%d</a>  ", $active_page, $active_page);

printf ("<a href='$url_page%d'>%d</a>  ", $active_page+1, $active_page+1);}

else if($count_page>2 && $active_page>3 && $active_page == $count_page)

{

printf ("<a href='$url_page%d'>%d</a>  ", $active_page-2, $active_page-2);

printf ("<a href='$url_page%d'>%d</a>  ", $active_page-1, $active_page-1);

printf ("<a href='$url_page%d'>%d</a>  ", $active_page, $active_page);

 

}

}

 

 

    if($count_page>4)

  {

if($active_page < $count_page-2){echo "...  ";

printf ("<a href='$url_page%d'>%d</a>  ", $count_page, $count_page);}else if($active_page==3){echo "...  ";

printf ("<a href='$url_page%d'>%d</a>  ", $count_page, $count_page);}

  }  

  }

if($active_page != $count_page && $count_page>2)printf ("<a href='http://test1.ua/test3.php?page=%d'>></a>", $active_page+1); if($count_page>1)echo "</div>"; 
mysql_close($connect);
echo "</center></div>";
}//mysqli_close($connect);
?>

				</div>

				<div class="footer">

						<div class="copyright">
                        <span class="copyright_span">By Ruslan Verba &copy 2016</span>                
						</div>

						<div class="note">
						<span class="note_span">BY DESINGER</span>
						</div>
				</div>
			</div>
		</div>
	</body>
</html>
<!--1#c45a47-->

<script type="text/javascript">
 
jQuery(document).ready(function () { 

 
    var view_height = screen.height;  

 
    jQuery('td a').click(function () { 

 
  

 
        var o=jQuery(this).parent(); 

 
        var url=o.find('img').attr('src');  

 
  

 
var html2='<div class="modalDialog"></div>' 

 
 o.append(html2);  

 
        var html='<a style="margin-left: 20%" class="clone"><img src="'+url+'" /></a>' 

 
        o=o.find('.clone'); 

 
        var img = new Image();  

 
        img.src = url 

 
        img.onload = function() { 

 
    	var height = this.height; 

 
   		var width = this.width;  

 
   if(height>600 && view_height<950)height=600; 

 
  if(width>1000)width=1000; 

 
 o.animate({width: width, height: height}); 

 
            }; 

 
  
            var counte=0;
 
        o.click(function () { 
     
 		if(counte==0)
 			{
 				jQuery('.modalDialog').remove(); 
 				counte++;o.click();
 			}

 		if(counte==1)jQuery(this).remove(); 
 
        }); 

 
    }); 

 
}); 
</script>

<style>

.pagination {
	margin-top: 5%;
	text-align: center;
    display: inline-block;
    padding: 1em 1.5em;
    text-decoration: none;
    border-radius: 3px;
    margin-left: 31.75%;
    margin-right: 30%;
    background: #71200f;
    color: #fff;
    margin-bottom: 1%;
}

a {
	text-decoration: none;
    color: #cba844;
}


.note {
	margin-left: 77%;
	display: inline-block;
	margin-right: 3%;
}

.copyright {
	padding-left: 4.5%;
	display: inline-block;
}

.copyright_span {
	color: white;
}

.note_span {
	color: white;
}

.image_gallery {
	cursor: pointer;
    border-radius: 8px;
    display: inline-block;
    background: #e96722;
    margin: 1%;
}

.view_image
{
	margin-top: -5%;
}

* { 
    border: 0;
}

.close{
	padding: 0;
	position: relative;
    width: 20px;
    height: 20px;
    background: #e96722;
    margin-left: 274px;
    margin-bottom: 2px;
    cursor: pointer;
    display: inline-block;
}

img {
	    max-width: 100%;
}
ul{	
	display: block;
	font:  1em/1.4em Helvetica, Arial, sans-serif;
	font-size: 0.9em;
	margin-right: 36.5%;
	margin-left: 36.5%;
	background-color:  #87240F;
	margin-top: 0;  
	border-radius: 3px;
	padding: 0.25%;
}

li {
	 display: inline;
	 list-style-type: none;
	 padding: 4.78%;
}

li a {
	color: #CBA844;
	text-decoration: none;

}

a:hover {
	color: orange;
}

.nav {
	display: block;
	padding: 0;
	font: 1em/1.4em Helvetica, Arial, sans-serif;
	background-color: #e96722;
    min-width: 100%;
}

body {
	margin:0;
	padding:0;
	font-family:'PT Sans', Arial, serif !important;
}

.header {
	position: relative;
    top: 0;
    left: 0;
    background-position: center top;
    background-repeat: no-repeat;
    border-bottom: 1px solid #CBA844;
    padding: 0;
    margin: 0;
    border: 0px;
}

.conteiner {
	padding: 0;
	margin-left: auto;
	margin-right: auto;
	display: block;
}

#logo {
	margin-left: 9.5%;
    margin-right: 9.5%;
   	text-align: center;
   	display: block;
}

#logo_img {
	max-width: 50%;
	border-radius: 8px;
}

.wrapper {
	padding-top: 10%;
	margin-top: -1.165%;
	display: block;
	min-height: 100%;
	min-width: 100%;
	background-color: #4c4c4c;
}

.footer {	
	padding-top: 1%;
	display: block;
	background-color: black;
	height: 5%;
	font-size: 80%;
}

.message_block
{
	float: right;
	display: block;
	margin-right: 45%;
	margin-left: 45%;
	margin-top: -2%; 
	position: absolute; 
	background-color: red;
	border-radius: 25%; 
	padding: 1%; 
	color: gold
}

#message1
{
	float: right;
	display: block;
	margin-right: 45%;
	margin-left: 45%;
	margin-top: -2%; 
	position: absolute; 
	background-color: green;
	border-radius: 25%; 
	padding: 1%; 
	color: gold	
}


.modalDialog {

position: fixed;

font-family: Arial, Helvetica, sans-serif;

top: 0;

right: 0;

bottom: 0;

left: 0;

 

background: rgba(0,0,0,0.8);

z-index: 10;

-webkit-transition: opacity 400ms ease-in;

-moz-transition: opacity 400ms ease-in;

transition: opacity 400ms ease-in;

 

 

}

td {

    position: relative;

}

.clone {

  position: fixed;

    top: 1%;

    left: 13%;

    right: 0;

    bottom: 0;   

    z-index: 11;

}

.clone2 {

    position: fixed;

    top: 1%;

    left: 13%;

    right: 0;

    bottom: 0;   

    z-index: 11;

}

.clone > img {

    width: 100%;

    height: 100%;

}

#gis_header_label{
	width: 5%;
    position: absolute; 
    font-size: 36px;
    line-height: 10%;
    margin-left: 44%;
    margin-top: -1.4%;
    padding-left: 2.5%; 
    padding-right: 0.5%;
    height: 8%;
    color: #FF8C00;
    box-shadow:
        
        inset 15px 3px 0px #87240F,
        inset 30px 0px 50px #4c4c4c;
    border-radius: 0 10px 15px 80px;
    background: #fff url(images/jjjj.jpg) no-repeat center left;
}

h1 {
	margin-top: 1%;
	font: 1em/1.4em Helvetica, Arial, sans-serif;
	font-style: italic;
}
</style>
</style>