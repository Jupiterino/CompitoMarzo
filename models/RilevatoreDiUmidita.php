<?php

    class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable {

        protected $posizione;

        public function __construct($ID, $codiceSeriale) {
            parent:: __construct($ID, $codiceSeriale);

        }
        function set_posizione($posizione) {
            $this->posizione = $posizione;
        }
        
        function get_posizione() {
            return $this->posizione;
        }

        
        
        public function jsonSerialize(){

            $a = [
                "posizione" => $this->posizione
            ];
            return $a;

        }

    }

?>
