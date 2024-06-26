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