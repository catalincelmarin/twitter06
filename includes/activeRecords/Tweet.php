<?php

    class Tweet {
        private $id;
        private $userId;
        private $text;
        private $creationDate;

        public function __construct()
        {
            $this->id = -1;
            $this->userId = null;
            $this->text = "";
            $this->creationDate = date('Y-m-d',time());
        }

        public static function getAll(PDO $conn) {
            $sql = "SELECT * FROM `Tweets`";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();


            $data = [];
            if($result && $stmt->rowCount() > 0) {
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($records as $record) {
                    $tweet = new Tweet();
                    $tweet->setId($record['id']);
                    $tweet->setText($record['text']);
                    $tweet->setUserId($record['user_id']);
                    $tweet->setCreationDate($record['creationDate']);
                    $data[] = $tweet;
                }
            }

            return $data;

        }

        public static function getById(PDO $conn, int $tweetId) {
            $sql = "SELECT * FROM `Tweets` WHERE `id` = :tweetId";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['tweetId'=>$tweetId]);

            if($result && $stmt->rowCount() > 0) {
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                $tweet = new Tweet();
                $tweet->setId($record['id']);
                $tweet->setText($record['text']);
                $tweet->setUserId($record['user_id']);
                $tweet->setCreationDate($record['creationDate']);

                return $tweet;
            }

            return null;

        }
        
        public function save(PDO $conn) {
            if($this->id === -1) {
                $sql = "INSERT INTO `Tweets` SET `user_id` = :userId, `text` = :text, `creationDate`= :creationDate";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([
                    'userId'=>$this->getUserId(),
                    'text'=>$this->getText(),
                    'creationDate'=>$this->getCreationDate(),
                ]);


                if($result) {
                    $this->setId($conn->lastInsertId());
                    return true;
                }

            } else {
                $sql = "UPDATE `Tweets` SET SET `user_id` = :userId, `text` = :text, `creationDate`= :creationDate WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([
                    'userId'=>$this->getUserId(),
                    'text'=>$this->getText(),
                    'creationDate'=>$this->getCreationDate(),
                    'id'=>$this->getId()
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
         * @return null
         */
        public function getUserId()
        {
            return $this->userId;
        }

        /**
         * @param null $userId
         */
        public function setUserId($userId)
        {
            $this->userId = $userId;
        }

        /**
         * @return string
         */
        public function getText()
        {
            return $this->text;
        }

        /**
         * @param string $text
         */
        public function setText($text)
        {
            $this->text = $text;
        }

        /**
         * @return false|string
         */
        public function getCreationDate()
        {
            return $this->creationDate;
        }

        /**
         * @param false|string $creationDate
         */
        public function setCreationDate($creationDate)
        {
            $this->creationDate = $creationDate;
        }


    }