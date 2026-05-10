# T2.B Seguretat, control d'acces, CORS i HTTPS

## Index

1. Objectiu
2. Mecanismes aplicats
3. Fitxers principals
4. Control d'acces
5. CSRF
6. CORS
7. HTTPS
8. Relacio amb la rubrica
9. Evidencies
10. Conclusio

## Objectiu

Protegir la web i la API davant accessos no autoritzats i operacions insegures.

## Mecanismes aplicats

- rols i guards d'acces
- CSRF en formularis i API
- sessions PHP
- PDO i prepared statements
- HTTPS
- errors `403` i `404`
- CORS controlat per configuracio

## Fitxers principals

| Fitxer | Responsabilitat |
| --- | --- |
| `html/includes/auth.php` | Guards web per professor i alumne. |
| `html/includes/csrf.php` | Validacio del token CSRF. |
| `html/includes/http.php` | JSON, errors, CORS i metodes. |
| `html/errors/403.php` | Acces denegat. |
| `html/errors/404.php` | Ruta no trobada. |
| `apache/default-ssl.conf` | Publicacio HTTPS. |
| `Dockerfile` | Activacio SSL i certificat autofirmat. |

## Control d'acces

Exemples:

- un alumne no pot entrar a `professorat/*.php`
- un alumne no pot modificar recursos a la API
- un usuari sense sessio es redirigit a login o rep error segons el context

## CSRF

Els formularis POST i les accions sensibles exigeixen token CSRF. El token es valida abans d'executar canvis.

## CORS

La API llegeix origens permesos des de la variable:

```text
ALLOWED_ORIGINS
```

Aixo permet treballar amb frontend extern sense obrir l'API a qualsevol origen.

## HTTPS

L'aplicacio es publica en HTTPS amb un certificat autofirmat generat durant la construccio de la imatge.

## Relacio amb la rubrica

Aquest document justifica directament el criteri:

```text
Tan els rols com el control d'acces son funcionals
```

## Evidencies

- accés denegat d'alumne a professorat
- error per token CSRF invalid
- web accessible per `https://`
- `403` i `404` personalitzats

## Conclusio

La seguretat del projecte no es cosmetica: hi ha mesures reals de proteccio que dificulten saltar-se els rols o executar canvis sense permisos.
