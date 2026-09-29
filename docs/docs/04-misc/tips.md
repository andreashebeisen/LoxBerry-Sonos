---
sidebar_position: 1
description: Tipps & Tricks für die einfachere Integration
---

# Tipps & Tricks

Die Erfahrung zeigt dass es Sinn macht die zu verwendende Syntax immer erst einmal im Browser zu testen bevor sie in Loxone als Ausgangsbefehl angelegt wird.

Es ist auch möglich z.B. für immer wiederkehrende Ansagen (Waschmaschine fertig usw.) vorgefertigte MP3 Dateien zu nutzen ohne ständig die T2S Engines zu nutzen. Diese MP3 Dateien müssen mit Hilfe von z.B. WinSCP im Verzeichnis `/opt/loxberry/data/plugins/sonos4lox/tts/mp3` (bzw. `tts/mp3` im konfigurierten [Speicherort](../01-getting-started/configuration.md#speicherort)) gespeichert werden und können dann über den Parameter `messageid` (numerisch, z.B. `4.mp3`, oder mit Namen, z.B. `Gartentor_offen.mp3`) abgespielt werden. Im Dateinamen sind nur Buchstaben, Ziffern, `_` und `-` erlaubt.

Um eine solche MP3 Datei zu erstellen mache bitte folgendes:

  - Generiere einmalig eine Textansage:

    `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&playgong=yes&action=say&text=Waschmaschine ist fertig&volume=20`

  - Wechsel in das Verzeichnis `/opt/loxberry/data/plugins/sonos4lox/tts/` und benenne die neueste Datei, die ungefähr so aussehen müsste `7e7fbecd034c7c8eb7d6fdd2f2790949.mp3`, in `1.mp3` um
  - kopiere mit Hilfe von z.B. WinSCP diese Datei in das Verzeichnis `/opt/loxberry/data/plugins/sonos4lox/tts/mp3/` (Dateien in `tts/mp3` werden von der automatischen Cache-Bereinigung nicht gelöscht)
  - Rufe sie anschließend über folgende Syntax immer wieder auf:

    `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&playgong=yes&action=say&messageid=1`

Ich persönlich mache mir dann immer noch eine Kopie der numerischen MP3 Datei und hänge mir noch einen Text dran damit ich weiß um welchen Ansagetext es sich handelt (`1_Waschmaschine.mp3`).
