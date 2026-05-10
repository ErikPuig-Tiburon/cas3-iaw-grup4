# DOC.3 Guia per a l'exposicio oral

## Index

1. Objectiu
2. Estructura recomanada
3. Repartiment de temps
4. Evidencies que convé ensenyar
5. Preguntes que pot fer el professorat
6. Conclusio

## Objectiu

Aquesta guia serveix per defensar el projecte seguint l'ordre que millor encaixa amb la rubrica: CRUD, rols, lloguer, documentacio, estructura i extres.

## Estructura recomanada

### 1. Introduccio

- Qui som i quin problema resol el projecte.
- Explicar que es tracta de la gestio de material de l'Institut Montsia.

### 2. Infraestructura i base de dades

- Docker Compose
- Apache + PHP 8.2
- MariaDB
- phpMyAdmin
- model de dades amb `Alumnes`, `Material`, `Assignacions`, `Incidencies` i `Usuaris`

### 3. Seguretat, rols i acces

- login amb sessions
- rols `PROFESSOR` i `ALUMNE`
- CSRF
- consultes preparades
- errors `403` i `404`
- HTTPS

### 4. Demostracio dels CRUD

Ordre recomanat:

1. CRUD alumnes
2. CRUD material
3. CRUD incidencies

Per cada bloc s'ha de mostrar:

- consulta
- alta
- modificacio
- eliminacio

### 5. Lloguer de portatils

- crear una assignacio
- marcar devolucio o tancament
- eliminar una assignacio

Aquest apartat s'ha de defensar de manera separada, perquè la rubrica el valora específicament.

### 6. Frontend i experiencia d'usuari

- panell professorat
- panell alumnat
- dashboard
- responsive
- disseny visual propi

### 7. Documentacio

- README
- memòria
- documents T1, T2 i T3
- phpDocumentor

### 8. Conclusions

- resumir que el sistema cobreix els criteris principals
- remarcar extres: API, dashboard, phpDocumentor i disseny visual

## Repartiment de temps

| Bloc | Temps orientatiu |
| --- | --- |
| Introduccio | 2 min |
| Infraestructura i BD | 3 min |
| Seguretat i rols | 3 min |
| CRUD | 6 min |
| Lloguer de portatils | 2 min |
| Frontend | 2 min |
| Documentacio i conclusions | 2 min |

## Evidencies que convé ensenyar

- login de professor
- login d'alumne
- creacio i esborrat d'un alumne
- alta i modificacio d'un material
- creacio i tancament d'una incidencia
- assignacio i eliminacio d'un lloguer
- accés a `/phpdoc/`

## Preguntes que pot fer el professorat

- Com s'impedeix que un alumne entre a professorat?
- On es valida el token CSRF?
- Com es protegeixen les consultes SQL?
- Com es genera la documentacio del codi?
- Com es publiquen Apache, MariaDB i phpMyAdmin?

## Conclusio

Amb aquest guio, l'exposicio queda orientada directament a sumar punts a la rubrica, mostrant evidencies reals del codi, la seguretat, la documentacio i la part visual.
