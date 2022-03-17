<?php
    Class Personne{
        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $news_letter;
        private $pdo;


        public function __construct($id = null){
            $this->pdo = new PDO('mysql:dbname='.BASE_NAME.';host='.SQL_HOST,
                        SQL_USER,
                        SQL_PASSWORD,
                        array(
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

            if($id){
                $this->set_id($id);
                $this->init();
            }
        }

        /***
         * initalise le compte avec les données insérés
         * @return bool
         */

        public function init(){
            try{
                $query = "SELECT * FROM t_personnes WHERE id_per = :id_per";
                $stat = $this->pdo->prepare($query);

                $args = array();
                $args[":id_per"]  = $this->get_id();

                $stat->execute($args);

                $tab = $stat->fetch();

                $this->set_nom($tab['nom_per']);
                $this->set_prenom($tab['prenom_per']);
                $this->set_email($tab['email_per']);
                $this->set_password($tab['password_per']);
                $this->set_news_letter($tab['news_letter_per']);
                return true;

            }catch(Exception $e) {
                return false;
            }


        }

        /***
         * controle si l'émail passé en argument existe dans la base de donnée
         * @param $email
         * @return bool
         */
        public function check_email($email)
        {
            try {
                $query = "SELECT * FROM t_personnes WHERE email_per = :email LIMIT 1";
                $stat = $this->pdo->prepare($query);

                $args = array();
                $args[":email"] = $email;

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
            public function check_login($email,$password){
                try{
                    $query = "SELECT * FROM t_personnes WHERE email_per = :email LIMIT 1";
                    $stat = $this->pdo->prepare($query);

                    $args = array();
                    $args[":email"] = $email;

                    $stat->execute($args);


                    if($stat->rowCount()){
                        $tab = $stat->fetch();
                        if(password_verify($password,$tab['password_per'])){
                            $_SESSION['id'] =$tab['id_per'];
                            $_user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
                            $_SESSION['login_string'] = password_hash($tab['password_per'].$_user_browser_ip,PASSWORD_DEFAULT);
                            $_SESSION['email'] = $tab['email_per'];
                            echo "ok";
                        }
                        else{
                            echo "KO";
                        }
                    }
                    else{
                        return false;
                    }

                }catch(Exception $e) {
                    return false;
                }
            }

        /**
         * controle les paramètres au login
         * @return bool
         */
        public function check_connect(){
        if(isset($_SESSION['id'],$_SESSION['email'],$_SESSION['login_string'])){
            $user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
            if(password_verify($this->get_password().$user_browser_ip,$_SESSION['login_string'])){
                return true;
            }else{
                return false;
            }
        }else {
            return false;
        }
        }

        public function add($tab){
            $this->gen_password($tab['password_per']);

            $args = array();
            $args['nom_per'] = $tab['nom_per'];
            $args['prenom_per'] = $tab['prenom_per'];
            $args['email_per'] = $tab['email_per'];
            $args['password_per'] = $this->get_password();
            $args['news_letter_per'] = $tab['news_letter_per'];

                try{

                    $query = "INSERT INTO t_personnes SET 
                                nom_per = :nom_per,
                                prenom_per = :prenom_per,
                                email_per = :email_per,
                                password_per = :password_per,
                                news_letter_per = :news_letter_per";
                                

                    $stmt = $this->pdo->prepare($query);
                    $stmt-> execute($args);

                    return $this->pdo->lastInsertId();


                }catch (Exception $e){
                    return false;
            }
        }
        public function gen_password($password){
            $this -> set_password(password_hash($password,PASSWORD_DEFAULT));
        }


        public function __toString(){
            $str = "<pre>";
            $str .= "\nid = ".$this-> get_id();
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