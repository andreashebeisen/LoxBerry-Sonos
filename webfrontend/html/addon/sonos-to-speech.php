<?php

 /** 
* aktueller Sonos Titel und Interpret per TTS ansagen
* @param $text
*/ 

function s2s()
{ 		
	global $debug, $sonos, $sonoszone, $master, $t2s_langfile, $templatepath;
	
	#********************** NEW get text variables*********** ***********
	$TL = LOAD_T2S_TEXT();
		
	$this_song = $TL['SONOS-TO-SPEECH']['CURRENT_SONG'] ; 
 	$by = $TL['SONOS-TO-SPEECH']['CURRENT_SONG_ARTIST_BY']; 
	$this_radio = $TL['SONOS-TO-SPEECH']['CURRENT_RADIO_STATION'];
	#********************************************************************
	
	# pr�ft ob gerade etwas gespielt wird, falls nicht dann keine Ansage
	$gettransportinfo = $sonos->GetTransportInfo();
	if($gettransportinfo <> 1) {
		exit;
	} else {
	# Pr�ft ob Playliste oder Radio l�uft
		$master = $_GET['zone'];
		$sonos = new PHPSonos($sonoszone[$master][0]);
		$temp = $sonos->GetPositionInfo();
		$temp_radio = $sonos->GetMediaInfo();
		$sonos->Stop();
		if(!empty($temp["duration"])) {
			# Generiert Titelinfo wenn MP3 l�uft
			$artist = substr($temp["artist"], 0, 30);
			$titel = substr($temp["title"], 0, 70);
			$text = $this_song." ".$titel." ".$by." ".$artist ; 
		} elseif(empty($temp["duration"])) {
			$find1st = strpos($temp['streamContent'], " - ");
			$findlast = strrpos($temp['streamContent'], " - ");
			if (($find1st === false) or ($find1st <> $findlast)) {
				# Generiert Ansage des laufenden Senders
				$sender = $temp_radio['title'];
				$text = $this_radio." ".$sender;
			} else {
				# Generiert Titelinfo wenn Artist / Title vom Sender geliefert wird
				$artist = substr($temp["streamContent"], 0, $find1st);
				$titel = substr($temp["streamContent"], $find1st + 3, 70);
				$text = $this_song." ".$titel." ".$by." ".$artist ; 
			}
		}
		LOGGING('Song Announcement: '.utf8_encode($text),7);
		LOGGING('Message been generated and pushed to T2S creation',5);
		return ($text);
	} 
}
?>