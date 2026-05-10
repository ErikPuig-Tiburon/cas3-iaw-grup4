# T2.A Login, sessions i rols

## Index

1. Objectiu
2. Components implicats
3. Rols implementats
4. Control d'acces real
5. Flux del login
6. Relacio amb la rubrica
7. Evidencies recomanades
8. Conclusio

## Objectiu

Resoldre l'autenticacio i separar l'acces entre professorat i alumnat.

## Components implicats

| Fitxer | Funcio |
| --- | --- |
| `html/login.php` | Formulari web d'entrada. |
| `html/logout.php` | Tancament de sessio web. |
| `html/includes/auth.php` | Guards, rols i autenticacio principal. |
| `html/includes/session.php` | Sessio PHP i persistencia d'usuari. |
| `html/includes/csrf.php` | Generacio i validacio del token CSRF. |
| `html/api/auth/*.php` | Login, `me` i logout per la API. |

## Rols implementats

| Rol | Capacitat |
| --- | --- |
| `PROFESSOR` | Pot gestionar alumnes, material, incidencies, assignacions i usuaris. |
| `ALUMNE` | Pot consultar el seu panell i les seves dades vinculades. |

## Control d'acces real

Web:

- `require_web_auth()`
- `require_web_professor()`
- `require_web_student()`

API:

- autenticacio de sessio
- restriccio de modificacions a professorat

## Flux del login

1. L'usuari envia correu i contrasenya.
2. El sistema busca el compte principal a `Usuaris`.
3. Es valida la contrasenya amb `password_verify()`.
4. Si es correcte, s'obre sessio i es regenera l'ID.
5. Es guarda el rol a la sessio.
6. Es redirigeix al panell correcte.

## Relacio amb la rubrica

| Criteri | Estat |
| --- | --- |
| Hi ha control d'acces | Si |
| Hi ha rols definits | Si |
| Rols i control d'acces funcionals | Si |

## Evidencies recomanades

- login professor correcte
- login alumne correcte
- alumne intentant entrar a una pantalla de professorat i rebent `403`
- professor accedint al dashboard

## Conclusio

Aquest bloc permet defensar que no hi ha nomes autenticacio, sino una separacio funcional i segura entre professorat i alumnat.
