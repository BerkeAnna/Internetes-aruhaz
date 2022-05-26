A program és az adatbázis (Dockerre specializálva) beüzemelése:
1. SQL parancsok (Táblák.txt) és triggerek (Triggerek.txt) futtatása az adatbázis létrehozásához.
Ha esetleg a nézettáblát nem hozná létre a Scriptek.sql, akkor a 44. sorban lévő nézettábla létrehozó parancsot külön kell futtatni.

2. A "csatlakozas.php" (Location: Weboldal/scripts/csatlakozas.php) 10. sorában kell módosítani az alapértelmezett adatbázis felhasználó felhasználónevét és jelszavát.

3. Az admin felhasználók helyes beüzemeléséhez létre kell hozni őket az Oracle SQL Developer-ben. Ehhez az aktuálisan bejelentkezett adatbázis tulajdonos (bal oldalt lévő menüjében) "Other users" részénél kell létrehozni felhasználót.

Lépései:
- Jobb klikk az "Other users"-re > "Create User" > "User"
- User Name beállítása
- New Password beállítása
- Default Tablespace: USERS
- Temporary Tablespace: TEMP
- Create User ablakon belüli fölső menüben > "Granted Roles"
- "Grant All"-ra klikk
- Hozzuk létre a felhasználót ("Alkalmaz")

Pontosan olyan felhasználónevet és jelszót kell rözgzíteni a fenti lépésekben, amilyenekkel az ADMIN táblában szerepelnek. A többi tetszőleges.

