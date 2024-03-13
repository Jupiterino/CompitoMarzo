<?php

    class RilevatoreDiTemperatura extends Rilevatore implements JsonSerializable {

        protected $tipologia;

        public function __construct($ID, $codiceSeriale) {
            parent:: __construct($ID, $codiceSeriale);

        }
        function set_tipologia($tipologia) {
            $this->tipologia = $tipologia;
        }
        
        function get_tipologia() {
            return $this->tipologia;
        }

        
        
        public function jsonSerialize(){

            $a = [
                "tipologia" => $this->tipologia
            ];
            return $a;

        }

    }

?>
