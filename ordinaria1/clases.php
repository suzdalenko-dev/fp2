<?php
// Clase Padre
class Padre {
    // Variable pública accesible desde cualquier lugar
    public $nombre = "ClasePadre";
    
    // Variable protegida, accesible en la clase y sus herederos
    protected $mensaje = "Hola desde la clase Padre";

    // Variable privada, solo accesible dentro de esta clase
    private $secreto = "Secreto del Padre";

    // Constructor de la clase Padre
    public function __construct($nombre = "ClasePadre", $mensaje = "Hola desde la clase Padre") {
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
        echo "Constructor de Padre: nombre={$this->nombre}, mensaje={$this->mensaje}\n";
    }

    // Método público para acceder desde cualquier lugar
    public function saludar() {
        return $this->mensaje;
    }

    // Método protegido, accesible en las clases que heredan de esta clase
    protected function metodoProtegido() {
        return "Método protegido del Padre";
    }

    // Método privado, solo accesible dentro de esta clase
    private function metodoPrivado() {
        return "Método privado del Padre";
    }
}

// Clase Hija que hereda de Padre
class Hija extends Padre {
    // Propiedad propia de la clase Hija
    public $edad = 10;

    // Constructor de la clase Hija
    // Podremos llamar al constructor del Padre con parent::__construct()
    public function __construct($nombre = "ClaseHija", $mensaje = "Hola desde la clase Hija", $edad = 10) {
        // Llamamos al constructor del Padre para inicializar sus propiedades
        parent::__construct($nombre, $mensaje);
        $this->edad = $edad;
        echo "Constructor de Hija: nombre={$this->nombre}, mensaje={$this->saludar()}, edad={$this->edad}\n";
    }
    
    // Método propio de la clase Hija
    public function quienSoy() {
        $info = "Soy la Hija, mi nombre heredado es: " . $this->nombre . "\n";
        $info .= "Puedo usar el método del Padre para saludar: " . $this->saludar() . "\n";
        $info .= "Puedo usar el método protegido del Padre: " . $this->metodoProtegido() . "\n";
        $info .= "Mi edad (propiedad propia) es: " . $this->edad . "\n";

        return $info;
    }
}

// Ejemplo de uso
$hija = new Hija("MiHija", "Hola, soy la hija", 12);
echo $hija->quienSoy();
