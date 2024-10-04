# FantaSito

Il presente applicativo è nato per gestire automaticamente un Fantagioco. Il tutto è altamente personalizzabile.
L'utilizzo è vincolato alla richiesta di un machine code e chiave di attivazione mediante una issue su GitHub.

### Installazione

L'installazione non è automatica. E' necessario seguire i passaggi:

1. Registrarsi ad un host web per ottenere uno spazio internet;
2. Caricare tramite FTP i file presenti in "release", in base alla versione;
3. Aprire PHPMYADMIN, e caricare il file fantasito.sql, che contiene la configurazione del database.
4. Al primo avvio, inserire la chiave di attivazione e chiave macchina ricevute;
5. Fare login con user e password "123";
6. Creare tutti gli account necessari ed ELIMINARE l'account di default.


### Aggiungi Lega / Interlega

Per limite software, deve essere fatto dagli admin, e non dai singoli giocatori.
I giocatori possono comunque aggiornare la propria squadra, se consentito dagli admin.


### Logging eventi

Per registrare gli avvenimenti, devi prima configurare il giorno. 
Recardi in "Gestisci Eventi", Registra, e compilare tutti i campi. Poi, premi "add record".

### Schermate

![Schermata Home](Docs/Img/Home.png "Home")
La prima schermata. Mostra,in ordine discendente cronologico, tutti gli "eventi" che possono dar luogo a 
bonus o malus. In alto, per una rapida visione, si possono vedere il punteggio e la posizione
propria e della propria lega


![Schermata Modifica](Docs/Img/Modifica.png "Modifica Squadra")
Consente di modificare la propria squadra (se consentito) e di vedere ciascun educatore quanti punti
ha ottenuto.


![Schermata Vedi Lega](Docs/Img/Vedi_Lega.png "Vedi Lega")
Consente di vedere la propria lega / interlega. Per limiti software, la lega / interlega
deve essere generata dagli admin.


![Schermata Lista Bonus Malus](Docs/Img/ListaBonusMalus.png "Lista Bonus/Malus")
Consente di vedere i bonus ed i malus, con le relative occorrenze.


![Schermata Aggiungi Bonus Malus](Docs/Img/AddBonusMalus.png "Aggiungi Bonus e Malus")
Consente di aggiungere un bonus o un malus associata ad un dato educatore.


![Schermata Gestione Eventi](Docs/Img/GestisciEventi.png "Gestisci Eventi")
Consente di inserire gli eventi che possono dar luogo a bonus e malus.


![Schermata Aggiungi Bonus Malus in dato Evento](Docs/Img/AddRecord.png "Aggiungi Evento Bonus o Malus")
Consente di registrare un bonus o malus ad un dato evento.