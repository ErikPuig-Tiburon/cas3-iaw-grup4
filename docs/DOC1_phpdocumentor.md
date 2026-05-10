# DOC.1 Documentacio del codi PHP amb phpDocumentor

## Objectiu

Aquest document justifica l'apartat de documentacio de la rubrica. El projecte no nomes conté comentaris basics, sino documentacio de funcions, fitxers i paquets, i a mes es genera una sortida HTML navegable amb phpDocumentor.

## Que s'ha documentat

El codi PHP inclou:

- blocs PHPDoc a fitxers principals
- descripcio de funcions clau
- comentaris de suport en blocs de lògica importants
- separacio entre codi d'autenticacio, base de dades, helpers, controladors i vistes

## Fitxers amb documentacio rellevant

| Fitxer | Descripcio |
| --- | --- |
| `html/includes/auth.php` | Autenticacio, rols, guards web i redireccions post-login. |
| `html/includes/session.php` | Gestio de sessio, persistencia d'usuari i tancament de sessio. |
| `html/includes/csrf.php` | Generacio i validacio de tokens CSRF. |
| `html/includes/db.php` | Connexio PDO i helpers de consulta. |
| `html/includes/helpers.php` | Format de dates, etiquetes de material, estats i fragments de text. |
| `html/includes/layout.php` | Renderitzat de vistes i plantilla comuna. |
| `html/professorat/*.php` | Lògica web dels CRUD i assignacions. |
| `html/alumnat/index.php` | Consulta restringida del panell d'alumne. |
| `html/api/*.php` | CRUD JSON i endpoints auxiliars. |

## Exemple real de documentacio

```php
/**
 * Requereix rol de professor per a una pagina web.
 *
 * @return array Usuari professor.
 */
function require_web_professor()
```

Aquest tipus de bloc permet:

- entendre la responsabilitat de cada funcio
- defensar el codi durant l'exposicio
- generar documentacio automàtica útil

## Generacio amb phpDocumentor

Fitxer de configuracio:

```text
phpdoc.xml
```

Comanda utilitzada:

```bash
docker run --rm -v "$PWD":/data -w /data phpdoc/phpdoc:3 -c phpdoc.xml
```

Sortida generada:

```text
html/phpdoc/
```

Acces web:

```text
https://10.0.70.99/phpdoc/
```

## Relacio amb la rubrica

| Criteri | Evidencia |
| --- | --- |
| Webgrafia descriptiva | Es completa a la memoria i a les tasques de `docs/`. |
| Codi comentat basicament | Superat: hi ha PHPDoc i comentaris funcionals. |
| Codi documentat amb descripcio de cada funcio | Present en `includes/`, autenticacio, layout i altres helpers. |

## Fonts recomanades per defensar aquest apartat

| Font | Per que s'ha fet servir |
| --- | --- |
| [phpDocumentor](https://docs.phpdoc.org/) | Referencia oficial per generar documentacio HTML del codi PHP. |
| [PHP Manual - PHPDoc basics](https://docs.phpdoc.org/guide/references/phpdoc/index.html) | Explica l'estructura dels docblocks i etiquetes. |
| [PHP Manual](https://www.php.net/docs.php) | Serveix de suport per descriure signatures, tipus i comportament de funcions natives. |

## Conclusio

L'apartat de documentacio no es limita a comentar quatre linies: el projecte disposa de documentacio navegable, comentaris de manteniment i una estructura suficient per justificar la maxima puntuacio en aquest criteri.
