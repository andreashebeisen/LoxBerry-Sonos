---
sidebar_position: 2
description: Grundeinstellungen für Text-to-speech (T2S)
---

# Text-to-speech (T2S)

## Text-to-speech Engine

Um die speech Funktionen nutzen zu können benötigt man eine Speech Engine, diese kann entweder Online oder Offline sein. Folgende T2S Optionen stehen zur Auswahl:

  * **VoiceRSS** → Online Engine, benötigt nur einen API key (nur eine weibliche Stimme)
  * **Amazon Polly** → Online Engine, benötigt einen API und einen secret key. (eine weibliche und eine männliche Stimme) **__ACHTUNG: Preismodell beachten.__**
  * **Mac OSX** → Offline Engine, benötigt einen OSX Server
  * **Pico2Wave** → Offline Engine, bei installiertem Text2SIP Plugin (nur eine weibliche Stimme)
  * **Google** → begrenzt auf max. 100 Zeichen, dafür multilingual
  * **ResponsiveVoice** → Online Engine, benötige keine keys (nur eine weibliche Stimme)
  * **GoogleCloud** → Online Engine, benötigt einen API key (multilingual und Auswahl an Stimmen/Qualität/Gender **__ACHTUNG: Preismodell beachten __**
  * **MS Azure** → Online Engine, benötigt einen API key (multilingual und Auswahl an Stimmen **__ACHTUNG: Preismodell beachten  __**→ **Empfehlung**
  * **ElevenLabs** → Online KI basierende Engine, benötigt einen API key (multilingual und Auswahl an Stimmen **__ACHTUNG: Preismodell beachten  __**

Nach erfolgreichem Generieren der entprechenden Key(s) müssen diese in den entsprechenden Feldern eingetragen werden. Wenn jemand die Offline T2S Version für OS X verwenden möchte kann ich ihm gerne einen Ansprechpartner nennen, da ich selber keinen OS X Server besitze.

  * **Text-to-speech Funktion:** Die T2S Funktion kann temporär ausgeschaltet werden (default = ON). Ausnahme: Eine T2S wird mit dem Parameter **&urgent** ausgeführt, dann wird die T2S bei ausgeschalteter Funktion trotzdem announced.

**API key:** Bitte den gültigen API key von VoiceRSS/Google Cloud/MS Azure oder AWS Polly eingeben

**Secret key**: Bitte den gültigen secret key von Polly eingeben

**Auswahl der Standardstimme (Azure/Google Cloud/Polly/ElevenLabs):** wähle Stimme

Die Stimme, als auch die Sprache, kann innerhalb der Syntax für T2S jederzeit geändert werden.

**Verweildauer der MP3 Dateien:** Anzahl der Tage oder Cache Größe die eine MP3 gespeichert werden soll bevor Sie automatisch gelöscht wird.

**Dateiname für Jingle MP3:** Name der Datei die vor einer Durchsage abgespielt werden soll. Diese Datei muss in das Unterverzeichnis **/tts/mp3** kopiert werden. Als Beispiel ist die Datei "2_Airport_gong.mp3" bereits enthalten. <!-- Näheres zur Nutzung der Funktion unter [[plugins:sonos4loxone:t2s_durchsagen|T2S Durchsagen]] -->

**Sonos Daten senden:** Schalter um verschiedenste Infos an Loxone per UDP/MQTT, und Titel/Interpret Informationen über virtuelle Texteingang Verbinder zu senden.
<!-- Näheres zur Nutzung der Funktion unter [[plugins:sonos4loxone:loxone_anbindung|Loxone Anbindung]] -->

**Kommunikation** zum Miniserver entweder per UDP oder MQTT

**UDP-Port:** Port des MS an den die UDP Pakete geschickt werden sollen. 

<!-- Die Syntax zur Verwendung von T2S ist unter [[plugins:sonos4loxone:t2s_durchsagen|T2S Durchsagen]] genauer beschrieben. -->
