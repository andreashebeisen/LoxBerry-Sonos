---
sidebar_position: 1
description: Anbindung an Loxone
---

# Loxone-Anbindung

## Ausgangsseitig (Miniserver → Sonos)

Um die Sonos Installation vom Miniserver aus zu steuern muss für jede Aktivität ein virtueller Ausgangsbefehl angelegt werden. Dieser kann jeweils bei Ein oder Aus eine Funktion aufrufen.

Folgende Aktivitäten müssen in Loxone durchgeführt werden:

  1. virtuellen Ausgang anlegen
  2. virtuellen Ausgangsbefehl anlegen
  3. zu verwendende Syntax in virtuellen Ausgangsbefehl erstellen/kopieren (siehe [Standard-Befehle](./actions-default.md), [Playlisten / Radio](./actions-playback.md), [T2S-Durchsagen](./actions-t2s.md) und [Sonstige Befehle](./actions-extended.md))

### Virtuellen Ausgang anlegen

Falls nicht schon für andere Plugins vorhanden, einen virtuellen Ausgang anlegen und die IP-Adresse deines LoxBerry eintragen:

 ![Virtueller Ausgang](./img/loxone_1228539761.jpg)

### Virtuellen Ausgangsbefehl anlegen

Bsp.: Befehl bei EIN: Wenn der TV im Wohnzimmer eingeschaltet wird, soll die Zone "Küche" zügig auf Lautstärke Null runtergeregelt werden und dann stoppen.

 ![Virtueller Ausgangsbefehl](./img/loxone_1228539762.png)

### Virtuellen Ausgangsbefehl mit Werten aus Loxone anlegen

Bsp.: Ansage des Fensterstatus beim Einschalten der Alarmanlage. Der Wert `<v>` wird aus dem Wert des Statusbausteins übernommen.

 ![Virtueller Ausgangsbefehl mit Wert](./img/loxone_1228539763.png)

Wichtig ist, dass der Ausgangsbefehl als **analog** markiert sein muss, d.h. Haken bei "**Als Digitalausgang verwenden**" rausnehmen:

 ![Als Digitalausgang verwenden](./img/loxone_1228539764.png)

## Eingangsseitig (Sonos → Miniserver)

:::info[Miniserver]

Die eingangsseitigen Daten werden NUR an den im Plugin selektierten Miniserver gesendet.

:::

Grundsätzlich können Daten per UDP over MQTT (LoxBerry) oder direkt über UDP empfangen werden. Die Daten werden, sobald eine Status Änderung an einer Zone stattfindet, nahezu in Real Time per Standard Sonos Event Listener gesendet. Die Übertragung wird in den [T2S-/Grundeinstellungen](../01-getting-started/t2s.md#weitere-einstellungen) unter "Ausgehende Datenübertragung" aktiviert.

Am einfachsten ist es eines der beiden vorkonfigurierten XML Templates (`VI_MQTT_UDP_Sonos.xml` bzw. `VI_UDP_Sonos.xml`) zu nutzen, welche die gängigen Informationen enthalten. Diese können in der Plugin-Konfiguration generiert und anschließend in Loxone Config importiert werden. Zusätzlich können noch andere Informationen genutzt werden. Details dazu findet man in der Plugin-Konfiguration im PDF Dokument ("detaillierte Informationen").
