---
sidebar_position: 1
---

# Einführung

## Aufgabe des Plugins

Das Plugin dient zur Steuerung einer Sonos Multi Room Installation aus Loxone heraus. Es stehen die gängigen Standardbefehle, aber auch Text-to-speech (T2S), Sonos-to-speech, Clock-to-speech, bei installiertem Weather4Lox Plugin auch weather-to-speech, außerdem Wetterwarnungen, Pollenflug, Fahrzeit-, Abfall- und Kalenderansagen (CalDAV-4-Lox Plugin) und sonstige Befehle zur Verfügung. Darüberhinaus können auch Werte (z.B. Temperatur oder Fensterstatus) von Loxone in die text-to-speech Ansagen integriert werden. 

Zusätzlich werden Informationen wie Titel/Interpret, Play/Stop/Pause, Lautstärke, Gruppierung, Klangeinstellungen und Wiedergabeposition je Zone nahezu in Echtzeit per MQTT (optional zusätzlich per UDP) sowie über virtuelle Texteingänge (HTTP) an den Miniserver übertragen. Details unter [Loxone-Anbindung](./03-integration/loxone.md) und [MQTT](./02-configuration/mqtt.md).

:::note

Ein ganz besonderer Dank gilt [Michael Schlenstedt](https://loxwiki.atlassian.net/wiki/people/6166f604d9820f00702fdbf7?ref=confluence) und [Sven Thierfelder](https://loxwiki.atlassian.net/wiki/people/6166f83364ff010071d5b312?ref=confluence) ohne deren Hilfe das Plugin nicht hätte realisiert werden können.

:::

## Allgemeines

Das Sonos System ist grundsätzlich sehr ausgeklügelt und durchdacht aufgebaut, auch von seiner Topology und der Flexibilität. Grundsätzlich funktioniert Sonos und das Plugin nahezu wartungsfrei, es gibt aber ein/zwei Besonderheiten die es bei der Nutzung zu beachten gibt.

Die Sonos Player sind nicht gerade als Stromsparwunder bekannt, von daher gibt es User die ihre Player (Zonen) über schaltbare Steckdosen ausschalten und nur bei Bedarf wieder einschalten. Das kann, gerade bei einer Programmierung in einer Hausautomation, zu Problemen z.B. bei T2S führen, so dass im schlimmsten Fall die T2S nicht abgespielt werden kann, da eine Zone nicht erreichbar ist. Von daher empfehle ich alle Zonen immer am Netz zu lassen, da diese auch bis zu 2 Minuten benötigen um im SonosNet als Zone zur Verfügung zu stehen. Es ist zwar auch eine Abfrage bzgl. Online Verfügbarkeit eingebaut, diese aber nicht in der stabilen Qualität läuft wie ich es mir eigentlich wünsche.

Des weiteren gibt es noch LAN-Installationen die eine Sonos Bridge verwenden, diese produzierte in der Vergangenheit immer mal wieder Probleme durch eine Mischinstallation mit WLAN. Von daher empfehle ich jedem seine Sonos Installation per Wireless zu betreiben, wobei ja mind. 1 Zone per LAN verbunden sein sollte, aber halt ohne Bridge. Außerdem bereitet die Bridge im Verbund mit dem Plugin zunehmend Probleme, gerade bei der folgenden Grundkonfiguration.

:::warning

Um einen möglichst reibungslosen Betrieb des Plugins zu gewährleisten MÜSSEN alle Sonos Player (maximal 32 Player) über eine statische IP-Adressierung verfügen, da das Plugin IP basierend die einzelnen Befehle ausführt. Das Gleiche gilt für die IP-Adresse des LoxBerry's, diese sollte statisch oder noch besser über einen DNS Service eingebunden sein. Falls die lokale IP-Adresse des LB's geändert wird bitte das Plugin aufrufen und 1x speichern damit diese Änderung zum Tragen kommt.

:::

### Zusammenfassung

- **Alle Sonos Player am Netz lassen** – Player benötigen bis zu 2 Minuten um im SonosNet verfügbar zu sein; abgeschaltete Player können T2S blockieren.
- **Sonos Bridge aus dem Netzwerk entfernen** – die Bridge verursacht zunehmend Probleme, insbesondere bei WLAN/LAN-Mischinstallationen.
- **Sonos Player mit statischer IP-Adressierung** – das Plugin steuert alle Player IP-basiert (max. 32 Player).
- **LoxBerry IP statisch oder per DNS** – nach einer IP-Änderung des LoxBerry das Plugin einmal öffnen und speichern.

:::warning[Probleme mit Player Discovery]

Falls nach der Player Suche keine neuen Player erscheinen, die Multicast Einstellungen im Netzwerk prüfen (Fritzbox, Switch, Firewall, Virenscanner). Das Plugin nutzt SSDP/UPnP mit Multicast-Adresse **239.255.255.250 Port 1900**. Alternativ den UNICAST Scan mit Eingabe der IP-Adresse(n) der Sonos Player ausführen (siehe [Zonen hinzufügen](./01-getting-started/add-zones.md#sonos-zonen-hinzufügen)).

:::

:::danger

Wer Fehler in der Dokumentation findet darf sie gerne behalten oder selber korrigieren.

:::
