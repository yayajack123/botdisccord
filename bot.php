<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
 
$discord = new Discord([
  'token' => 'NTcyMzEwNTY2ODYyMDYxNTk4.XMgn5Q.P8gvuqmswtR-YeEFB0EZP86aNIc'
]);


 
$discord->on('ready', function ($discord) { 
  $discord->on('message', function ($message, $discord) {
   $con=mysqli_connect("remotemysql.com","o0LTXYuQII","WbVXwbo7Wo","o0LTXYuQII");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    // $msg = trim($message->content);
    // if (preg_match($msg, $message->content)){
    //   $message->reply("test");
    // }
    $id_bot = "botIms";
    echo $message->author->user->username;
    if(strcmp($id_bot,$message->author->user->username)  == 0){
      return;
    }

    $msg = trim($message->content);
    echo $msg;
    $cmd = strtolower($msg);
    if (strlen($msg) == 0) {
      return;
    }
    // if ($msg[0] != '?') {
    //   return;
    // }
    $user = $msg;
    // $user = trim(substr($msg, 1));
    echo $user;
    
    if(strlen($user)>0){
      $pesan = array($user,'juga',);
      $gabung = implode(" ",$pesan);
      // $message->reply($gabung);
    }
    $text_send=trim($gabung);
    mysqli_query($con,"INSERT INTO tb_chat (text_get,text_send) 
      VALUES ('$user','$text_send')");
 
    mysqli_close($con);
    //   if (strlen($msg) == 0) {
    //       return;
    //   }elseif (strlen($msg) != 0) {
    //       $pesan = array($author,$msg,' juga',);
    //       $gabung = implode(" ",$pesan);
    //       $message->channel->sendMessage($gabung);
    //   }
    
    
    // if (strcmp($msg,"selamat pagi")==0) {
    //     $s = "pagi juga";
    //     $message->channel->sendMessage($s);
    // }
    });
});
$discord->run();

?>
