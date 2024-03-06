<?php
function sendMessage ($chatId, $message, $message_id){
  $url = $GLOBALS['website'] . "/sendMessage?chat_id=" . $chatId . "&text=" . $message . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML";
file_get_contents($url);
};
function delMessage ($chatId, $message_id){
  $url = $GLOBALS['website'] . "/deleteMessage?chat_id=" . $chatId . "&message_id=" . $message_id;
file_get_contents($url);
};

 
function capture($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function editMessage($chatId, $message, $message_id) {
  global $botToken; // Haciendo $botToken accesible dentro de la función
  
  $url = "https://api.telegram.org/bot$botToken/editMessageText?chat_id=$chatId&message_id=$message_id&text=" . urlencode($message) . "&parse_mode=HTML";
  
  // Imprimir la URL para verificar si se construye correctamente
  echo "URL: $url <br>";
  
  $result = file_get_contents($url);
  
  if ($result === false) {
      echo "Error al realizar la solicitud HTTP";
      // Manejar el error aquí según sea necesario
  } else {
      echo $result . '<hr>';
  }
}
function sendaction ($chatId, $action){
  $url = $GLOBALS['website'] . "/sendChatAction?chat_id=" . $chatId . "&action=" . $action;
file_get_contents($url);
};

function reply_to($chatId,$message_id,$keyboard,$message) {
        $url = $GLOBALS['website'] . "/sendMessage?chat_id=" . $chatId . "&text=" . $message . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML&reply_markup=" . $keyboard;
        return file_get_contents($url);
}
function gibarray($message){
    return explode("\n", $message);
}

?>
