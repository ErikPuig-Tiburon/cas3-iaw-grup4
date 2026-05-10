# DOC.2 Memoria tecnica del projecte CAS3

## Index

1. Introduccio
2. Objectiu del sistema
3. Arquitectura
4. Base de dades
5. Seguretat i control d'acces
6. Funcionalitats i relacio amb la rubrica
7. Frontend i usabilitat
8. Funcionalitats extres
9. Conclusions
10. Webgrafia descriptiva

## 1. Introduccio

El projecte CAS3 resol la gestio de material informatic d'un centre educatiu. La necessitat principal es controlar qui te cada dispositiu, quin material esta disponible i quines incidencies estan obertes o tancades.

## 2. Objectiu del sistema

Els objectius implementats son:

- inventariar material
- administrar alumnat
- registrar incidencies
- fer assignacions i devolucions de portatils
- separar permisos de professorat i alumnat
- documentar el projecte i el codi

## 3. Arquitectura

S'ha seguit una arquitectura de tres capes:

1. Presentacio: `html/views/` + `html/assets/`
2. Lògica: `html/professorat/`, `html/alumnat/`, `html/api/`, `html/includes/`
3. Dades: MariaDB amb scripts a `sql/`

Tecnologies:

- Apache
- PHP 8.2
- MariaDB
- Docker Compose
- phpMyAdmin
- phpDocumentor

## 4. Base de dades

El model relacional inclou:

- `Alumnes`
- `Material`
- `TipusMaterial`
- `Ubicacions`
- `Assignacions`
- `Incidencies`
- `Estats`
- `Usuaris`

Els scripts de creacio i poblament son:

```text
sql/init.sql
sql/insert_dades.sql
```

## 5. Seguretat i control d'acces

El projecte compleix aquest apartat amb mesures reals:

- autenticacio amb sessions PHP
- rols `PROFESSOR` i `ALUMNE`
- guards `require_web_professor()` i `require_web_student()`
- pagines `403` i `404`
- tokens CSRF en formularis POST
- consultes PDO preparades
- HTTPS amb certificat autofirmat

Aquest punt correspon directament a la rubrica de control de rols i control d'acces funcional.

## 6. Funcionalitats i relacio amb la rubrica

### 6.1 CRUD Alumnes

Implementacio:

- consultar: llistat i cerca
- crear: alta d'alumnes
- modificar: edicio d'un alumne
- eliminar: baixa controlada

Evidencia:

```text
html/professorat/alumnes.php
html/api/alumnes.php
```

### 6.2 CRUD Material

Implementacio:

- consultar: llistat filtrable
- crear: alta de nou material
- modificar: edicio de dades i ubicacio
- eliminar: eliminacio amb control d'errors

Evidencia:

```text
html/professorat/material.php
html/professorat/material_create.php
html/api/material.php
```

### 6.3 CRUD Incidencies

Implementacio:

- consultar: obertes i historial
- crear: alta d'incidencia
- modificar: canvi d'estat i data
- eliminar: esborrat

Evidencia:

```text
html/professorat/incidencies.php
html/api/incidencies.php
```

### 6.4 Lloguer de portatils

Implementacio:

- crear assignacions
- tancar o modificar devolucions
- eliminar assignacions

Evidencia:

```text
html/professorat/assignacions.php
html/api/assignacions.php
```

### 6.5 Documentacio

Es compleix amb:

- README general
- documentacio per tasques
- memoria tecnica
- guia d'exposicio
- phpDocumentor generat a `html/phpdoc/`
- comentaris de funcions i fitxers

## 7. Frontend i usabilitat

La interfície ha estat treballada per diferenciar-se d'una sortida basica:

- tema visual orbital
- dashboard de professorat
- panell d'alumnat
- sidebar de navegacio
- disseny responsive
- vistes separades del backend

Aquest bloc ajuda a defensar l'apartat de treball visualment atractiu i ben estructurat.

## 8. Funcionalitats extres

Extres no estrictament minims de l'enunciat:

- API JSON funcional
- phpMyAdmin per verificacio de dades
- phpDocumentor publicat
- dashboard amb estadistiques
- filtres de llistats
- control d'usuaris a la taula `Usuaris`

## 9. Conclusions

El projecte arriba a una solucio completa i defensable davant la rubrica:

- tots els CRUD principals estan resolts
- el control de rols es funcional
- el lloguer de portatils no nomes es crea, sino que es pot tancar i esborrar
- la documentacio es suficient per explicar el projecte tecnicament
- la presentacio del treball es clara, estructurada i visualment cuidada

## 10. Webgrafia descriptiva

| Font | Descripcio de l'us |
| --- | --- |
| [PHP Manual](https://www.php.net/docs.php) | Referencia per sessions, PDO, `password_hash()`, `password_verify()` i gestio de formularis. |
| [MariaDB Documentation](https://mariadb.com/docs/) | Suport per modelar consultes SQL, claus externes i sintaxi compatible amb el projecte. |
| [MDN Web Docs](https://developer.mozilla.org/) | Referencia per HTML semàntic, CSS Grid, Flexbox, accessibilitat i responsive design. |
| [OWASP Top 10](https://owasp.org/www-project-top-ten/) | Marc general per justificar proteccions contra CSRF, control d'acces i tractament segur d'entrada/sortida. |
| [phpDocumentor](https://docs.phpdoc.org/) | Documentacio oficial per generar la documentacio HTML del codi PHP del projecte. |
| [Docker Docs](https://docs.docker.com/) | Referencia per contenidors, volums, xarxes i desplegament amb Docker Compose. |
