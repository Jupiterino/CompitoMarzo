<?php

    class misurazione implements JsonSerializable{

        protected $data;
        protected $valore;
        

        function set_data($data) {
            $this->data = $data;
        }
        
        function get_data() {
            return $this->valore;
        }

        function set_valore($valore) {
            $this->valore = $valore;
        }
        
        function get_valore() {
            return $this->valore;
        }


        public function jsonSerialize(){

            $a = [
                "data" => $this->data,
                "valore" => $this->valore
            ];
            return $a;

        }

    }

?>
