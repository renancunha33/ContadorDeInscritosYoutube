<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://s.ytimg.com/yts/img/favicon-vflz7uhzw.ico">
    <title>Contador de inscritos</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body style="background-color:#90CAF9;">
	  <div class="container">
		  <center>
    <h1>Contador de inscritos</h1>
	    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
  			Link do seu canal (Somente o Link do canal funciona aqui): <input type="text" class="form-control" name="link"><br/>
  			<button type="submit" class="btn btn-primary pull-right">Enviar</button>
		</form>
			  </center>
	  </div>
<?php 
error_reporting(0);
ini_set('display_errors', 0);

$channel =$_GET["link"];
$t = file_get_contents($channel);
$pattern = '/yt-uix-tooltip" title="(.*)" tabindex/';
preg_match($pattern, $t, $matches, PREG_OFFSET_CAPTURE);



function get_title($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\ - YouTube<\/title\>/i",$str,$title); // ignore case
    return $title[1];
  }
}
//Example:
echo '<center><h3><b>';
echo get_title($channel) ;
echo '<br/>';
echo '<br/>';
echo $matches[1][0],' INSCRITOS';
echo '</b></h3></center>';
?>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>