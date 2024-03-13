<?php

    class RilevatoreDiTemperatura extends Rilevatore implements JsonSerializable {

        protected $tipologia;

        public function __construct($ID) {
            parent:: __construct($ID);

        }
        function set_tipologia($tipologia) {
            $this->tipologia = $tipologia;
        }
        
        function get_tipologia() {
            return $this->tipologia;
        }

        
        
        public function jsonSerialize(){

            $a = [
                "tipologia" => $this->posizitipologiaone
            ];
            return $a;

        }

    }

?>
