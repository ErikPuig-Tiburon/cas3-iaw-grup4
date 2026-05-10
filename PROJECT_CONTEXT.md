# PROJECT_CONTEXT.md

## Index

1. Resum curt
2. Objectiu funcional
3. Esquema de BD
4. Serveis del projecte
5. Carpetes rellevants
6. Decisions tecniques clau
7. Estat per rubrica
8. Conclusio

## Resum curt

Projecte CAS3 d'IAW desenvolupat amb PHP 8.2, Apache, MariaDB i Docker per gestionar material informatic, assignacions d'alumnat, incidencies i control d'acces per rols.

## Objectiu funcional

El sistema permet:

- crear, consultar, modificar i eliminar alumnes
- crear, consultar, modificar i eliminar material
- crear, consultar, modificar i eliminar incidencies
- assignar portatils o altres dispositius a alumnat
- tancar o eliminar assignacions de lloguer
- iniciar sessio com a professor o alumne
- restringir l'acces segons el rol

## Esquema de BD

```text
Alumnes(id, nom, cognom1, cognom2, correu, grupClasse)
Ubicacions(id, nom)
TipusMaterial(id, tipus, model, origen)
Material(id, idTipus, idInventari, etiquetaDepInf, numSerie, macEthernet, macWifi, SACE, dataAdquisicio, idUbicacio)
Assignacions(id, idMaterial, idAlumne, dataInici, dataFinal)
Estats(id, estat)
Incidencies(id, informacio, dataOberta, dataTancada, idAlumne, idDispositiu, idEstat)
Usuaris(id, nom, cognom1, cognom2, correu, contrasenya_hash, rol, idAlumne, actiu, creatEl)
```

## Serveis del projecte

```text
Web/API:   Apache + PHP 8.2
BD:        MariaDB
Admin BD:  phpMyAdmin
Xarxa:     cas3_net
```

## Carpetes rellevants

```text
html/
  api/          Endpoints JSON
  professorat/  Controladors web del professorat
  alumnat/      Controlador del panell d'alumne
  includes/     Autenticacio, sessio, DB, helpers, layout
  views/        Plantilles HTML
  assets/       CSS, JS i imatges
  errors/       Pagines 403 i 404
```

## Decisions tecniques clau

- Sense frameworks per mantenir el projecte simple i defensable.
- PDO i consultes preparades per seguretat SQL.
- Sessions PHP per autenticacio web.
- CSRF en formularis de modificacio.
- Layout i vistes separades del codi de negoci.
- Documentacio del codi amb PHPDoc i sortida `html/phpdoc/`.

## Estat per rubrica

- CRUD Alumnes: complet
- CRUD Material: complet
- CRUD Incidencies: complet
- Rols i control d'acces: complets
- Lloguer de portatils: crear, tancar i eliminar
- Documentacio: memoria, tasques, webgrafia i phpDocumentor
- Extres: API JSON, responsive, panell alumnat, dashboard i UI treballada

## Conclusio

Aquest fitxer resumeix el context general del projecte i deixa clar que el sistema cobreix tant els requisits funcionals com els de seguretat, documentacio i presentacio visual que demana la rubrica.
