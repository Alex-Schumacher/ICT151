<?php
    Class Autorisation
    {
        private $id;
        private $nom;
        private $code;
        private $desc;
        private $pdo;

        public function __construct($id = null)
        {
            $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST,
                SQL_USER,
                SQL_PASSWORD,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
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
            $str = "<pre>";
            $str .= "\nid = ".$this-> getId();
            $str .= "\nnom = ".$this-> getNom();
            $str .= "\ncode = ".$this-> getCode();
            $str .= "\ndesc = ".$this-> getDesc();
            $str .= "</pre>";
            return $str;
        }



        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
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


