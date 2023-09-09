# workshop-2023
JavaScript and PHP examples for workshop.

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