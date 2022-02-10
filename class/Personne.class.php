<?php
    Class Personne{
        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $news_letter;
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:dbname='.BASE_NAME.';host='.SQL_HOST,
                        SQL_USER,
                        SQL_PASSWORD,
                        array(
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

        }

        public function __toString(){
            $str = "<pre>";
            $str .= "\nnom = ".$this-> get_nom();
            $str .= "\nprenom = ".$this-> get_prenom();
            $str .= "\nemail = ".$this-> get_email();
            $str .= "\npassword = ".$this-> get_password();
            $str .= "\nnews_letter = ".$this-> get_news_letter();
            $str .= "</pre>";
            return $str;
        }

        /**
         * set la propriété de la classe
         * @param $nom
         */
        public function set_nom($nom){
            $this -> nom = $nom;
        }

        public function get_nom(){
            return $this->nom;
        }

        /**
         * @return mixed
         */
        public function get_id()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function set_id($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function get_prenom()
        {
            return $this->prenom;
        }

        /**
         * @param mixed $prenom
         */
        public function set_prenom($prenom)
        {
            $this->prenom = $prenom;
        }

        /**
         * @return mixed
         */
        public function get_email()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function set_email($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function get_password()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function set_password($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function get_news_letter()
        {
            return $this->news_letter;
        }

        /**
         * @param mixed $news_letter
         */
        public function set_news_letter($news_letter)
        {
            $this->news_letter = $news_letter;
        }


    }
    ?>