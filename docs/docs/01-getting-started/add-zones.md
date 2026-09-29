---
sidebar_position: 2
description: Sonos-Zonen hinzufügen, Security (VLAN), Raum-Einstellungen, Zeitsteuerung
---

# Zonen hinzufügen

## Sonos-Zonen hinzufügen

Durch Betätigen des Buttons "**Player hinzufügen**" (letzte Zeile der Player-Tabelle) durchsucht das Plugin dein Netzwerk nach vorhandenen Sonos Playern. Dabei werden Bridge, Dock, Boost und Subwoofer nicht berücksichtigt. Vor dem Scan erscheint der Hinweis, bestehende Gruppen aufzulösen.

:::info

Bitte vorher unbedingt sicherstellen das alle Player ONLINE sind!

:::

Neu gefundene Player werden erst beim **Speichern** der Konfiguration übernommen.

Nach erfolgtem Scan sollte folgender Bildschirm erscheinen:

 ![Sonos Konfiguration](./img/wiki_so1.png)

Falls nach dem Scan keine Player erscheinen überprüfe dein Netzwerk (Fritzbox, Switch, Firewall, Virenscanner etc.) ob Multicast enabled ist. Eigentlich sollte das im Standard der Fall sein, aber gerade Virenscanner und managed Switches haben Multicast zum Teil disabled.

Das Plugin sucht basierend auf dem SSDP Protokoll nach UPnP Devices mit folgender Multicast Adresse: **239.255.255.250 Port 1900**. Dieser Port muss nicht explizit im Router konfiguriert werden.

### UNICAST Scan (z. B. bei VLAN)

Findet der Multicast-Scan keine neuen Player, erscheint der Hinweis "**MULTI-/BROADCAST Fehler**" und ein zusätzliches Eingabefeld. Dort können eine oder mehrere **IP-Adressen** der Sonos Player eingegeben werden (getrennt durch Komma, Semikolon oder Leerzeichen, z. B. `192.168.10.50, 192.168.10.51`). Nach erneutem Klick auf "**Player hinzufügen**" wird jede IP über `http://<IP>:1400/info` geprüft und ein reiner UNICAST-Scan ausgeführt. Nicht erreichbare IPs werden angezeigt. Die eingegebenen IPs werden nicht gespeichert.

## Security (VLAN)

:::warning

Die Sonos Player spielen T2S-Dateien und lokale Tracks per SMB/CIFS von der LoxBerry-Freigabe `plugindata` ab. Bei Betrieb im VLAN müssen daher folgende Ports in der Firewall geöffnet sein:

  * **TCP 137–139** und **445** (SMB/CIFS)
  * **UDP 1900** (SSDP)
  * **TCP 1400** (Sonos UPnP Steuerung/Events)

:::

## Raum-Einstellungen

Die Angaben für Raum, Modell und IP-Adresse sind NICHT änderbar und sind analog zur Sonos App. Ein **grün** hinterlegter Raum ist online. Falls eine Zone in der Sonos App umbenannt wird, muss anschließend in der Konfiguration der alte Eintrag gelöscht werden (Papierkorb-Symbol vor der jeweiligen Zone) und gespeichert werden, dann erneut einen Scan ausführen um die umbenannte Zone zu finden. Das gleiche gilt auch für neu hinzugefügte Player.

Wenn du einen Player aus irgendeinem Grund löschen möchtest, klicke auf das Papierkorb-Symbol des entsprechenden Players, bestätige und speichere die Konfiguration. Solange du nicht wieder den Scan Button betätigst ist die Zone für den MS nicht mehr erreichbar.

Als nächsten Schritt müssen folgende Werte je Zone/Player ergänzt werden:

  * **T2S:** Player der für T2S Emergency/Info Announcements verwendet werden soll. **Mindestens ein** Player muss markiert sein.
  * **T2S Vol:** Der eingegebene Wert (zwischen 0-100) ist die Standard Lautstärke für T2S Durchsagen für diese Zone.
  * **Audio Vol:** Der eingegebene Wert (zwischen 0-100) ist die Power On Lautstärke bzw. Standard Sonos Lautstärke für diese Zone.
  * **Max Vol:** Der eingegebene Wert (zwischen 0-100) ist die maximale Lautstärke für diese Zone. Er muss **größer** als T2S Vol und Audio Vol sein. Die Begrenzung wird bei aktivierter Option "[Nutzung Lautstärkebegrenzung](../02-configuration/options.md#auto-update-sonos-firmware)" ca. alle 10 Sekunden überwacht.

Die Spalte **Clip** gibt an ob der entsprechende Player die Sonos AudioClip Funktion unterstützt (🟢 = unterstützt, 🔴 = nicht unterstützt bzw. offline). Unterhalb der Tabelle wird angezeigt, ob alle Zonen Clip unterstützen – das ist Voraussetzung für die Funktion [doorbell](../03-integration/actions-t2s.md#sonderfunktionen-t2s). Für S1-Player wird ein entsprechender Hinweis angezeigt.

Standard bedeutet dass ohne Angabe von Volume innerhalb der Syntax diese Lautstärkewerte genommen werden. Näheres über die Verwendung von Volume in der Syntax findest du unter [T2S-Durchsagen](../03-integration/actions-t2s.md).

Erst nach erfolgreicher Ergänzung dieser Werte lässt sich das Plugin speichern.

## Test Sprachausgabe

Sobald eine T2S-Engine mit Sprache/Stimme konfiguriert ist, erscheint ein Textfeld "**Test Sprachausgabe**" (max. 500 Zeichen). Ein Klick auf die Werte-Zelle eines Players spielt den Text auf diesem Player mit Lautstärke 35 ab. So lassen sich Engine, Stimme und Netzwerk direkt aus der Konfiguration testen.

## Zeitsteuerung (optional)

Je Player kann über die Spalten **aktiv von** / **bis** (Format HH:MM) ein Zeitfenster definiert werden. Außerhalb dieses Fensters gilt:

  * T2S als Master/Single → wird nicht ausgegeben; als Member → wird ignoriert
  * Streaming als Single → Wiedergabe wird gestoppt
  * Streaming als Master/Member → Player wird aus der Gruppe entfernt

Die Überwachung erfolgt ca. alle 10 Sekunden im Hintergrund. Das ist z. B. nützlich, um bei `member=all` (Klingel) einzelne Räume wie das Kinderzimmer zeitgesteuert auszuschließen. Aktive Zeitüberschreitungen werden in der Konfiguration orange hinterlegt (nicht im Theme "Classic Mac").
