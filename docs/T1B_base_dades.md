# T1.B Base de dades, poblament i connexio

## Index

1. Objectiu
2. Implementacio
3. Taules principals
4. Connexio amb PHP
5. Relacio amb la rubrica
6. Evidencies
7. Conclusio

## Objectiu

Disposar d'una base de dades relacional preparada per als CRUD d'alumnes, material, incidencies, assignacions i usuaris.

## Implementacio

El projecte usa MariaDB en contenidor Docker i inicialitza les dades automàticament amb:

- `sql/init.sql`
- `sql/insert_dades.sql`

## Taules principals

- `Alumnes`
- `Material`
- `TipusMaterial`
- `Ubicacions`
- `Assignacions`
- `Incidencies`
- `Estats`
- `Usuaris`

## Connexio amb PHP

La connexio esta centralitzada a:

```text
html/includes/db.php
```

Caracteristiques:

- PDO
- `try/catch`
- consultes preparades
- lectura de credencials des de variables d'entorn

## Relacio amb la rubrica

Sense aquesta capa no seria possible defensar:

- CRUD d'alumnes
- CRUD de material
- CRUD d'incidencies
- lloguer de portatils
- rols amb taula `Usuaris`

## Evidencies

| Fitxer | Que demostra |
| --- | --- |
| `sql/init.sql` | Model relacional complet. |
| `sql/insert_dades.sql` | Dades inicials de prova. |
| `html/includes/db.php` | Connexio i helpers de consulta. |
| `html/includes/schema.php` | Mapa de taules i camps utilitzat a la API. |

## Conclusio

La base de dades dona suport directe a tots els CRUD, al control de rols i a la gestio de lloguers, de manera que es converteix en una de les evidencies centrals de la defensa.
