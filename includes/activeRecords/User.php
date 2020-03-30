<?php

    class User {
        private $id;
        private $name;
        private $email;
        private $password;

        public function __construct()
        {
            $this->id = -1;
            $this->name ="";
            $this->email ="";
            $this->password ="";
        }

        public static function getAll(PDO $conn) {
            $sql = "SELECT * FROM `Users`";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            $data = [];
            if($result && $stmt->rowCount() > 0) {
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($records as $record) {
                    $user = new User();
                    $user->setId($record['id']);
                    $user->setEmail($record['email']);
                    $user->setName($record['name']);
                    $user->setPassword($record['password']);
                    $data[$record['id']] = $user;
                }
            }

            return $data;

        }

        public static function getByEmail(PDO $conn, string $email) {
            $sql = "SELECT * FROM `Users` WHERE `email` = :email";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['email'=>$email]);

            if($result && $stmt->rowCount() > 0) {
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new User();
                $user->setId($record['id']);
                $user->setEmail($record['email']);
                $user->setName($record['name']);
                $user->setPassword($record['password']);

                return $user;
            }

            return null;

        }

        public static function getById(PDO $conn, int $userId) {
            $sql = "SELECT * FROM `Users` WHERE `id` = :userId";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['userId'=>$userId]);

            if($result && $stmt->rowCount() > 0) {
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new User();
                $user->setId($record['id']);
                $user->setEmail($record['email']);
                $user->setName($record['name']);
                $user->setPassword($record['password']);

                return $user;
            }

            return null;

        }

        public static function loginUser(PDO $conn, string $email, string $password) {

            $sql = "SELECT * FROM `Users` WHERE `email` = :email";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['email'=>$email]);

            if($result && $stmt->rowCount() > 0) {
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password,$record['password'])) {
                    $user = new User();
                    $user->setId($record['id']);
                    $user->setEmail($record['email']);
                    $user->setName($record['name']);
                    $user->setPassword($record['password']);

                    return $user;
                } else {
                    return null;
                }
            }

            return null;

        }

        public function save(PDO $conn) {
            if($this->id === -1) {
                $sql = "INSERT INTO `Users` SET `name` = :name, `email` = :email, `password`= :password";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'password'=>$this->password,
                ]);


                if($result) {
                    $this->setId($conn->lastInsertId());
                    return true;
                }

            } else {
                $sql = "UPDATE `Users` SET `name`= :name, `email`=>:email,`password`= :password WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'password'=>$this->password,
                    'id'=>$this->id
                ]);
                if($result) {
                    return true;
                }
            }

            return false;
        }

        /**
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        private function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword($password)
        {
            $newHashedPass = password_hash($password, PASSWORD_BCRYPT);

            $this->password = $newHashedPass;
        }


    }