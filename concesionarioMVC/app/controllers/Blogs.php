<?php
class Blogs extends Controlador
{
    public function __construct()
    {
        //1) Acceso al modelo
        $this->blog = $this->modelo('Blog');
    }

    public function index()
    {
        // Podemos pasar parametros a la vista que queramos
        // Para ello nos creamos un array con los parámetros
        // Le pasamos a la vista los parametros
        $this->vista('blog/inicio');
    }

}
