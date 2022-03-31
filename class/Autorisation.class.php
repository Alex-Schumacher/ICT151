<?php
    Class Autorisation
    {
        private $id_aut;
        private $nom;
        private $code;
        private $desc;


        public function __construct($id = null)
        {
            parent::__construct();
        }

        public function check_autorisation($code)
        {

            try {
                $query = "SELECT * from t_autorisations WHERE code_aut = :code LIMIT 1";
                $stat = $this->pdo->prepare($query);
                $args = array();
                $args[':code'] = $code;
                $stat->execute($args);
                $tab = $stat->fetch();
                if ($stat->rowCount()) {
                    return true;
                } else {
                    return false;
                }

            } catch (Exception $e) {
                return false;
            }

        }

        public function add($tab)
        {
            $args = array();
            $args['nom_aut'] = $tab['nom_aut'];
            $args['code_aut'] = $tab['code_aut'];
            $args['desc_aut'] = $tab['desc_aut'];
            try {
                $query = "INSERT INTO t_autorisations SET 
                nom_aut = :nom_aut,
                code_aut = :code_aut,
                desc_aut = :desc_aut";

                $stmt = $this->pdo->prepare($query);
                $stmt->execute($args);

                return $this->pdo->lastInsertId();

            } catch (Exception $e) {
                console . log("error in add process");
                return false;
            }
        }
        public function __toString(){
            $str = "\n<pre>\n";
            foreach($this AS $key => $val){
                if($key != "pdo"){
                    $str .= "\t".$key;
                    $lengh_key = strlen($key);
                    for($i=strlen($key);$i<20;$i++){
                        $str .= "&nbsp;";
                    }
                    $str .= "=>&nbsp;&nbsp;&nbsp;".$val."\n";
                }
            }
            $str .= "\n</pre>";
            return $str;
        }



        /**
         * @return mixed
         */
        public function getIdAut()
        {
            return $this->id_aut;
        }

        /**
         * @param mixed $id_aut
         */
        public function setIdAut($id_aut)
        {
            $this->id_aut = $id_aut;
        }

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        /**
         * @return mixed
         */
        public function getCode()
        {
            return $this->code;
        }

        /**
         * @param mixed $code
         */
        public function setCode($code)
        {
            $this->code = $code;
        }

        /**
         * @return mixed
         */
        public function getDesc()
        {
            return $this->desc;
        }

        /**
         * @param mixed $desc
         */
        public function setDesc($desc)
        {
            $this->desc = $desc;
        }

        /**
         * @return PDO
         */
        public function getPdo()
        {
            return $this->pdo;
        }

        /**
         * @param PDO $pdo
         */
        public function setPdo($pdo)
        {
            $this->pdo = $pdo;
        }




    }


