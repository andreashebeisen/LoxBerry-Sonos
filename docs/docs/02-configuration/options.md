---
sidebar_position: 2
description: Feineinstellungen zu Wiedergabe und T2S
---

# Optionen

 ![Optionen 1](./img/wiki_so4.png)
 ![Optionen 2](./img/wiki_so5.png)

## Folgefunktion für ZAPZONE u. FOLLOW

Funktion die ausgeführt wird, falls bei **zapzone** bzw. **follow** (mit `&function`) kein spielender Player gefunden wird. Zur Auswahl stehen:

  * None
  * Nextradio
  * Track Favorites
  * Playlist Favorites
  * Radio Favorites
  * Plugin Radio: _&lt;Sender&gt;_ (je ein Eintrag pro [Radio-Favorit](./settings.md#radio-favoriten-für-tasterbedienung))

Über "**Reset nach**" (1, 3, 5, 10, 15 oder 30 Minuten) wird festgelegt nach wie vielen Minuten die Funktion zurückgesetzt wird. Siehe auch [Follow-me](../05-features/follow-me.md).

## Lautstärke Änderung per Klick

Hier handelt es sich um eine typische Tasterfunktion um die Lautstärke einer Zone zu ändern (**volumeup**/**volumedown**, für Gruppen **grvolup**/**grvoldown**). Der hier angegebene Wert (1–10 %) erhöht/verringert in den jeweilig angegebenen Sprüngen die Lautstärke.

## Ansage des Senders/der Zone vor Play

Bei den Funktionen **nextradio**, **pluginradio** und **zapzone** gibt es optional die Möglichkeit den Titel/Interpret/Radio Sender vorm Abspielen ansagen zu lassen (nur bei Single Playern, nicht für Gruppen).

## Ansage der Radio Station

Bei der Funktion **say&sonos** wird bei laufendem Radio immer der Name des Senders angesagt.

## Lautstärkeanhebung für Radio/Zone Ansage

Erscheint, sobald eine der beiden Ansage-Optionen aktiviert ist. Da die Ansagelautstärke u.U. zu leise ist, kann sie um 1–20 % (Standard 8 %) angehoben werden.

## Rampto Parameter

Rampto ist eine Funktion zum langsamen, kontinuierlichem Erhöhen der Lautstärke. Es stehen 3 verschiedene Parameter zur Verfügung (Standard: Auto):

  - _Sleep_ → erhöht UND verringert die Lautstärke langsam innerhalb von ca. 17 Sekunden auf die gewünschte Lautstärke (typische Weckeinstellung)
  - _Alarm_ → erhöht zügig und kontinuierlich die Lautstärke auf den gewünschten Wert.
  - _Auto_ → erhöht relativ schnell die Lautstärke auf den gewünschten Wert.

Bsp: Die Zone steht auf Pause und die Funktion Play wird betätigt. Ist die gegenwärtige Lautstärke unter 25 greift der Rampto Parameter und erhöht gemäß der Konfiguration die Lautstärke, ist der Wert darüber geht es mit diesem Lautstärkewert unvermittelt los.

## Rampto Volume

Schwellwert (0–100 %, Standard 25) der angegebenen oder gerade laufenden Lautstärke unterhalb dessen einer der 3 zur Verfügung stehenden Parameter automatisch greifen soll.

## Follow me (Präsenzerkennung)

  * **Player folgen:** Standard Host Player dem gefolgt werden soll (oder "Keinem")
  * **Nachlauf:** Zeit (0–300 Sekunden, in 30er Schritten) bis ein Client nach **leave** den Stream verlässt

Details unter [Follow-me](../05-features/follow-me.md).

## Auto Update Sonos Firmware

Aktiviert das automatische Firmware-Update der Player:

  * **Starttag:** Täglich oder ein bestimmter Wochentag
  * **Uhrzeit:** Stunde (0–23)
  * **Power On:** ausgeschaltete Player (schaltbare Steckdose) werden vor dem Update eingeschaltet

In derselben Zeile befindet sich der Schalter **Nutzung Lautstärkebegrenzung**. Ist er aktiv, wird die **Max Vol** je Player (siehe [Raum-Einstellungen](../01-getting-started/add-zones.md#raum-einstellungen)) ca. alle 10 Sekunden überwacht und die Funktion [setmaxvolume](../03-integration/actions-extended.md#gruppierung-geräte--wecker) freigeschaltet. Details zum Update unter [Auto-Update Sonos Firmware](../05-features/firmware-update.md).

## Wartezeit bis T2S erneut ausgegeben wird

Zeit (1–10 Sekunden) innerhalb der eine identische T2S nicht ein 2. Mal ausgegeben werden soll (Notwendig für T2S aus dem Statusbaustein).

## Sonos Plugin Version

Auswahl der zu installierenden Plugin Version (Downgrade/Upgrade). Die Liste wird aus den GitHub Releases geladen, neuere Versionen sind rot markiert. Über den Button "**Installation**" wird die LoxBerry Plugin-Installation mit der gewählten Version geöffnet.

## Sonos Themes

Nur ab LoxBerry 4 verfügbar. Auswahl des Designs der Plugin-Oberfläche: **System**, **Classic Mac** oder **Liquid Glass**. Die Auswahl wird sofort gespeichert. Bei Liquid Glass kann zusätzlich ein eigenes **Wallpaper** (PNG/JPG/WEBP, max. 5 MB) hochgeladen und die **Helligkeit** eingestellt werden.

## Testing

Ist der Loglevel des Plugins auf **Debug** gestellt, erscheint in der Navigation zusätzlich der Tab "**Testing**". Dort können automatisierte Regressionstests der URL-Befehle ausgeführt werden.
