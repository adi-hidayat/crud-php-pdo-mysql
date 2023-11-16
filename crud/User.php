<?php 

require_once '../config/database.php';

class User extends Database
{
    public int $id;

    public string $name;

    public string $email;

    public string $phone;

    private $database;

    public function __construct()
    {
        $this->database = parent::connect();
    }

    public function create()
    {
        try {
            
            $sqlStatement = $this->database->prepare("INSERT INTO `users` (`name`, `email`, `phone`)  VALUES(:name, :email, :phone)");

            $sqlStatement->bindParam(':name', $this->name);
            $sqlStatement->bindParam(':email', $this->email);
            $sqlStatement->bindParam(':phone', $this->phone);

            $result = $sqlStatement->execute();

            return $result;

        } catch (Exception $e) {

            return $e->getMessage();

        }
        
    }

    public function get($id = null)
    {
        try{

            if (!empty($id)) {
                $sqlStatement = $this->database->prepare("SELECT * FROM `users` WHERE id= :id");
                $sqlStatement->bindParam(':id', $id);
                $sqlStatement->execute();

                return $sqlStatement->fetch(PDO::FETCH_ASSOC);

            } else {

                $sqlStatement = $this->database->query("SELECT * FROM `users`");
                $sqlStatement->execute();

                return $sqlStatement->fetchAll(PDO::FETCH_ASSOC);
            }
            

        } catch (Exception $e){

            return $e->getMessage();
        
        }
    }

    public function update()
    {
        try {
            $sqlStatement = $this->database->prepare("UPDATE `users` SET `name` = :name, `email` = :email, `phone` = :phone WHERE `id` = :id;");
            $sqlStatement->bindParam(':id', $this->id);
            $sqlStatement->bindParam(':name', $this->name);
            $sqlStatement->bindParam(':email', $this->email);
            $sqlStatement->bindParam(':phone', $this->phone);

            $result = $sqlStatement->execute();

            return $result;

        } catch (Exception $e) {

            return $e->getMessage();

        }

    }

    public function delete($id)
    {
        try {
            $sqlStatement = $this->database->prepare("DELETE FROM `users` WHERE id = $id");
            $result = $sqlStatement->execute();
            
            return $result;

        } catch (Exception $e){

            return $e->getMessage();
        
        }
    }

}