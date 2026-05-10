# T1.A Servidor web, PHP i desplegament

## Index

1. Objectiu
2. Solucio aplicada
3. Decisions tecniques
4. Evidencies
5. Resultat
6. Conclusio

## Objectiu

Preparar l'entorn d'execucio del projecte amb Apache, PHP 8.2, Docker i publicacio per HTTP/HTTPS.

## Solucio aplicada

El projecte usa:

- `Dockerfile` per construir la imatge web
- `docker-compose.yml` per orquestrar serveis
- `apache/000-default.conf` per HTTP
- `apache/default-ssl.conf` per HTTPS

## Decisions tecniques

- activacio de `rewrite`, `headers` i `ssl`
- instal·lacio de `pdo_mysql`
- certificat autofirmat generat dins la imatge
- publicacio dels ports `80` i `443`
- document root apuntant a `html/`

## Evidencies

| Fitxer | Evidencia |
| --- | --- |
| `Dockerfile` | Instal·lacio de PHP, PDO MySQL i SSL. |
| `docker-compose.yml` | Orquestracio de web, MariaDB i phpMyAdmin. |
| `apache/000-default.conf` | Publicacio HTTP i `ErrorDocument`. |
| `apache/default-ssl.conf` | Publicacio HTTPS amb certificat. |

## Resultat

L'aplicacio es pot obrir per navegador i també ofereix una ruta per la documentacio i l'API:

```text
https://localhost/
https://localhost/phpdoc/
https://localhost/api/health.php
```

## Conclusio

La infraestructura desplegada permet executar el projecte amb garanties, publicar-lo en HTTP/HTTPS i demostrar que la base tecnica esta ben resolta.
