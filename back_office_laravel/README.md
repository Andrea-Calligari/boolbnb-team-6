# Dopo aver clonato lanciare
- npm i
- composer install
- cp .env.example .env 
- php artisan key:generate

## AVVIARE SEVER
- php artisan serve  
### IN UN SECONSO TERMINALE
- npm run dev

## CMD crezione CRUD
- php artisan make:model NomeSingolarePrimaLetteraMaiuscola -a

cancellare controller se nella cartella sbagliata
- php artisan make:controller cartellaGiusta/PageController -r --model=ModelName




## TASKS - TECNICI
 - ### (RT1) Client-side Validation 
    - Studiare documentazione per validazione lato client (Front-office) \ (Back-office)

 - ### (RT2) Salvataggio informazioni geografiche 

 - ### (RT3) Sistema di Pagamento 
    - Dopo aver studiato e capito i metodi di pagamento Braintree gestire il sistema di pagamento (Front-office) \ (Back-office)
 - ### (RT4) Il sito è responsive 
    - ~~Installare il framework che gestisce anche gia la reattività del sito. (Bootstrap)~~

 - ### (RT5) La ricerca degli appartamenti nella pagina dedicata e l’applicazione dei filtri avvengono senza il refresh della pagina.
    - Capire come gestire i filtri sugli appartamenti senza il refresh della pagina , vedendo la documentazione


# _NB : IL SITO DEVE ESSERE RESPONSIVE_

## TASKS - FUNZIONALI

 - ### Concretizzare il DB su PhpMyAdmn (Back-office)
     - Stabilire le relazioni tra le tabelle
     - Editare Migration, Seeder e Request --tabella Users 
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Apartments  
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Services 
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Categories 
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Promotions
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Messages
     - Creare Seeders,Migrations, Request e Model(vuoto) --tabella Views
     - Creare Migrations tabella pivot -- apartment_service --

   - #### RELAZIONI TABELLE 
    - Apartments->Services = Many to Many 
    - Apartments->Views = One to Many
    - Apartments->Messages = One to Many
    - Apartments->Categories = One to Many
    - Apartments->Users = One to Many
    - Apartments->promotion = One to Many





 - ### (RF1) Permettere ai proprietari di appartamento di registrarsi alla piattaforma
     - Editare la pagina di log-in con i nuovi parametri (Back-office)
  
 - ### (RF2) Permettere ai proprietari di appartamento registrati di aggiungere un  appartamento alla piattaforma 
    - Creare l' Admin\ApartmentsController  e quindi creare la C.R.U.D degli appartamenti (Back-office)

 - ### (RF3) Permettere ai visitatori di ricercare un appartamento 
    - Studiare TomTom [https://developer.tomtom.com/]
    - Studiare come gestire l'API sul filtro di ricerca. (Al cambiare del valore di input cambia un pezzo di query). (Back-office)
    - Creare Home-Page e form per la richiesta (Front-office)

 - ### (RF4) Permettere ai visitatori di vedere i dettagli di un appartamento 
    - Creare la pagina index e Show (Front-office)
    - Nella vista Show implementare la visualizzazione della location sulla mini-mappa della card (Front-office)

 - ### (RF5) Permettere ai visitatori di scrivere al proprietario di un appartamento per chiedere informazioni 
    - Nella vista Show aggiungere un OffCanvas con form per inviare il messaggio (Front-office)
    - Gestire il compilamento automatico della mail quando si scrive un messggio se un utente é registarto e loggato.

 - ### (RF6) Permettere ai proprietari di appartamento registrati di vedere i messaggi ricevuti 
    - Creare create form  dei messaggi e visualizzarli sulla Dashbord come storico messaggi (Back-office)

 - ### (RF7) Permettere ai proprietari di appartamento registrati di sponsorizzare il proprio appartamento 
    - Studiare metodi di pagamento Braintree [https://www.braintreepayments.com/] Guida ->[https://blog.quickadminpanel.com/braintree-payments-in-laravel-the-ultimate-guide/] (Back-office)
    - Creare sezione promozioni nella dashboard (Back-office)

 - ### (RF8) Permettere ai proprietari di appartamento registrati di vedere statistiche dei propri appartamenti
    - Creare sezione statistiche nella dashboard (Back-office)


# _NB : IL SITO DEVE ESSERE RESPONSIVE_

## APPROCCIO  - Fare un branch Develop su cui lavorare indipendenti dal main e pubblicarlo su GitHub (NB : solo una persona puo' pubblicarlo)
  - Dal branch Develop si creano i branch dove si lavora in locale
  - Una volta sicuri del lavoro sul branch in locale si fa il rebase del Develop sul proprio branch
  - All'assenza di conflitti confrontarsi col team
  - Fare il merge sul branch Main
  - Eliminare il branch  locale
 
 # _NB : IL SITO DEVE ESSERE RESPONSIVE_

### LAYOUT
- HOME 
 - Creare una pagina home-welcome dove gli appartamenti con sponsorizzazione sono in primo piano
 - NAVBar
- HEADER

- FOOTER
- DASHBOARD
- PAGINA APPARTAMENTI 
   - index
   - show

- FORM (LOGIN-MESSAGGI-CREATE-PAGAMENTI ECC..)
- BOTTONI 
- VARIABLI
   - mixin 
   - : root


## NOMII DEL SITO SUGGERITI DA CHAT-GPT
   - StayHub *
   - RentEase *
   - HostHive
   - StaySavvy
   - HomeHarbor
   - StayWave *
   - StaySpark
   - NestQuest
   - StaySway
   - RoamBnB



## SEZIONE-BONUS

   - prenotazioni e  calendario 
   - preferiti 
   - recensioni 
   
