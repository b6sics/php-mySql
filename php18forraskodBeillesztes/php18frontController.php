<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP Front Controller</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      
  <h2>Front Controller példa </h2>
  <?php 
		if (!isset($_GET['elkuld'])){
			echo " <form name='urlap' action='_self' method='GET'> \n";
			echo "   <fieldset>\n";
			echo "      <legend>Front Controller</legend>\n";
			echo "      <p><label for='oldal'>Oldal: </label>\n";
			echo "      <select name='oldal'>\n";
			echo " 		  <option></option>\n";
			echo " 		  <option value='edit'>kezdolap</option>\n";
			echo " 		  <option value='post'>kategoria</option>\n";
			echo " 		  <option value='delete'>hiroldal</option>\n";
			echo " 		  <option value='default'>kapcsolat</option>\n";
			echo "      </select></p>\n";
			echo " 		<input type='submit' name='elkuld' value='Elküld'>\n";
			echo "   </fieldset>\n";
			echo " </form>\n";
		}
    switch ( @$_GET['oldal'] ) {
      case 'edit':
        include ('oldalak/kezdolap.php'); break;
      case 'post':
        include ('oldalak/kategoria.php'); break;
      case 'delete':
        include ('oldalak/hiroldal.php'); break;
      case 'default':
        include ('oldalak/kapcsolat.php'); break;
    }
  ?>   
</body>    
</html>
