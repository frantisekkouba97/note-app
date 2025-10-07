# Note App — jednoduchá správa poznámek

Tato ukázková aplikace umožňuje vytvářet, upravovat a mazat poznámky s prioritou (Nízká / Střední / Vysoká). Administrace je postavena na EasyAdmin, přihlášení je jednoduché (testovací účet níže) a styly zajišťuje Bootstrap. Projekt je dockerizovaný (PHP 8.3, Nginx, MariaDB).

## Lokální běh přes Docker (PHP 8.3 + MariaDB + Nginx)

- Předpoklady: Docker a Docker Compose v2
- Spuštění:
  1. docker compose build --pull
  2. docker compose up -d
  3. Instalace závislostí: 
     - docker compose exec php composer install
  4. Puštění migrace:
     - docker compose exec php php bin/console doctrine:migrations:migrate -n
  5. Aplikace poběží na: http://localhost:8080

Testovací přihlašovací údaje: admin / admin

## Poznámky k implementaci

- Administrace: EasyAdmin Bundle řeší většinu běžných potřeb pro správu entit a umožňuje snadné rozšiřování a úpravy.
- Stylování: Bootstrap.
