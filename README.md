# CAS3 IAW - Gestio de material Institut Montsia

Aplicacio web PHP sense frameworks per gestionar alumnat, material, assignacions de portatils i incidencies del centre. El projecte funciona sobre Apache, PHP 8.2, MariaDB i Docker, i publica tant una interfície web com una API JSON.

## Index

1. Objectiu del projecte
2. Funcionalitats principals
3. Relacio directa amb la rubrica
4. Estructura del repositori
5. Arrencada amb Docker
6. Comptes de prova
7. Documentacio del projecte
8. phpDocumentor
9. Conclusions

## Objectiu del projecte

El sistema resol una necessitat real del centre:

- mantenir un inventari de dispositius
- assignar material a alumnat
- gestionar devolucions o tancaments de prestec
- registrar incidencies obertes i tancades
- limitar l'acces segons el rol de professorat o alumnat

La carpeta activa i publicada per Apache es `html/`.

## Funcionalitats principals

- Login amb sessions PHP i regeneracio segura de sessio.
- Rols `PROFESSOR` i `ALUMNE`.
- Control d'acces a nivell web i API.
- Formularis protegits amb CSRF.
- CRUD web d'alumnes.
- CRUD web de material.
- CRUD web d'incidencies.
- Gestio d'assignacions de portatils: crear, tancar i eliminar.
- Panell d'alumnat amb consulta dels seus dispositius i incidencies.
- API JSON amb endpoints `GET`, `POST`, `PUT` i `DELETE`.
- Documentacio automatica amb phpDocumentor.
- Interficie responsive amb vistes separades i CSS propi.

## Relacio directa amb la rubrica

| Criteri de la rubrica | Estat al projecte | Evidencia principal |
| --- | --- | --- |
| CRUD Alumnes | Complet, 4 accions | `html/professorat/alumnes.php` |
| CRUD Material | Complet, 4 accions | `html/professorat/material.php` i `html/professorat/material_create.php` |
| CRUD Incidencies | Complet, 4 accions | `html/professorat/incidencies.php` |
| Control de rols i acces | Funcional | `html/includes/auth.php`, `html/errors/403.php` |
| Lloguer de portatils | Crear, modificar/tancar i eliminar | `html/professorat/assignacions.php` |
| Documentacio | Webgrafia descriptiva i codi documentat | `docs/` i `html/phpdoc/` |
| Estructura, extres i atractiu visual | Complert | arquitectura per capes, API JSON, phpDocumentor, UI orbital responsive |

## Estructura del repositori

```text
cas3-iaw/
  docker-compose.yml
  Dockerfile
  phpdoc.xml
  README.md
  PROJECT_CONTEXT.md
  apache/
  docs/
  sql/
  html/
    index.php
    login.php
    logout.php
    professorat/
    alumnat/
    api/
    includes/
    views/
    assets/
    errors/
    phpdoc/
```

## Arrencada amb Docker

```bash
cd /var/www/html/cas3-iaw
docker compose up -d --build
```

Serveis disponibles:

```text
Web HTTP:    http://localhost/
Web HTTPS:   https://localhost/
Login:       https://localhost/login.php
Professorat: https://localhost/professorat/index.php
Alumnat:     https://localhost/alumnat/index.php
Health API:  https://localhost/api/health.php
phpMyAdmin:  http://localhost:8080
phpDoc:      https://localhost/phpdoc/
```

El certificat HTTPS es autofirmat; el navegador pot demanar confirmacio.

## Comptes de prova

Comptes per defecte:

```text
professor@iesmontsia.org / professor123
alumne@institutmontsia.cat / alumne123
```

El login principal consulta la taula `Usuaris`. Les variables `API_*` es mantenen com a fallback d'entorn.

## Variables d'entorn importants

```bash
DB_HOST=institut_montsia
DB_NAME=institut_montsia
DB_USER=Grup4
DB_PASSWORD=1234

MARIADB_ROOT_PASSWORD=root1234
MARIADB_DATABASE=institut_montsia
MARIADB_USER=Grup4
MARIADB_PASSWORD=1234
```

Per frontend extern:

```bash
ALLOWED_ORIGINS=https://ip-o-domini-frontend
SESSION_SAMESITE=None
SESSION_SECURE=1
```

Per treball local simple:

```bash
SESSION_SAMESITE=Lax
SESSION_SECURE=0
```

## API

```text
POST /api/auth/login.php
GET  /api/auth/me.php
POST /api/auth/logout.php

GET|POST|PUT|DELETE /api/alumnes.php
GET|POST|PUT|DELETE /api/material.php
GET|POST|PUT|DELETE /api/incidencies.php
GET|POST|PUT|DELETE /api/assignacions.php
GET /api/options.php
GET /api/health.php
```

Per a `POST`, `PUT` i `DELETE` cal enviar el token CSRF de la sessio.

## phpDocumentor

Generacio:

```bash
docker run --rm -v "$PWD":/data -w /data phpdoc/phpdoc:3 -c phpdoc.xml
```

Sortida:

```text
html/phpdoc/
```

Index principal:

```text
https://localhost/phpdoc/
```

## Conclusions

El projecte cobreix els punts importants de la rubrica amb evidencies clares al codi i a la documentacio:

- CRUD complets en alumnes, material i incidencies
- rols i control d'acces funcionals
- assignacio, tancament i eliminacio de lloguers de portatils
- arquitectura ordenada per capes
- codi comentat i documentat amb phpDocumentor
- interfície visual treballada i responsive

Com a extres, el projecte afegeix una API JSON, una documentacio HTML navegable, una capa visual moderna i una separacio neta entre controladors, vistes, helpers i base de dades.
