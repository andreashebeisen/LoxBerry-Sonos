---
sidebar_position: 1
description: Tipps & Tricks für die einfachere Integration
---

# Tipps & Tricks

Die Erfahrung zeigt dass es Sinn macht die zu verwendende Syntax immer erst einmal im Browser zu testen bevor sie in Loxone als Ausgangsbefehl angelegt wird.

Es ist auch möglich z.B. für immer wiederkehrende Ansagen (Waschmaschine fertig usw.) vor erstellte MP3 Dateien zu nutzen ohne ständig die T2S Engines zu nutzen. Diese MP3 Dateien müssen a: numerisch sein (4.mp3) und b: mit Hilfe von z.B. WinSCP im Verzeichnis `loxberry/data/plugins/sonos4lox/tts/mp3` gespeichert werden. 

Um numerische MP3 Dateien zu erstellen mache bitte folgendes:

  - Generiere eine Textansage:

    `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&playgong=yes&action=sendmessage&text=Waschmaschine ist fertig&volume=20`

  - Wechsel in das Verzeichnis `loxberry/data/plugins/sonos4lox/tts/` und benenne die oberste Datei die ungefähr so aussehen müsste `7e7fbecd034c7c8eb7d6fdd2f2790949.mp3` in `1.mp3` um
  - kopiere mit Hilfe von z.B. WinSCP diese Datei in das Verzeichnis `loxberry/data/plugins/sonos4lox/tts/mp3/`
  - Rufe Sie anschließend über folgende Syntax immer wieder auf:
    
    `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&playgong=yes&action=sendmessage&messageid=1`
  
  Ich persönlich mache mir dann immer noch eine Kopie der numerischen MP3 Datei und hänge mir noch einen Text dran damit ich weiß um welchen Ansagetext es sich handelt (1_Waschmaschine.mp3).