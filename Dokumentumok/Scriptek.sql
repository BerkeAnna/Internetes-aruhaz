DROP table GRILLSUTO;
DROP table HORGASZBOT;
DROP table KEREKPAR;
DROP table MOSOGEP;
DROP table PARFUM;
DROP table TELEFON;
DROP table TV;
DROP table KARBANTART;
DROP table KOSAR;
DROP table TERMEK;
DROP table VASARLO;
DROP table ADMIN;

CREATE TABLE Vasarlo(
                         ID VARCHAR(60) PRIMARY KEY NOT NULL,
                         felhasznalonev VARCHAR(60),
                         jelszo VARCHAR(60),
                         nev VARCHAR(60),
                         email VARCHAR(60),
                         szulDatum DATE,
                         szallitasiCim VARCHAR(60),
                         szamlaszam VARCHAR(60)
);



CREATE TABLE Termek(
                       ID VARCHAR(60) PRIMARY KEY NOT NULL,
                       nev VARCHAR(60),
                       gyarto VARCHAR(60),
                       darab NUMBER(5),
                       ar NUMBER(6),
                       kategoria VARCHAR(60)
);
CREATE TABLE Kosar(
                      vasarloID VARCHAR(30),
                      termekID VARCHAR(30),
                      mennyiseg NUMBER(6),
                      FOREIGN KEY (vasarloID) REFERENCES Vasarlo(ID),
                      FOREIGN KEY (termekID) REFERENCES Termek(ID),
                      PRIMARY KEY (vasarloID, termekID)
);

CREATE VIEW KOSAR2 AS SELECT VASARLOID, TERMEKID, MENNYISEG FROM KOSAR;

CREATE TABLE Admin(
                      ID VARCHAR(60) PRIMARY KEY NOT NULL,
                      nev VARCHAR(60),
                      felhasznalonev VARCHAR(60),
                      jelszo VARCHAR(60)
);

CREATE TABLE Karbantart(
                           adminID VARCHAR(30) NOT NULL,
                           termekID VARCHAR(30) NOT NULL,
                           modositasDatum DATE,
                           megjegyzes VARCHAR(100),
                           FOREIGN KEY (adminID) REFERENCES Admin(ID) ,
                           FOREIGN KEY (termekID) REFERENCES Termek(ID),
                           PRIMARY KEY (adminID, termekID)
);


CREATE TABLE TV(
                   tvtermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                   kepernyoTipus VARCHAR(60),
                   kepernyoFelbontas VARCHAR(60),
                   szelesseg NUMBER(6),
                   magassag NUMBER(6),
                   CONSTRAINT tvtermekID FOREIGN KEY (tvtermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);

CREATE TABLE Telefon(
                        telefontermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                        kepernyoTipus VARCHAR(60),
                        kepernyoFelbontas VARCHAR(60),
                        processzor VARCHAR(60),
                        ram NUMBER(5),
                        tarhely NUMBER(5),
                        hatlapKamFelbontas NUMBER(5),
                         CONSTRAINT telefontermekID FOREIGN KEY (telefontermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);

CREATE TABLE Mosogep(
                        mosogeptermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                        energiaosztaly CHAR,
                        kapacitas BINARY_FLOAT,
                        sulyEnergiafogyasztas NUMBER(5),
                        sulyVizfogyasztas NUMBER(5),
                         CONSTRAINT mosogeptermekID FOREIGN KEY (mosogeptermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);

CREATE TABLE Horgaszbot(
                           horgaszbottermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                           tipus VARCHAR(60),
                           dobosuly NUMBER(5),
                           resz NUMBER(5),
                           teljesHossz FLOAT,
                          CONSTRAINT horgaszbottermekID FOREIGN KEY (horgaszbottermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);

CREATE TABLE Grillsuto(
                          grillsutotermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                          uzemanyagTipus VARCHAR(60),
                          grillezoFelulet VARCHAR(60),
                          szelesseg NUMBER(5),
                          magassag NUMBER(5),
                          CONSTRAINT grillsutotermekID FOREIGN KEY (grillsutotermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);

CREATE TABLE Kerekpar(
                         kerekpartermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                         tipus VARCHAR(60),
                         celcsoport VARCHAR(60),
                         vazAnyag VARCHAR(60),
                         vazMeret VARCHAR(60),
                        CONSTRAINT kerekpartermekID FOREIGN KEY (kerekpartermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE
);



CREATE TABLE Parfum(
                       parfumtermekID VARCHAR(60) PRIMARY KEY NOT NULL,
                       celcsoport VARCHAR(60),
                       illatfajta VARCHAR(60),
                       CONSTRAINT parfumtermekID FOREIGN KEY (parfumtermekID) REFERENCES TERMEK (ID) ON DELETE CASCADE

);
------------------------------------------------------------
Admin tábla feltöltése
------------------------------------------------------------
INSERT INTO Admin VALUES( 1, 'Mr. Foszerkeszto', 'FOSZERKESZTO', 'foszerkeszto' );
INSERT INTO Admin VALUES( 2, 'Berke Anna', 'ANNAADMIN', 'annaadmin' );
INSERT INTO Admin VALUES( 3, 'Toth Akos', 'AKOSADMIN', 'akosadmin' );


------------------------------------------------------------
INSERT INTO Vasarlo VALUES( '1', 'steamsmock', 'qvHBWPQyD', 'Olah Zsolt', 'steamsmock@gmail.com', TO_DATE('1994 11 30', 'yyyy mm dd'), '8600 Siofok, Debreceni utca 49 .', 864093472672236114581732);
INSERT INTO Vasarlo VALUES( '2', 'noseypace', 'TpvRD9eFE', 'Torok Aniko', 'noseypace@gmail.com', TO_DATE('1967 1 2', 'yyyy mm dd'), '6500 Baja, Imola utca 11 .', 915460566182261566982703);
INSERT INTO Vasarlo VALUES( '3', 'veinsearthy', 'SC7z8hwzc', 'Lukacs Balint', 'veinsearthy@gmail.com', TO_DATE('1993 8 24', 'yyyy mm dd'), '5920 Csorvas, Tavasz utca 39 .', 425441399387905258177364);
INSERT INTO Vasarlo VALUES( '4', 'marvelouspeplum', 'AhUPjkbju', 'FabiĂˇn Szabolcs', 'marvelouspeplum@gmail.com', TO_DATE('1996 7 26', 'yyyy mm dd'), '5900 Oroshaza, Imola utca 90 .', 191843789696683096029198);
INSERT INTO Vasarlo VALUES( '5', 'collectiondevastated', 't4djkhnfN', 'Katona Vanessza', 'collectiondevastated@gmail.com', TO_DATE('1996 4 14', 'yyyy mm dd'), '8638 Balatonlelle, Bihari utca 40 .', 384026713403998224458680);
INSERT INTO Vasarlo VALUES( '6', 'powerabcd', '2PFfMjzGZ', 'Boros Lili', 'powerabcd@gmail.com', TO_DATE('1972 11 9', 'yyyy mm dd'), '5830 Battonya, Szelso utca 92 .', 776120930951365190226349);
INSERT INTO Vasarlo VALUES( '7', 'punchminiskirt', 'RqYZSFF8u', 'Lukacs Klara', 'punchminiskirt@gmail.com', TO_DATE('1965 7 17', 'yyyy mm dd'), '6000 Kecskemet, Fo utca 90 .', 652088204187672049309624);
INSERT INTO Vasarlo VALUES( '8', 'officialstrike', 'BxkWt28Ds', 'Budai Dora', 'officialstrike@gmail.com', TO_DATE('1960 11 23', 'yyyy mm dd'), '8000 Szekesfehervar, Nyar utca 51 .', 452116402817092066590382);
INSERT INTO Vasarlo VALUES( '9', 'householdparty', 'TmA4XsvJP', 'Fodor Mark', 'householdparty@gmail.com', TO_DATE('2004 11 9', 'yyyy mm dd'), '8638 Balatonlelle, Alkotmany utca 71 .', 186510670617845773489186);
INSERT INTO Vasarlo VALUES( '10', 'underwearnurse', '52JGEpexA', 'Kovacs Kitti', 'underwearnurse@gmail.com', TO_DATE('2003 9 29', 'yyyy mm dd'), '6800 Hodmezovasarhely, Nagy utca 49 .', 960335362003647116547344);
INSERT INTO Vasarlo VALUES( '11', 'ourselveschortle', 'PnCUcWw2Z', 'Varga Patrik', 'ourselveschortle@gmail.com', TO_DATE('1960 5 18', 'yyyy mm dd'), '8000 Szekesfehervar, Budapesti utca 60 .', 776120930951365190226349);
INSERT INTO Vasarlo VALUES( '12', 'recapeveryone', 'QkPavee74', 'Varadi Peter', 'recapeveryone@gmail.com', TO_DATE('1968 5 12', 'yyyy mm dd'), '4025 Debrecen, Feher utca 98 .', 394950283008567067703281);
INSERT INTO Vasarlo VALUES( '13', 'multishotprideful', 'kekRSK9aU', 'Szucs Zsolt', 'multishotprideful@gmail.com', TO_DATE('1965 6 10', 'yyyy mm dd'), '3500 Miskolc, Nagy utca 22 .', 864737204626765924318124);
INSERT INTO Vasarlo VALUES( '14', 'owlprinciple', 'LYCrBBu4s', 'Sipos Kristof', 'owlprinciple@gmail.com', TO_DATE('1995 2 14', 'yyyy mm dd'), '5800 Mezokovacshaza, Debreceni utca 95 .', 827306807922703214386662);
INSERT INTO Vasarlo VALUES( '15', 'sowndercomplex', 'GU9B4CQpe', 'Gal Dorina', 'sowndercomplex@gmail.com', TO_DATE('1972 3 19', 'yyyy mm dd'), '6821 Szekkutas, Kossuth utca 12 .', 145011213928500613222695);
INSERT INTO Vasarlo VALUES( '16', 'contractgrumble', 'BxkWt28Ds', 'Takacs Bence', 'contractgrumble@gmail.com', TO_DATE('1966 12 18', 'yyyy mm dd'), '8000 Szekesfehervar, Nyar utca 2 .', 582067801142348576899066);
INSERT INTO Vasarlo VALUES( '17', 'moldovandrab', 'Afe5BqWft', 'Virag Dora', 'moldovandrab@gmail.com', TO_DATE('1965 5 2', 'yyyy mm dd'), '6500 Baja, Virag utca 16 .', 247215111877398339372799);
INSERT INTO Vasarlo VALUES( '18', 'limesvest', 'gqjuPydpK', 'Kozma Dora', 'limesvest@gmail.com', TO_DATE('1989 9 12', 'yyyy mm dd'), '8230 Balatonfured, Nap utca 42 .', 436938540539541756672520);
INSERT INTO Vasarlo VALUES( '19', 'ourselveschortle', 'U369WAn8f', 'Olah Dorina', 'ourselveschortle@gmail.com', TO_DATE('2003 10 30', 'yyyy mm dd'), '5310 Kisujszallas, Nagy utca 98 .', 840421519552605484829307);
INSERT INTO Vasarlo VALUES( '20', 'sandalschimpanzee', 'PSw9uqSV2', 'Virag Krisztian', 'sandalschimpanzee@gmail.com', TO_DATE('2004 12 24', 'yyyy mm dd'), '5900 Oroshaza, Alkotmany utca 71 .', 191843789696683096029198);
INSERT INTO Vasarlo VALUES( '21', 'sandalschimpanzee', 'LfqXNx8Nu', 'Hajdu Kristof', 'sandalschimpanzee@gmail.com', TO_DATE('1960 6 14', 'yyyy mm dd'), '4246 Nyiregyhaza, Szelso utca 10 .', 593885185850001742715956);
INSERT INTO Vasarlo VALUES( '22', 'noseypace', 'RqYZSFF8u', 'Farkas David', 'noseypace@gmail.com', TO_DATE('1967 5 23', 'yyyy mm dd'), '5800 Mezokovacshaza, Retek utca 2 .', 716089925412445525486925);
INSERT INTO Vasarlo VALUES( '23', 'apricotsamazing', 'tfCTAXWdk', 'Takacs Blanka', 'apricotsamazing@gmail.com', TO_DATE('1971 4 4', 'yyyy mm dd'), '2800 Tatbanya, Boglar utca 16 .', 172657248498385221787861);
INSERT INTO Vasarlo VALUES( '24', 'habitatwork', 'ptL9brEfW', 'Kozma Lilla', 'habitatwork@gmail.com', TO_DATE('1960 11 17', 'yyyy mm dd'), '5744 Kevermes, Fa utca 90 .', 747381549890730048433396);
INSERT INTO Vasarlo VALUES( '25', 'thymeroad', '89QGBx2td', 'Deak Fanni', 'thymeroad@gmail.com', TO_DATE('1976 12 9', 'yyyy mm dd'), '9000 Gyor, Debreceni utca 40 .', 875970323698574799901263);
INSERT INTO Vasarlo VALUES( '26', 'uneasinessgroovy', 'XATb7YRpw', 'Bognar Peter', 'uneasinessgroovy@gmail.com', TO_DATE('1996 10 7', 'yyyy mm dd'), '5920 Csorvas, Petofi Sandor utca 7 .', 716089925412445525486925);
INSERT INTO Vasarlo VALUES( '27', 'trampolinemess', 'wzZsFNrwW', 'Simon Dorottya', 'trampolinemess@gmail.com', TO_DATE('1966 6 6', 'yyyy mm dd'), '9000 Gyor, Szechenyi utca 2 .', 426149236094501950168639);
INSERT INTO Vasarlo VALUES( '28', 'punchminiskirt', 'DQAfaVPSS', 'Pasztor Attila', 'punchminiskirt@gmail.com', TO_DATE('1989 1 22', 'yyyy mm dd'), '8600 Siofok, Alkotmany utca 12 .', 241712009287915918279864);
INSERT INTO Vasarlo VALUES( '29', 'ourselveschortle', 'kXGkN74mJ', 'Fazekas Csaba', 'ourselveschortle@gmail.com', TO_DATE('1995 4 26', 'yyyy mm dd'), '3500 Miskolc, Retek utca 86 .', 631092383051797995804255);
INSERT INTO Vasarlo VALUES( '30', 'chamoisfennel', 'ayx3ZvUqs', 'Bognar Martin', 'chamoisfennel@gmail.com', TO_DATE('1974 6 13', 'yyyy mm dd'), '8230 Balatonfured, Damjanich utca 20 .', 435772195818612759287889);
INSERT INTO Vasarlo VALUES( '31', 'jadedski', 'HNaaDKfX4', 'Katona Dorina', 'jadedski@gmail.com', TO_DATE('1998 7 4', 'yyyy mm dd'), '3500 Miskolc, Budapesti utca 20 .', 705345159402634221726803);
INSERT INTO Vasarlo VALUES( '32', 'aloofbrighton', 'ugq3FLBdU', 'Lengyel Mate', 'aloofbrighton@gmail.com', TO_DATE('1975 6 30', 'yyyy mm dd'), '3500 Miskolc, Csaba utca 69 .', 485317067787950957547264);
INSERT INTO Vasarlo VALUES( '33', 'shredresolution', 'gPtJvqnpH', 'Antal Vanessza', 'shredresolution@gmail.com', TO_DATE('1993 12 24', 'yyyy mm dd'), '4246 Nyiregyhaza, Jozsef Attila utca 67 .', 452116402817092066590382);
INSERT INTO Vasarlo VALUES( '34', 'marvelouspeplum', 'THD2uLmyB', 'Orsos Eszter', 'marvelouspeplum@gmail.com', TO_DATE('1965 6 19', 'yyyy mm dd'), '5500 Gyomaendrod, Budapesti utca 92 .', 426149236094501950168639);
INSERT INTO Vasarlo VALUES( '35', 'babyishpoor', 'h2Zej9aDg', 'Sipos Judit', 'babyishpoor@gmail.com', TO_DATE('1998 3 9', 'yyyy mm dd'), '3500 Miskolc, Fo utca 72 .', 851428828690315537655727);
INSERT INTO Vasarlo VALUES( '36', 'nuclearthinkable', 'zuYZheS23', 'Horvath Renata', 'nuclearthinkable@gmail.com', TO_DATE('1999 8 27', 'yyyy mm dd'), '5310 Kisujszallas, Nagy utca 90 .', 909012584780055288564627);
INSERT INTO Vasarlo VALUES( '37', 'crepehandsome', 'JdrzxjSk2', 'Budai Nora', 'crepehandsome@gmail.com', TO_DATE('1999 3 11', 'yyyy mm dd'), '5600 Bekescsaba, Virag utca 35 .', 915889605044850952832226);
INSERT INTO Vasarlo VALUES( '38', 'unicornanaconda', 'RCybJrGAe', 'Farkas Balint', 'unicornanaconda@gmail.com', TO_DATE('2000 3 25', 'yyyy mm dd'), '8600 Siofok, Imola utca 29 .', 143281365015570991551099);
INSERT INTO Vasarlo VALUES( '39', 'gracepretzels', 'qLjVSFhvy', 'Antal Tamas', 'gracepretzels@gmail.com', TO_DATE('1999 1 13', 'yyyy mm dd'), '9000 Gyor, Petofi Sandor utca 62 .', 318318532388368605026991);
INSERT INTO Vasarlo VALUES( '40', 'writablegucci', 'LVZgQzfnE', 'Varadi Bianka', 'writablegucci@gmail.com', TO_DATE('1966 8 4', 'yyyy mm dd'), '6500 Baja, Ezer utca 56 .', 864737204626765924318124);
INSERT INTO Vasarlo VALUES( '41', 'superiorresource', 'PugaTF8cF', 'Bogdan Balazs', 'superiorresource@gmail.com', TO_DATE('1995 8 16', 'yyyy mm dd'), '8200 Veszprem, Sziget utca 7 .', 669795664127573422025613);
INSERT INTO Vasarlo VALUES( '42', 'dewdefensive', 'Q5e5CLrzn', 'Budai Krisztina', 'dewdefensive@gmail.com', TO_DATE('2004 5 22', 'yyyy mm dd'), '8200 Veszprem, Vitez utca 32 .', 701781399172400337834541);
INSERT INTO Vasarlo VALUES( '43', 'disastertacky', '8UkqRueSq', 'Kozma Zoltan', 'disastertacky@gmail.com', TO_DATE('1995 9 6', 'yyyy mm dd'), '5920 Csorvas, Vitez utca 20 .', 394950283008567067703281);
INSERT INTO Vasarlo VALUES( '44', 'unfinishedsquish', 'NhWZMjyzu', 'Racz Zsanett', 'unfinishedsquish@gmail.com', TO_DATE('1990 9 26', 'yyyy mm dd'), '5743 Lokoshaza, Kis utca 22 .', 582067801142348576899066);
INSERT INTO Vasarlo VALUES( '45', 'definitejittery', 'HNaaDKfX4', 'Fodor Lili', 'definitejittery@gmail.com', TO_DATE('1978 10 18', 'yyyy mm dd'), '8000 Szekesfehervar, Sziget utca 72 .', 215625907874153499423486);
INSERT INTO Vasarlo VALUES( '46', 'claimcontest', '3HQsJcsGe', 'Boros Nora', 'claimcontest@gmail.com', TO_DATE('2001 1 15', 'yyyy mm dd'), '5744 Kevermes, Gala utca 56 .', 652088204187672049309624);
INSERT INTO Vasarlo VALUES( '47', 'trampolinemess', 'jm7Cp5cPT', 'Simon Fanni', 'trampolinemess@gmail.com', TO_DATE('1961 3 14', 'yyyy mm dd'), '6821 Szekkutas, Szelso utca 40 .', 421317747721343511457441);
INSERT INTO Vasarlo VALUES( '48', 'uneasinessgroovy', '2Qxafv2pT', 'Fulop Nora', 'uneasinessgroovy@gmail.com', TO_DATE('1993 10 8', 'yyyy mm dd'), '6723 Szeged, Szechenyi utca 95 .', 960335362003647116547344);
INSERT INTO Vasarlo VALUES( '49', 'collectiondevastated', 'v3nMtusDN', 'Vas Daniel', 'collectiondevastated@gmail.com', TO_DATE('1971 4 18', 'yyyy mm dd'), '2500 Esztergom, Ezer utca 90 .', 747381549890730048433396);
INSERT INTO Vasarlo VALUES( '50', 'powerabcd', '72GxpVqFt', 'Kovacs Dorottya', 'powerabcd@gmail.com', TO_DATE('1965 3 10', 'yyyy mm dd'), '2500 Esztergom, Nap utca 12 .', 851428828690315537655727);
INSERT INTO Vasarlo VALUES( '51', 'preventcatnip', 'b2yfJGefV', 'Simon Akos', 'preventcatnip@gmail.com', TO_DATE('1999 4 6', 'yyyy mm dd'), '7600 Pecs, Damjanich utca 44 .', 770166183310655318182672);
INSERT INTO Vasarlo VALUES( '52', 'steamsmock', 'jm7Cp5cPT', 'Szalai Balint', 'steamsmock@gmail.com', TO_DATE('1995 4 10', 'yyyy mm dd'), '5900 Oroshaza, Imola utca 70 .', 144768725958350966143866);
INSERT INTO Vasarlo VALUES( '53', 'moldovandrab', '72GxpVqFt', 'Nemeth Balint', 'moldovandrab@gmail.com', TO_DATE('1976 10 13', 'yyyy mm dd'), '2500 Esztergom, Imola utca 44 .', 400890099176516337028652);
INSERT INTO Vasarlo VALUES( '54', 'contractgrumble', 'ZUSvZ2QrB', 'Fekete Bianka', 'contractgrumble@gmail.com', TO_DATE('1995 5 18', 'yyyy mm dd'), '5920 Csorvas, Szelso utca 56 .', 776120930951365190226349);
INSERT INTO Vasarlo VALUES( '55', 'netherstamp', '3HQsJcsGe', 'Szilagyi Bence', 'netherstamp@gmail.com', TO_DATE('1972 2 15', 'yyyy mm dd'), '4246 Nyiregyhaza, Virag utca 17 .', 571794151101216738163462);
INSERT INTO Vasarlo VALUES( '56', 'euphoricmicrosoft', 'DXaefuXDm', 'Vincze Karina', 'euphoricmicrosoft@gmail.com', TO_DATE('1963 11 30', 'yyyy mm dd'), '4025 Debrecen, Nagy utca 55 .', 241712009287915918279864);
INSERT INTO Vasarlo VALUES( '57', 'shifthumburger', 'SC7z8hwzc', 'FabiĂˇn Eszter', 'shifthumburger@gmail.com', TO_DATE('1967 2 24', 'yyyy mm dd'), '5920 Csorvas, Petofi Sandor utca 83 .', 899192718538766779874753);
INSERT INTO Vasarlo VALUES( '58', 'crepehandsome', 'cyZHSUEYR', 'Virag Balint', 'crepehandsome@gmail.com', TO_DATE('1972 4 10', 'yyyy mm dd'), '6821 Szekkutas, Damjanich utca 3 .', 608200779257755668320309);
INSERT INTO Vasarlo VALUES( '59', 'bonkgrist', 'm8zwt3L8C', 'Pap Bianka', 'bonkgrist@gmail.com', TO_DATE('1998 1 17', 'yyyy mm dd'), '5600 Bekescsaba, Nyar utca 56 .', 616316828088139017892390);
INSERT INTO Vasarlo VALUES( '60', 'sportengineer', 'jRR8Zqy5b', 'Szabo Gerda', 'sportengineer@gmail.com', TO_DATE('1997 1 30', 'yyyy mm dd'), '5744 Kevermes, Csaba utca 40 .', 669795664127573422025613);
INSERT INTO Vasarlo VALUES( '61', 'definitejittery', 'NNPu8bafm', 'Fekete Lilla', 'definitejittery@gmail.com', TO_DATE('1960 8 18', 'yyyy mm dd'), '5700 Gyula, Bihari utca 51 .', 702697180692567384359106);
INSERT INTO Vasarlo VALUES( '62', 'longingmotherly', 'c7P97eYVz', 'Toth Laura', 'longingmotherly@gmail.com', TO_DATE('1969 10 30', 'yyyy mm dd'), '5743 Lokoshaza, Nap utca 82 .', 429993728860925469978490);
INSERT INTO Vasarlo VALUES( '63', 'powerabcd', 'UPHDW5qSR', 'Bognar Zsanett', 'powerabcd@gmail.com', TO_DATE('1996 11 2', 'yyyy mm dd'), '5743 Lokoshaza, Weores Sandor utca 98 .', 355014983129879078771633);
INSERT INTO Vasarlo VALUES( '64', 'profusebetter', 'AbNKCwFQA', 'Lengyel Judit', 'profusebetter@gmail.com', TO_DATE('1972 4 8', 'yyyy mm dd'), '2500 Esztergom, Szechenyi utca 16 .', 520019560958217118742123);
INSERT INTO Vasarlo VALUES( '65', 'ardentxebec', 'vjAkucEW5', 'Kelemen Szabolcs', 'ardentxebec@gmail.com', TO_DATE('1974 8 10', 'yyyy mm dd'), '5800 Mezokovacshaza, Bihari utca 32 .', 840421519552605484829307);
INSERT INTO Vasarlo VALUES( '66', 'bankerpenguin', 'zuDtSPEy3', 'Kozma Laszlo', 'bankerpenguin@gmail.com', TO_DATE('2000 5 22', 'yyyy mm dd'), '9000 Gyor, Nyar utca 10 .', 253472564125048270434022);
INSERT INTO Vasarlo VALUES( '67', 'veinedanybody', 'NqAg3fXgw', 'Kis Barbara', 'veinedanybody@gmail.com', TO_DATE('1975 9 7', 'yyyy mm dd'), '5600 Bekescsaba, Nap utca 89 .', 915460566182261566982703);
INSERT INTO Vasarlo VALUES( '68', 'apricotsamazing', 'AhUPjkbju', 'Gal Balazs', 'apricotsamazing@gmail.com', TO_DATE('1978 11 7', 'yyyy mm dd'), '1007 Budapest, Uj utca 55 .', 631092383051797995804255);
INSERT INTO Vasarlo VALUES( '69', 'skateboardlazaret', '3pkzJwkr7', 'Racz David', 'skateboardlazaret@gmail.com', TO_DATE('1993 8 7', 'yyyy mm dd'), '3500 Miskolc, Alkotmany utca 70 .', 863416984749505871025153);
INSERT INTO Vasarlo VALUES( '70', 'telescopealluring', '6Zk6hnWRM', 'Szilagyi Balazs', 'telescopealluring@gmail.com', TO_DATE('2004 8 5', 'yyyy mm dd'), '8200 Veszprem, Gala utca 90 .', 777814209802013246483099);

------------------------------------------------------------
Termekek tábla (Telefon és tv nélkül) feltöltése
------------------------------------------------------------

INSERT INTO Termek VALUES('1', 'P 30 Pro', 'Huawei', 71, 74767, 'Telefon');
INSERT INTO Termek VALUES('2', 'iPhone 13', 'Apple', 30, 67687, 'Telefon');
INSERT INTO Termek VALUES('3', 'iPhone 11 Mini', 'Apple', 83, 84307, 'Telefon');
INSERT INTO Termek VALUES('4', 'iPhone XR', 'Apple', 54, 10585, 'Telefon');
INSERT INTO Termek VALUES('5', 'Xperia 11', 'Sony', 21, 52547, 'Telefon');
INSERT INTO Termek VALUES('6', 'Galaxy A52', 'Samsung', 59, 24147, 'Telefon');
INSERT INTO Termek VALUES('7', 'Galaxy S20 Ultra', 'Samsung', 28, 23092, 'Telefon');
INSERT INTO Termek VALUES('8', 'Xperia 7', 'Sony', 98, 49848, 'Telefon');
INSERT INTO Termek VALUES('9', 'iPhone XS', 'Apple', 21, 82108, 'Telefon');
INSERT INTO Termek VALUES('10', 'Redmi Note 10 Lite', 'Xiaomi', 58, 42713, 'Telefon');
INSERT INTO Termek VALUES('11', 'Redmi Note 9', 'Xiaomi', 90, 56936, 'Telefon');
INSERT INTO Termek VALUES('12', '50', 'Honor', 68, 29588, 'Telefon');
INSERT INTO Termek VALUES('13', 'Redmi Note 10 S', 'Xiaomi', 85, 86056, 'Telefon');
INSERT INTO Termek VALUES('14', 'Redmi Note 10 Lite', 'Xiaomi', 71, 37399, 'Telefon');
INSERT INTO Termek VALUES('15', '9 Lite', 'Honor', 83, 13697, 'Telefon');
INSERT INTO Termek VALUES('16', 'Xperia 6', 'Sony', 59, 87064, 'Telefon');
INSERT INTO Termek VALUES('17', 'iPhone 12 Pro Max', 'Apple', 58, 12938, 'Telefon');
INSERT INTO Termek VALUES('18', 'P 50', 'Huawei', 36, 71366, 'Telefon');
INSERT INTO Termek VALUES('19', 'Redmi Note 9', 'Xiaomi', 6, 85179, 'Telefon');
INSERT INTO Termek VALUES('20', 'Xperia 7', 'Sony', 77, 50447, 'Telefon');

INSERT INTO Termek VALUES('21', 'UE55TU7022',  'Hitachi', 28, 55881, 'TV');
INSERT INTO Termek VALUES('22', '43UP75003LF', 'LG', 90, 85471, 'TV');
INSERT INTO Termek VALUES('23', 'QE55Q80AAT', 'Samsung', 41, 21709, 'TV');
INSERT INTO Termek VALUES('24', '55NANO753PR', 'LG', 98, 56808, 'TV');
INSERT INTO Termek VALUES('25', 'QE55Q70AAT', 'LG', 3, 20641, 'TV');
INSERT INTO Termek VALUES('26', 'QE65Q80AAT', 'Samsung', 68, 35418, 'TV');
INSERT INTO Termek VALUES('27', '55UP78003LB', 'Samsung', 32, 59790, 'TV');
INSERT INTO Termek VALUES('28', '55UP75003LF', 'LG', 42, 86136, 'TV');
INSERT INTO Termek VALUES('29', '65NANO753PR', 'Samsung', 85, 12325, 'TV');
INSERT INTO Termek VALUES('30', 'QE50Q60AAU', 'LG', 78, 14896, 'TV');
INSERT INTO Termek VALUES('31', '43UP78003LB', 'Philips', 83, 88160, 'TV');
INSERT INTO Termek VALUES('32', 'QE65Q60AAU', 'LG', 7, 56212, 'TV');
INSERT INTO Termek VALUES('33', '32LM6370PLA', 'Samsung', 98, 94052, 'TV');
INSERT INTO Termek VALUES('34', 'OLED55C12LA', 'Philips', 64, 56259, 'TV');
INSERT INTO Termek VALUES('35', '65UP76703LB', 'Panasonic', 76, 25640, 'TV');
INSERT INTO Termek VALUES('36', '50UP75003LF', 'Hitachi', 50, 99807, 'TV');
INSERT INTO Termek VALUES('37', '50A6BGLHGF', 'Hitachi', 13, 11376, 'TV');
INSERT INTO Termek VALUES('38', 'UE55AU71024', 'LG', 24, 57536, 'TV');
INSERT INTO Termek VALUES('39', 'UE43TU7022', 'Philips', 59, 71799, 'TV');
INSERT INTO Termek VALUES('40', 'UE32T40026K', 'Philips', 93, 54932, 'TV');

INSERT INTO Termek VALUES('41', 'competition', 'trck', 68, 36893, 'Mosogep');
INSERT INTO Termek VALUES('42', 'illustrate', 'sum', 43, 51842, 'Mosogep');
INSERT INTO Termek VALUES('43', 'sandwich', 'neutral', 29, 32945, 'Mosogep');
INSERT INTO Termek VALUES('44', 'track', 'behavior', 54, 24137, 'Mosogep');
INSERT INTO Termek VALUES('45', 'evoke', 'fill', 43, 65798, 'Mosogep');
INSERT INTO Termek VALUES('46', 'gem', 'view', 55, 85471, 'Mosogep');
INSERT INTO Termek VALUES('47', 'carpet', 'candle', 61, 96312, 'Mosogep');
INSERT INTO Termek VALUES('48', 'star', 'boom', 44, 51970, 'Mosogep');
INSERT INTO Termek VALUES('49', 'cutting', 'conductor', 78, 59082, 'Mosogep');
INSERT INTO Termek VALUES('50', 'posture', 'neutral', 24, 40155, 'Mosogep');
INSERT INTO Termek VALUES('51', 'spectrum', 'free', 90, 51279, 'Mosogep');
INSERT INTO Termek VALUES('52', 'rise', 'sex', 63, 52547, 'Mosogep');
INSERT INTO Termek VALUES('53', 'difference', 'performer', 9, 72422, 'Mosogep');
INSERT INTO Termek VALUES('54', 'lion', 'tempt', 73, 74885, 'Mosogep');
INSERT INTO Termek VALUES('55', 'dull', 'reluctance', 75, 72306, 'Mosogep');
INSERT INTO Termek VALUES('56', 'ankle', 'bind', 62, 40139, 'Mosogep');
INSERT INTO Termek VALUES('57', 'morale', 'discriminate', 43, 94710, 'Mosogep');
INSERT INTO Termek VALUES('58', 'smell', 'publicity', 41, 32945, 'Mosogep');
INSERT INTO Termek VALUES('59', 'heavy', 'carpet', 58, 10540, 'Mosogep');
INSERT INTO Termek VALUES('60', 'glacier', 'beneficiary', 11, 29349, 'Mosogep');
INSERT INTO Termek VALUES('61', 'frog', 'predator', 75, 16297, 'Horgaszbot');
INSERT INTO Termek VALUES('62', 'union', 'sex', 77, 9617, 'Horgaszbot');
INSERT INTO Termek VALUES('63', 'cotton', 'slide', 59, 32880, 'Horgaszbot');
INSERT INTO Termek VALUES('64', 'element', 'principle', 75, 34564, 'Horgaszbot');
INSERT INTO Termek VALUES('65', 'petty', 'repeat', 44, 56808, 'Horgaszbot');
INSERT INTO Termek VALUES('66', 'dynamic', 'surround', 62, 47682, 'Horgaszbot');
INSERT INTO Termek VALUES('67', 'worth', 'calorie', 29, 14750, 'Horgaszbot');
INSERT INTO Termek VALUES('68', 'gem', 'entry', 80, 68036, 'Horgaszbot');
INSERT INTO Termek VALUES('69', 'tongue', 'temple', 78, 65886, 'Horgaszbot');
INSERT INTO Termek VALUES('70', 'morale', 'pen', 34, 90884, 'Horgaszbot');
INSERT INTO Termek VALUES('71', 'thirsty', 'professional', 98, 83504, 'Horgaszbot');
INSERT INTO Termek VALUES('72', 'church', 'conscience', 88, 31117, 'Horgaszbot');
INSERT INTO Termek VALUES('73', 'tongue', 'enemy', 71, 8082, 'Horgaszbot');
INSERT INTO Termek VALUES('74', 'superior', 'circle', 98, 44601, 'Horgaszbot');
INSERT INTO Termek VALUES('75', 'accumulation', 'upset', 24, 77412, 'Horgaszbot');
INSERT INTO Termek VALUES('76', 'revolution', 'incongruous', 8, 41581, 'Horgaszbot');
INSERT INTO Termek VALUES('77', 'structure', 'market', 30, 65766, 'Horgaszbot');
INSERT INTO Termek VALUES('78', 'raid', 'star', 73, 69383, 'Horgaszbot');
INSERT INTO Termek VALUES('79', 'hesitate', 'cylinder', 73, 54364, 'Horgaszbot');
INSERT INTO Termek VALUES('80', 'slide', 'useful', 78, 96065, 'Horgaszbot');
INSERT INTO Termek VALUES('81', 'jail', 'cassette', 51, 13655, 'Grillsuto');
INSERT INTO Termek VALUES('82', 'conclusion', 'acquaintance', 54, 66998, 'Grillsuto');
INSERT INTO Termek VALUES('83', 'wind', 'judge', 84, 53940, 'Grillsuto');
INSERT INTO Termek VALUES('84', 'classroom', 'lecture', 55, 16297, 'Grillsuto');
INSERT INTO Termek VALUES('85', 'regulation', 'constituency', 29, 57449, 'Grillsuto');
INSERT INTO Termek VALUES('86', 'presentation', 'mail', 43, 8801, 'Grillsuto');
INSERT INTO Termek VALUES('87', 'pierce', 'courage', 85, 69765, 'Grillsuto');
INSERT INTO Termek VALUES('88', 'force', 'principle', 41, 39800, 'Grillsuto');
INSERT INTO Termek VALUES('89', 'sample', 'fill', 54, 85173, 'Grillsuto');
INSERT INTO Termek VALUES('90', 'disappear', 'haircut', 50, 66910, 'Grillsuto');
INSERT INTO Termek VALUES('91', 'behead', 'expect', 92, 49140, 'Grillsuto');
INSERT INTO Termek VALUES('92', 'slot', 'admit', 13, 42514, 'Grillsuto');
INSERT INTO Termek VALUES('93', 'maid', 'format', 71, 25461, 'Grillsuto');
INSERT INTO Termek VALUES('94', 'reluctance', 'worker', 98, 53208, 'Grillsuto');
INSERT INTO Termek VALUES('95', 'abridge', 'gravity', 46, 23638, 'Grillsuto');
INSERT INTO Termek VALUES('96', 'responsible', 'exception', 92, 44775, 'Grillsuto');
INSERT INTO Termek VALUES('97', 'belief', 'revolution', 64, 36231, 'Grillsuto');
INSERT INTO Termek VALUES('98', 'nest', 'shower', 79, 57433, 'Grillsuto');
INSERT INTO Termek VALUES('99', 'shout', 'drift', 32, 56519, 'Grillsuto');
INSERT INTO Termek VALUES('100', 'afford', 'midnight', 74, 34435, 'Grillsuto');
INSERT INTO Termek VALUES('101', 'explain', 'harass', 3, 15659, 'Kerekpar');
INSERT INTO Termek VALUES('102', 'enemy', 'activate', 90, 79117, 'Kerekpar');
INSERT INTO Termek VALUES('103', 'entry', 'heat', 77, 59082, 'Kerekpar');
INSERT INTO Termek VALUES('104', 'level', 'sheet', 71, 52351, 'Kerekpar');
INSERT INTO Termek VALUES('105', 'church', 'evoke', 63, 82254, 'Kerekpar');
INSERT INTO Termek VALUES('106', 'petty', 'contempt', 36, 49868, 'Kerekpar');
INSERT INTO Termek VALUES('107', 'exploration', 'lung', 72, 74885, 'Kerekpar');
INSERT INTO Termek VALUES('108', 'revise', 'haircut', 42, 50878, 'Kerekpar');
INSERT INTO Termek VALUES('109', 'taste', 'clean', 6, 79923, 'Kerekpar');
INSERT INTO Termek VALUES('110', 'sex', 'conductor', 62, 60872, 'Kerekpar');
INSERT INTO Termek VALUES('111', 'officer', 'church', 83, 82254, 'Kerekpar');
INSERT INTO Termek VALUES('112', 'stitch', 'afford', 15, 39827, 'Kerekpar');
INSERT INTO Termek VALUES('113', 'biology', 'bulb', 28, 13546, 'Kerekpar');
INSERT INTO Termek VALUES('114', 'option', 'average', 91, 40789, 'Kerekpar');
INSERT INTO Termek VALUES('115', 'staircase', 'exploration', 46, 8653, 'Kerekpar');
INSERT INTO Termek VALUES('116', 'option', 'publicity', 32, 14767, 'Kerekpar');
INSERT INTO Termek VALUES('117', 'union', 'jail', 63, 65968, 'Kerekpar');
INSERT INTO Termek VALUES('118', 'by', 'boom', 76, 87495, 'Kerekpar');
INSERT INTO Termek VALUES('119', 'force', 'nest', 88, 41435, 'Kerekpar');
INSERT INTO Termek VALUES('120', 'trustee', 'acquaintance', 8, 83594, 'Kerekpar');
INSERT INTO Termek VALUES('121', 'enemy', 'activate', 6, 24359, 'Parfum');
INSERT INTO Termek VALUES('122', 'wagon', 'motorist', 83, 15659, 'Parfum');
INSERT INTO Termek VALUES('123', 'trunk', 'cassette', 42, 15149, 'Parfum');
INSERT INTO Termek VALUES('124', 'magnitude', 'pride', 62, 88709, 'Parfum');
INSERT INTO Termek VALUES('125', 'preoccupation', 'performer', 86, 76831, 'Parfum');
INSERT INTO Termek VALUES('126', 'contain', 'maid', 24, 13543, 'Parfum');
INSERT INTO Termek VALUES('127', 'illustrate', 'we', 54, 95560, 'Parfum');
INSERT INTO Termek VALUES('128', 'responsible', 'deprive', 43, 45361, 'Parfum');
INSERT INTO Termek VALUES('129', 'official', 'sausage', 100, 74885, 'Parfum');
INSERT INTO Termek VALUES('130', 'contain', 'pen', 73, 70806, 'Parfum');
INSERT INTO Termek VALUES('131', 'insight', 'exception', 62, 82108, 'Parfum');
INSERT INTO Termek VALUES('132', 'braid', 'star', 90, 91680, 'Parfum');
INSERT INTO Termek VALUES('133', 'biology', 'judge', 58, 75659, 'Parfum');
INSERT INTO Termek VALUES('134', 'soup', 'union', 29, 37133, 'Parfum');
INSERT INTO Termek VALUES('135', 'drift', 'harass', 9, 75350, 'Parfum');
INSERT INTO Termek VALUES('136', 'slippery', 'difficult', 29, 70826, 'Parfum');
INSERT INTO Termek VALUES('137', 'concede', 'sausage', 58, 34435, 'Parfum');
INSERT INTO Termek VALUES('138', 'basketball', 'lot', 42, 31702, 'Parfum');
INSERT INTO Termek VALUES('139', 'calorie', 'fascinate', 92, 33342, 'Parfum');
INSERT INTO Termek VALUES('140', 'leg', 'effort', 98, 27619, 'Parfum');

------------------------------------------------------------
Telefon tábla feltöltése
------------------------------------------------------------
INSERT INTO Telefon VALUES( '1', 'LTPS', '1315x1672',2, 4, 1, 19);
INSERT INTO Telefon VALUES( '2', 'OLED', '2159x2132', 4, 4, 1, 24);
INSERT INTO Telefon VALUES( '3', 'TFT', '786x818', 2, 1, 16, 16);
INSERT INTO Telefon VALUES( '4', 'TN', '1030x2197', 8, 512, 512, 15);
INSERT INTO Telefon VALUES( '5', 'TFT', '845x1908', 4, 16, 64, 80);
INSERT INTO Telefon VALUES( '6', 'P-OLED', '1672x1929',4, 64, 512, 53);
INSERT INTO Telefon VALUES( '7', 'OLED', '2259x1401', 6, 64, 512, 10);
INSERT INTO Telefon VALUES( '8', 'LTPS', '2544x1262', 8, 12, 1, 87);
INSERT INTO Telefon VALUES( '9', 'LTPS', '2259x2462', 4, 12, 128, 50);
INSERT INTO Telefon VALUES( '10', 'AMOLED', '1513x2383', 6, 64, 32, 58);
INSERT INTO Telefon VALUES( '11', 'LTPS', '1216x1038', 2, 8, 4, 39);
INSERT INTO Telefon VALUES( '12', 'OLED', '1703x1737', 2, 3, 32, 49);
INSERT INTO Telefon VALUES( '13', 'LED', '2085x1485', 8, 64, 512, 58);
INSERT INTO Telefon VALUES( '14', 'TN', '1994x1506', 4, 8, 1, 98);
INSERT INTO Telefon VALUES( '15', 'AMOLED', '1787x920', 4, 1, 1, 37);
INSERT INTO Telefon VALUES( '16', 'TFT', '1154x1672', 8, 512, 32, 98);
INSERT INTO Telefon VALUES( '17', 'P-OLED', '2012x818', 4, 8, 1, 34);
INSERT INTO Telefon VALUES( '18', 'AMOLED', '1662x707', 4, 2, 8, 87);
INSERT INTO Telefon VALUES( '19', 'OLED', '825x1737', 8, 512, 4, 74);
INSERT INTO Telefon VALUES( '20', 'AMOLED', '1506x1183', 4, 1, 32, 74);

------------------------------------------------------------
TV tábla feltöltése
------------------------------------------------------------
INSERT INTO TV VALUES('21', 'QLED', '729x1439', 136, 80);
INSERT INTO TV VALUES('22', 'LCD', '1439x974', 117, 81);
INSERT INTO TV VALUES('23', 'LED', '1169x1540', 76, 116);
INSERT INTO TV VALUES('24', 'LCD', '1540x2159', 113, 122);
INSERT INTO TV VALUES('25', 'OLED', '1281x2033', 89, 68);
INSERT INTO TV VALUES('26', 'LCD', '1707x841', 122, 78);
INSERT INTO TV VALUES('27', 'LCD', '1183x924', 82, 99);
INSERT INTO TV VALUES('28', 'LCD', '1894x1554', 106, 73);
INSERT INTO TV VALUES('29', 'LCD', '2478x1938', 123, 105);
INSERT INTO TV VALUES('30', 'QLED', '786x1117', 77, 82);
INSERT INTO TV VALUES('31', 'LED', '1908x1431', 125, 136);
INSERT INTO TV VALUES('32', 'LCD', '1748x2085', 68, 73);
INSERT INTO TV VALUES('33', 'LED', '2227x1272', 123, 82);
INSERT INTO TV VALUES('34', 'LCD', '1117x1455', 99, 76);
INSERT INTO TV VALUES('35', 'OLED', '1748x2377', 81, 110);
INSERT INTO TV VALUES('36', 'LED', '1117x1197', 65, 136);
INSERT INTO TV VALUES('37', 'LCD', '1672x1183', 73, 90);
INSERT INTO TV VALUES('38', 'LCD', '974x1281', 133, 61);
INSERT INTO TV VALUES('39', 'LED', '1724x1270', 100, 64);
INSERT INTO TV VALUES('40', 'QLED', '1513x2256', 97, 80);

------------------------------------------------------------
Mosógép tábla feltöltése
------------------------------------------------------------
INSERT INTO Mosogep VALUES('41', 'A', 14.5, 3, 9);
INSERT INTO Mosogep VALUES('42', 'A', 16, 3, 1);
INSERT INTO Mosogep VALUES('43', 'A', 14.5, 3, 4);
INSERT INTO Mosogep VALUES('44', 'D', 11, 5, 3);
INSERT INTO Mosogep VALUES('45', 'D', 10, 3, 6);
INSERT INTO Mosogep VALUES('46', 'B', 8.5, 3, 4);
INSERT INTO Mosogep VALUES('47', 'A', 5, 3, 2);
INSERT INTO Mosogep VALUES('48', 'D', 8, 2, 6);
INSERT INTO Mosogep VALUES('49', 'C', 10.5, 9, 4);
INSERT INTO Mosogep VALUES('50', 'C', 14, 1, 8);
INSERT INTO Mosogep VALUES('51', 'C', 14, 5, 6);
INSERT INTO Mosogep VALUES('52', 'F', 9.5, 4, 7);
INSERT INTO Mosogep VALUES('53', 'B', 5, 4, 1);
INSERT INTO Mosogep VALUES('54', 'A', 18, 7, 10);
INSERT INTO Mosogep VALUES('55', 'D', 14, 7, 3);
INSERT INTO Mosogep VALUES('56', 'F', 13, 4, 4);
INSERT INTO Mosogep VALUES('57', 'B', 6, 8, 10);
INSERT INTO Mosogep VALUES('58', 'B', 5, 2, 8);
INSERT INTO Mosogep VALUES('59', 'B', 11, 7, 10);
INSERT INTO Mosogep VALUES('60', 'C', 9.5, 4, 9);

------------------------------------------------------------
Horgaszbot tábla feltöltése
------------------------------------------------------------
INSERT INTO Horgaszbot VALUES('61', 'Feeder', 4, 2, 1.30);
INSERT INTO Horgaszbot VALUES('62', 'Pontyozo', 4, 1, 3.46);
INSERT INTO Horgaszbot VALUES('63', 'Uszos', 4, 4, 6.66);
INSERT INTO Horgaszbot VALUES('64', 'Pontyozo', 8, 4, 6.66);
INSERT INTO Horgaszbot VALUES('65', 'Feeder', 7, 9, 1.30);
INSERT INTO Horgaszbot VALUES('66', 'Utazo', 3, 5, 4.12);
INSERT INTO Horgaszbot VALUES('67', 'Sosvizi', 3, 7, 3.93);
INSERT INTO Horgaszbot VALUES('68', 'Sosvizi', 5, 7, 3.93);
INSERT INTO Horgaszbot VALUES('69', 'Sosvizi', 1, 1, 6.66);
INSERT INTO Horgaszbot VALUES('70', 'Harcsazo', 1, 6, 2.55);
INSERT INTO Horgaszbot VALUES('71', 'Utazo', 6, 2, 6.35);
INSERT INTO Horgaszbot VALUES('72', 'Pergeto', 5, 7, 4.02);
INSERT INTO Horgaszbot VALUES('73', 'Pergeto', 4, 4, 4.02);
INSERT INTO Horgaszbot VALUES('74', 'Harcsazo', 1, 5, 6.60);
INSERT INTO Horgaszbot VALUES('75', 'Pontyozo', 9, 9, 3.93);
INSERT INTO Horgaszbot VALUES('76', 'Utazo', 6, 3, 5.30);
INSERT INTO Horgaszbot VALUES('77', 'Feeder', 9, 1, 0.77);
INSERT INTO Horgaszbot VALUES('78', 'Sosvizi', 9, 8, 6.35);
INSERT INTO Horgaszbot VALUES('79', 'Harcsazo', 4, 4, 7.38);
INSERT INTO Horgaszbot VALUES('80', 'Gyermek', 5, 2, 2.34);

------------------------------------------------------------
Grillsuto tábla feltöltése
------------------------------------------------------------
INSERT INTO Grillsuto VALUES('81', 'elektromos', 'Ontottvas', 66, 53);
INSERT INTO Grillsuto VALUES('82', 'faszen', 'Fa', 60, 22);
INSERT INTO Grillsuto VALUES('83', 'elektromos', 'Krom', 45, 60);
INSERT INTO Grillsuto VALUES('84', 'elektromos', 'Acel', 63, 41);
INSERT INTO Grillsuto VALUES('85', 'gaz', 'Fa', 38, 22);
INSERT INTO Grillsuto VALUES('86', 'elektromos', 'Krom', 24, 53);
INSERT INTO Grillsuto VALUES('87', 'elektromos', 'Ontottvas', 42, 63);
INSERT INTO Grillsuto VALUES('88', 'gaz', 'Acel', 47, 65);
INSERT INTO Grillsuto VALUES('89', 'faszen', 'Acel', 38, 23);
INSERT INTO Grillsuto VALUES('90', 'elektromos', 'Krom', 23, 43);
INSERT INTO Grillsuto VALUES('91', 'elektromos', 'Acel', 63, 37);
INSERT INTO Grillsuto VALUES('92', 'elektromos', 'Krom', 22, 42);
INSERT INTO Grillsuto VALUES('93', 'faszen', 'Acel', 49, 66);
INSERT INTO Grillsuto VALUES('94', 'faszen', 'Fa', 24, 60);
INSERT INTO Grillsuto VALUES('95', 'gaz', 'Krom', 23, 37);
INSERT INTO Grillsuto VALUES('96', 'gaz', 'Ontottvas', 75, 56);
INSERT INTO Grillsuto VALUES('97', 'faszen', 'Krom', 42, 60);
INSERT INTO Grillsuto VALUES('98', 'faszen', 'Ontottvas', 24, 24);
INSERT INTO Grillsuto VALUES('99', 'elektromos', 'Fa', 23, 72);
INSERT INTO Grillsuto VALUES('100', 'faszen', 'Ontottvas', 75, 47);

------------------------------------------------------------
Kerekpar tábla feltöltése
------------------------------------------------------------
INSERT INTO Kerekpar VALUES('101', 'Trekking', 'Gyermek', 'Acel', 'XXL');
INSERT INTO Kerekpar VALUES('102', 'City', 'Noi', 'Aluminium', 'XS');
INSERT INTO Kerekpar VALUES('103', 'Fixi', 'Gyermek', 'Acel', 'M');
INSERT INTO Kerekpar VALUES('104', 'Osszecsukhato', 'Gyermek', 'Acel', 'M');
INSERT INTO Kerekpar VALUES('105', 'Orszaguti', 'Noi', 'Aluminium', 'L');
INSERT INTO Kerekpar VALUES('106', 'BMX', 'Gyermek', 'Karbon', 'L');
INSERT INTO Kerekpar VALUES('107', 'BMX', 'Noi', 'Magnezium', 'M');
INSERT INTO Kerekpar VALUES('108', 'Fixi', 'Noi', 'Magnezium', 'M');
INSERT INTO Kerekpar VALUES('109', 'Osszecsukhato', 'Gyermek', 'Karbon', 'XL');
INSERT INTO Kerekpar VALUES('110', 'Tricikli', 'Ferfi', 'Magnezium', 'L');
INSERT INTO Kerekpar VALUES('111', 'Orszaguti', 'Ferfi', 'Karbon', 'XS');
INSERT INTO Kerekpar VALUES('112', 'Osszecsukhato', 'Noi', 'Magnezium', 'S');
INSERT INTO Kerekpar VALUES('113', 'Tricikli', 'Ferfi', 'Acel', 'L');
INSERT INTO Kerekpar VALUES('114', 'Osszecsukhato', 'Gyermek', 'Karbon', 'S');
INSERT INTO Kerekpar VALUES('115', 'Osszecsukhato', 'Noi', 'Aluminium', 'XL');
INSERT INTO Kerekpar VALUES('116', 'Orszaguti', 'Ferfi', 'Aluminium', 'L');
INSERT INTO Kerekpar VALUES('117', 'Osszecsukhato', 'Ferfi', 'Acel', 'XXL');
INSERT INTO Kerekpar VALUES('118', 'BMX', 'Noi', 'Acel', 'XS');
INSERT INTO Kerekpar VALUES('119', 'Trekking', 'Ferfi', 'Magnezium', 'L');
INSERT INTO Kerekpar VALUES('120', 'City', 'Noi', 'Karbon', 'L');

------------------------------------------------------------
Parfum tábla feltöltése
------------------------------------------------------------
INSERT INTO Parfum VALUES('121', 'Ferfi', 'Keleti');
INSERT INTO Parfum VALUES('122', 'Unisex', 'Citrusos');
INSERT INTO Parfum VALUES('123', 'Ferfi', 'Boros');
INSERT INTO Parfum VALUES('124', 'Unisex', 'Keleti');
INSERT INTO Parfum VALUES('125', 'Noi', 'Aromas');
INSERT INTO Parfum VALUES('126', 'Unisex', 'Viragos');
INSERT INTO Parfum VALUES('127', 'Ferfi', 'Viragos');
INSERT INTO Parfum VALUES('128', 'Ferfi', 'Fuszeres');
INSERT INTO Parfum VALUES('129', 'Noi', 'Citrusos');
INSERT INTO Parfum VALUES('130', 'Noi', 'Ciprusos');
INSERT INTO Parfum VALUES('131', 'Ferfi', 'Fas');
INSERT INTO Parfum VALUES('132', 'Noi', 'Viragos');
INSERT INTO Parfum VALUES('133', 'Ferfi', 'Aromas');
INSERT INTO Parfum VALUES('134', 'Ferfi', 'Fas');
INSERT INTO Parfum VALUES('135', 'Ferfi', 'Fas');
INSERT INTO Parfum VALUES('136', 'Unisex', 'Keleti');
INSERT INTO Parfum VALUES('137', 'Unisex', 'Viragos');
INSERT INTO Parfum VALUES('138', 'Unisex', 'Fuszeres');
INSERT INTO Parfum VALUES('139', 'Unisex', 'Fas');
INSERT INTO Parfum VALUES('140', 'Unisex', 'Fas');
