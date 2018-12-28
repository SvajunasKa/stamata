<style type="text/css">@charset "UTF-8";
<!--
body,td,th {
   color: #40ff00;
   font-family: Courier New, Courier, monospace;
}
body {
   background-color: #000033;
}
INPUT {
background-color: black;
border: grey 1px solid;
color: white;
font-family: arial, verdana, ms sans serif;
font-size: 10pt
}
TEXTAREA {
background-color: black;
border: grey 1px solid;
color: white;
font-family: arial, verdana, ms sans serif;
font-size: 10pt;
font-weight: normal
}
-->
</style>
<?php   
function send_mail( $to, $subject, $body, $kam ) {
    $from = '"MB Stamata kadastriniai matavimai" <vladas@statmatavimai.lt>';
    $ga_link = '<img src="http://www.statmatavimai.lt/img.php&el='.$to.'&code=00001" alt="" width="1" height="1" border="0">';
    $message = "
        <html>
        <head>
            <title>$kam - ". $subject ."</title>
        </head>
        <body>

        ". $body ."
Sveiki $kam,<p>


Galbūt pas jus yra poreikis kelių inventorizacijos(kadastrinių matavimų) darbų atlikimui?<br/>
Jei taip, tuomet norėčiau Jums pasiūlyti savo paslaugas kadastrinių matavimų darbams atlikti, baigtos ir nebaigtos statybos pastatams, keliams ir inžineriniams tinklams.<br/>
Ilgametė patirtis, darbai atliekami kokybiškai už prieinamą kainą.<br/><p>


Geros dienos!<br/>
<p>
Pagarbiai,<br/>
Vladas Stabingis, MB Stamata<br/>
8-601-52996<br/>
vladas@statmatavimai.lt <mailto:vladas@statmatavimai.lt><br/>
www.statmatavimai.lt <http://www.statmatavimai.lt><br/>
www.facebook.com/kadastriniaimatavimaiStamataMB <https://www.facebook.com/kadastriniaimatavimaiStamataMB/><br/>
</p>
$ga_link
        </body>
        </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Return-path: <sales@smediena.lt>" . "\r\n";
    
    //$headers .= "For: " . $subject . "\r\n";
    // $headers .= "To: " . $subject . "\r\n";
    // Send this message;
    $result = mail( $to, $subject, $message, $headers);
    return $result;
}
   
   
$filename = fopen("name.txt", "r");
$filemail = fopen("mail.txt", "r");
while(!feof($filemail)){
    $kam = fgets($filename);
    $to = fgets($filemail);
    # do same stuff with the $line
    send_mail( "$to", 'Dėl kelių inventorizacijos(kadastrinių matavimų)', $message, $kam ) ;
    echo "            sent to:     ".$kam."            ".$to ;/////
    echo "<p>";/////
   sleep(1) ;
}
fclose($filename);
fclose($filemail);

   echo "sent... o.O";


?>