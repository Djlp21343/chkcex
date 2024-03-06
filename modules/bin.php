<?php

$time_start = microtime(true);

if ((strpos($message, "/bin $bin") === 0)||(strpos($message, "!bin $bin") === 0)||(strpos($message, ".bin $bin") === 0)){
  sendMessage($chat_id, "<i>...</i>", ["chat_id" => $chat_id, "parse_mode" => "HTML"]);
$bin = substr($message, 5);
$bin = substr("$bin", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: binlist.net',
'Cookie: _ga=GA1.2.772250904.1708028171; _gid=GA1.2.1174727166.1709139360; _gat=1; _ga_YB3VSKJ1YW=GS1.2.1709139361.2.0.1709139361.0.0.0',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = strtoupper(GetStr($fim, '"name":"', '"'));
$brand = strtoupper(GetStr($fim, '"brand":"', '"'));
$country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
$scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
$emoji = GetStr($fim, '"emoji":"', '"');
$type =strtoupper(GetStr($fim, '"type":"', '"'));
if(strpos($fim, '"type":"Credit"') !== false){
};
  $time_end = microtime(true);
  $execution_time = ($time_end - $time_start);
sendMessage($chatId, "<b>CEX CHK ⚡️ - By - $sat%0A━━━━━━━━━━━━━%0A[ϟ] TOOL: BIN LOOKUP%0A[ϟ] STATUS: VALID BIN ✅%0A[ϟ] BIN: $bin%0A[ϟ] COUNTRY: $country $emoji%0A[ϟ] BRAND: $brand%0A[ϟ] LEVEL: $scheme%0A[ϟ] TYPE: $type%0A[ϟ] BANK: $bank%0A━━━━━━━━━━━━━%0A[ϟ] TIME TAKEN: $execution_time's%0A[ϟ] Checked By: @$username%0A[ϟ] UserID: $userId%0A[ϟ] Premium Activated: $stat%0A</b>", $message_id);
}

  
  ?>