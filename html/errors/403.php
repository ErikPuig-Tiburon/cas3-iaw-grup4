<?php

/**
 * Pagina d'error 403 personalitzada.
 *
 * @package CAS3
 */

require_once __DIR__ . '/../includes/http.php';

if (wants_json()) {
    api_start();
    json_error(403, 'Acces denegat.');
}

require_once __DIR__ . '/../includes/layout.php';

render_error_page(403, 'Acces denegat', 'No tens permisos per accedir a aquesta pantalla.');
