## Projektel való fejlesztéshez való kezdés lépései:

1. Klónozzuk le a repository-t
2. Telepítsük a composert az alábbi linkről:

# https://getcomposer.org/download/

3. Álljuk rá a fő mappára cmdben
4. Futassuk a composer install parancsot
5. írjuk be a copy .env.example .env parancsot

6. Ha még nincs php a gépünkön, szedjük le a hozzá kellő fájlokat(a ZIP fájl teamsen jelen esetben)
7. Csomagoljuk ki a fájlt a C meghajtóra, szóval egy ilyen mappa strúktúránk lesz: c:/php
8. Futassuk a php artisan key:generate parancsot 
9. Az .env fájlban írjuk át az adatbázist varosok-ra, illetve adjuk meg a szükséges felhasználó/jelszó kombót, ha nem alapértelmezett van beállítva a gépen
10. Futassuk a php artisan migrate:fresh --seed parancsot
11. Futassuk az npm install parancsot
12. Futassuk az npm run dev parancsot
13. A szerver futtatásához cmdben futassuk a következő parancsot: php artisan serve



## HA PHP NEM ISMERT PARANCS

Ha a php nem ismert parancs a CMD-ben akkor keressünk rá a "Rendszer környezeti váltózoinak módosítása" a php beállításához, itt álljunk rá fent a "speciális" fülre, majd jobb alul nyomjuk meg a "környezeti változók" gombot, a "rendszer változók" alatt keressük meg a "Path" sort, nyomjunk rá duplán, majd oda vegyük fel az "új" gomb segítségével a "C:\php" mappát 
