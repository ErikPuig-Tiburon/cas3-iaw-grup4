<?php

/**
 * Pagina d'error 404 personalitzada.
 *
 * @package CAS3
 */

require_once __DIR__ . '/../includes/http.php';

if (wants_json()) {
    api_start();
    json_error(404, 'No trobat.');
}

require_once __DIR__ . '/../includes/layout.php';

render_error_page(404, 'Pagina no trobada', 'La ruta demanada no existeix o ja no esta disponible.');
