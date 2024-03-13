<?php

    class impianto implements JsonSerializable{

        protected $nome;
        protected $latitudine;
        protected $longitudine;
        protected $array = array();

        public function __construct($nome, $latitudine, $longitudine) {

            $this->nome = $nome;
            $this->latitudine = $latitudine;
            $this->longitudine = $longitudine;

            $R1 = new rilevatore();
            $R2 = new rilevatore();
            $R3 = new rilevatore();

            $this->array = [$R1,$R2,$R3];

            $R1 -> set_nome("Gabriele");
            $R1 -> set_cognome("Borgi");
            $R1 -> set_eta("19");

            $R2 -> set_nome("Andrea");
            $R2 -> set_cognome("Sestini");
            $R2 -> set_eta("18");


            $R3 -> set_nome("Samuele");
            $R3 -> set_cognome("Cosma");
            $R3 -> set_eta("18");

            $this->nome = "5cia";

        }

        public function search($nome){

            for($i = 0; $i < count($this->array ); $i++) {

                if($this->array[$i]->get_nome()== $nome)
                    return $this->array[$i];    

            }
            return null;
        }

        public function delete($nome) {

            for($i = 0; $i < count($this->array ); $i++) {

                if($this->array[$i]->get_nome()== $nome)
                    break;   

            }

            if($i<count($this->array ))
            {
                unset($this->array[$i]);
                $this->array = array_values($this->array);
            }    

        }

        public function toString() {

            $string = "";
            for($i = 0; $i < count($this->array); $i++) {

                $string = $string . $this->array[$i]->toString();
            }

            return $string;
        }

        public function jsonSerialize(){

            $a = [
                "Nome" => $this->nome,
                "Alunni" => $this->array
            ];
            return $a;
        }

    }

?>