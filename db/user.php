<?php 
    class user{
        private $db;
        //2 underscores
        //constructor to initialize private variable to the database connection
        function __construct($config)
        {
            $this -> db = $config;
        }


        public function insertUser($username,$password){
            try {
                //use this to check if there's a user first
                //if the user is already created --> return false
                //So, the account will be created only once
                $result=$this->getUserbyusername($username);
                if($result['num'] > 0){
                    return false;
                }else{
                    //hashing the password
                    //password concatinating with username within md5
                    $new_password=md5($password.$username);
                    //define sql statement
                    $sql="INSERT INTO `user`(username, password) VALUES (:username,:password)";
                    //prepare the sql statement
                    $stmt=$this->db->prepare($sql);
                    //Bind all placeholders
                    //To store to the db
                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':password',$new_password);

                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function getUser($username,$password){
            try {
                $sql="SELECT * FROM `user` WHERE username = :username AND password = :password";
                //prepare the sql statement
                $stmt=$this->db->prepare($sql);
                //Bind all placeholders
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
 
                $stmt->execute();
                //when get something from the dv -> use fetch
                $result=$stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }



        public function getUserbyusername($username){
            try {
                $sql="SELECT count(*) as num FROM `user` WHERE username = :username";
                //prepare the sql statement
                $stmt=$this->db->prepare($sql);
                //Bind all placeholders
                $stmt->bindparam(':username',$username);
                $stmt->execute();
                //when get something from the dv -> use fetch
                $result=$stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>
