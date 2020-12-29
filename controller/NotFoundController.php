<?php

/**
 * Abstrae la página no encontrada (error 404).
 *  
 * @author PHPCODE2021
 * @version 1.0
 * @package System
 */
class NotFoundController {

    /**
     * @access protected
     * @var string
     */
    private $message;

    /**
     * Método constructor de la clase.
     * 
     * Inicializa el mensaje de página no encontrada a un valor por defecto.
     * @param void.
     * @return void.
     */
    public function __CONSTRUCT() {
        $this->message = 'Pagina no encontrada en el sistema';
    }

    /**
     * Envía a la vista de página no encontrada.
     * 
     * Este caso se da cuando el controlador y menos la acción no ha sido encontrado.
     * @param void.
     * @return void.
     */
    public function index() {
        $message = $this->message;
        $view_page = VIEW_SYSTEM . 'page_not_found.php';
        require_once VIEW_LAYOUT . 'template_not_found.php';
    }

    /**
     * Envía un mensaje a la vista de página no encontrada.
     * 
     * Este caso se da cuando el controlador o la acción no ha sido encontrado.
     * @param void.
     * @return void.
     */
    public function withoutController($m) {
        $this->message = $m;
        $message = $this->message;
        $view_page = VIEW_SYSTEM . 'page_not_found.php';
        require_once VIEW_LAYOUT . 'template_not_found.php';
    }

}

?>
