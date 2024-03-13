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

            $R1 = new RilevatoreDiUmidita("umidita", "123");
            $R2 = new RilevatoreDiUmidita("umidita", "126");
            $R3 = new RilevatoreDiTemperatura("temperatura", "129");
            $R4 = new RilevatoreDiTemperatura("temperatura", "133");

            $R1 -> set_posizione("terra");
            $R2 -> set_posizione("aria");
            $R3 -> set_tipologia("acqua");
            $R4 -> set_tipologia("aria");

            $this->array = [$R1,$R2,$R3,$R4];
         
        }

        public function show($ID){
            $array2 = array();
            for($i = 0; $i < count($this->array ); $i++) {

                if($this->array[$i]->get_ID()== $ID)
                    array_push($array2, $this->array[$i]);    

            }
            return $array2;
        }


        public function arrayy(){
            return $this->array;
        }


        public function search($id){

            for($i = 0; $i < count($this->array ); $i++) {

                if($this->array[$i]->get_codiceSeriale()== $codiceSeriale)
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

        

        public function jsonSerialize(){

            $a = [
                "nome" => $this->nome,
                "latitudine" => $this->latitudine,
                "longitudine" => $this->longitudine
            ];
            return $a;
        }

    }

?>