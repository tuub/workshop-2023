# workshop-2023
Beispiele für Workshop

# Inhalte

## HTML

1. <a href="html/example01/">Einfacher Text mit Bild</a>
2. <a href="html/example02/">Listen</a>
3. <a href="html/example03/">Tabellen</a>
4. <a href="html/example04/">Verschiedenes</a>

## CSS

1. <a href="css/example01/">Einfacher Text mit Bild</a>
2. <a href="css/example02/">Listen</a>
3. <a href="css/example03/">Tabellen</a>
4. <a href="css/example04/">Verschiedenes</a>

## JavaScript

1. <a href="javascript/example01/">Einfache Funktionen</a>
2. <a href="javascript/example02/">Änderungen im DOM I</a>
3. <a href="javascript/example03/">Änderungen im DOM II</a>
4. <a href="javascript/example04/">Aufruf von externen APIs</a>
5. <a href="javascript/example05/">Clientseitige Formularvalidierung</a>

## PHP

1. <a href="php/example01/">Einfache Liste und Loop</a>
2. <a href="php/example02/">Einfaches Formular</a>
3. <a href="php/example03/">Größeres Formular</a>
4. <a href="php/example04/">Datenbankzugriff</a>
5. <a href="php/example05/">Datenbankzugriff mit externer Progammbibliothek</a>
6. <a href="php/example06/">Generierung von Datenbankeinträgen mit externer Progammbibliothek</a>
7. <a href="php/example07/">Aufruf von externer API</a>

## JavaScript & PHP

1. <a href="javascript+php/example01/">Ajax: Marvel-Charaktere</a>

## Security

1. <a href="security/example01/">Script Injection</a>
2. <a href="security/example02/">SQL Injection</a>

## Shell

1. <a href="shell/example01/">Automatisierung</a>

# Installation

Die Anleitung setzt ein Ubuntu Linux 22.04 voraus. Falls nicht vorhanden, kann das System über VirtualBox leicht virtuell aufgesetzt werden. 

## Programmpakete installieren
```
sudo apt install apache2 git php curl libapache2-mod-php php-sqlite3 composer
```

## Editor "Visual Studio Code" installieren

```
sudo snap install --classic code
```

1. _Visual Studio Code_ öffnen
2. `Clone Repository` wählen
3. `https://github.com/tuub/workshop-2023` eintragen
4. `Desktop` als Speicherort angeben

## Verzeichnis für Webserver-Zugriff einstellen
```
# Den Webserver-User zur eigenen Usergruppe hinzufügen
sudo adduser www-data $USER
```

## Webserver-Konfiguration anpassen

1. In _Visual Studio Code_ die Datei `apache2.conf` öffnen
2. `DocumentRoot` anpassen: `<USER>` mit eigenem Usernamen ersetzen

## Webserver-Konfiguration laden
```
# Bearbeitete Webserver-Konfiguration an die richtige Stelle im System kopieren
sudo cp /home/$USER/Desktop/workshop-2023/apache2.conf /etc/apache2/sites-available/000-default.conf

# Webserver neustarten
sudo systemctl restart apache2.service
```

## Testen

1. Webbrowser öffnen
2. `http://localhost` eingeben