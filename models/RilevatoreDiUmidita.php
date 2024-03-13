<?php

    class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable {

        protected $posizione;

        public function __construct($ID) {
            parent:: __construct($ID);

        }
        function set_posizione($ID) {
            $this->posizione = $ID;
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
