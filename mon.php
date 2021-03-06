<?php
include 'config.php';
include 'query/Buffer.php';
include 'query/BaseSocket.php';
include 'query/Socket.php';
include 'query/SourceQuery.php';
$sq = new SourceQuery();

$sq->Connect($ip, $port, 1, SourceQuery::GOLDSOURCE);
$aData = $sq->GetInfo();
$aData['Players'] = $aData['Players'] < 1 ? 0 : $aData['Players'];
$aData['status'] = strlen($aData['Map']) > 3 ? ''.$aData['Map'].'' : 'не определена';
$output .= '
	'.$aData['HostName'].'
	IP: '.$ip.':'.$port.'
	Карта: '.$aData['status'].'
	Игроки: '.$aData['Players'].' из '.$aData['MaxPlayers'].'
';
