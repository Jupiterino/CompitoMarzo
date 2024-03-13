<?php

    class Rilevatore implements JsonSerializable{

        protected $ID;
        protected $UM;
        protected $codiceSeriale;
        protected $misurazioni = array();

        public function __construct($ID, $codiceSeriale) {

            $this->ID = $ID;
            $this->codiceSeriale = $codiceSeriale;

            if($this->ID == "umidita"){
                $this->UM = "%";
            }
            if($this->ID == "temperatura"){
                $this->UM = "C";
            }

            $m1 = new misurazione();
            $m2 = new misurazione();

            $m1->set_data("1/1/2001");
            $m1->set_valore("120");

            $m2->set_data("2/2/2001");
            $m2->set_valore("140");

            $this->misurazioni = [$m1, $m2];
            

        }

        function misu(){
            return $this->misurazioni;
        }
        function set_ID($ID) {
            $this->ID = $ID;
        }
        
        function get_ID() {
            return $this->ID;
        }

        function set_codiceSeriale($codiceSeriale) {
            $this->codiceSeriale = $codiceSeriale;
        }
        
        function get_codiceSeriale() {
            return $this->codiceSeriale;
        }

        
        
        
        public function jsonSerialize(){

            $a = [
                "ID" => $this->ID,
                "codiceSeriale" => $this->codiceSeriale
            ];
            return $a;

        }

    }

?>
