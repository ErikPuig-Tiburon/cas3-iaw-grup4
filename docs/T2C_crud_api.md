# T2.C CRUD i logica PHP

## Index

1. Objectiu
2. Recursos principals
3. CRUD Alumnes
4. CRUD Material
5. CRUD Incidencies
6. Lloguer de portatils
7. Control per rol dins dels CRUD
8. Relacio directa amb la rubrica
9. Conclusio

## Objectiu

Demostrar que el projecte implementa els CRUD demanats per la rubrica i la gestio del lloguer de portatils.

## Recursos principals

| Recurs | Web | API |
| --- | --- | --- |
| Alumnes | `html/professorat/alumnes.php` | `html/api/alumnes.php` |
| Material | `html/professorat/material.php`, `material_create.php` | `html/api/material.php` |
| Incidencies | `html/professorat/incidencies.php` | `html/api/incidencies.php` |
| Assignacions | `html/professorat/assignacions.php` | `html/api/assignacions.php` |

## CRUD Alumnes

Accions implementades:

- consultar
- crear
- modificar
- eliminar

Evidencies web:

- llistat amb cerca
- formulari d'alta
- edicio d'un alumne
- boto d'eliminacio

## CRUD Material

Accions implementades:

- consultar
- crear
- modificar
- eliminar

Evidencies web:

- alta a `material_create.php`
- llistat filtrable a `material.php`
- edicio de dades de material
- eliminacio controlada

## CRUD Incidencies

Accions implementades:

- consultar
- crear
- modificar
- eliminar

Evidencies web:

- alta d'incidencia
- canvi d'estat
- tancament rapid
- eliminacio

## Lloguer de portatils

La rubrica separa aquest bloc, per tant es defensa a part.

Accions implementades:

- crear assignacio
- tancar/modificar devolucio
- eliminar assignacio

Evidencia principal:

```text
html/professorat/assignacions.php
```

## Control per rol dins dels CRUD

- el professorat pot modificar
- l'alumnat nomes consulta el seu panell
- totes les operacions sensibles passen per autenticacio i CSRF

## Relacio directa amb la rubrica

| Criteri | Resultat |
| --- | --- |
| CRUD Alumnes | 4 accions |
| CRUD Material | 4 accions |
| CRUD Incidencies | 4 accions |
| Lloguer de portatils | crear, modificar/tancar i eliminar |

## Conclusio

Els quatre criteris funcionals principals de T2.C queden coberts tant a nivell web com a nivell API, amb evidencies clares i demostrables durant la defensa.
