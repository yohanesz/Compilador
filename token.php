<?php
class token
{
    // property declaration
    public $tok;
    public $valor;
    public $inicio;
    public $fim;

    public function __construct() {
        
    }

    // method declaration
    // public function mostrar() {
    //     echo $this->tokenvl;
    // }

    public function __toString() {
        return "Token: {$this->tok}, Valor: {$this->valor}, Início: {$this->inicio}, Fim: {$this->fim}";
    }
}

?>