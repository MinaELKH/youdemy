<?php

namespace classes;
use config\Database;
use Exception, PDOException, PDO;

ini_set('display_errors', 1);
error_reporting(E_ALL);
class User
{
    protected $id_user;
    protected $name_full;
    protected $email;
    protected $role;
    protected $avatar;
    private $passwordHash;
    
  

    public function __construct(
        ?int $id_user=null,
        ?string $name_full =null,
        ?string $email =null,
        string $role =null,
        ?string $avatar = null,
        $passwordHash = null
    ) {
        $this->id_user = $id_user;
        $this->name_full = $name_full;
        $this->email = $email;
        $this->role = $role;
        $this->avatar = $avatar;
        $this->passwordHash = $passwordHash;
    }


//  public function __get($att) {
//         // Retourner la valeur de la propriété si elle existe
//          return $this->$att;
//  }


    public function __toString()
    {
        return $this->name_full;
    }

    // Getters
    public function getid_user()
    {
        return $this->id_user;
    }
    public function getname_full()
    {
        return $this->name_full;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }

    // Password hashing method
    private function setPasswordHash($password)
    {
        $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
    }
     private function save()
    {
        $db = Database::getInstance()->getConnection();
        try {
            $stmt = $db->prepare("INSERT INTO users (name_full, email, password, avatar , id_role) VALUES (:name_full, :email, :password, :avatar , :id_role)");
            $id_role = role::get_IdRole_ByName($this->role);
            $this->avatar = 'avatar.jpg';
            $stmt->bindParam(':name_full', $this->name_full, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->passwordHash, PDO::PARAM_STR);
            $stmt->bindParam(':avatar', $this->avatar, PDO::PARAM_STR);
            $stmt->bindParam(':id_role', $id_role, PDO::PARAM_INT);
            $stmt->execute();
            $this->id_user = $db->lastInsertId();
            return $this->id_user;
        } catch (PDOException $e) {
            // Log des erreurs SQL
            error_log("Database error: " . $e->getMessage());

            // Gestion des exceptions
            throw new Exception("An error occurred while saving the user.");
        }
    }

    // Search user by name_full
    // public function searchUserByname_full($name_full)
    // {
    //     $db = Database::getInstance()->getConnection();

    //     // Prepare the SQL query
    //     $stmt = $db->prepare("SELECT * FROM users WHERE name_full LIKE :name_full");

    //     // Bind the parameter for name_full search (using wildcards for partial match)
    //     $stmt->bindValue(':name_full', '%' . $name_full . '%', PDO::PARAM_STR);

    //     // Execute the query
    //     $stmt->execute();

    //     // Fetch all matching users
    //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     // Return an array of User objects
    //     $users = [];
    //     foreach ($results as $result) {
    //         $users[] = new User(
    //             $result['id_user'],
    //             $result['name_full'],
    //             $result['email'],
    //             $result['password']
    //         );
    //     }

    //     return $users;
    // }

    // Get user by id_user
    // public function getUserByid_user($id_user)
    // {
    //     $db = Database::getInstance()->getConnection();

    //     // Prepare the SQL query
    //     $stmt = $db->prepare("SELECT * FROM users WHERE id_user = :id_user");
    //     $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    //     $stmt->execute();

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($result) {
    //         return new User(
    //             $result['id_user'],
    //             $result['name_full'],
    //             $result['email'],
    //             $result['password']
    //         );
    //     }

    //     return null; // User not found
    // }

    // Static method to search user by email
    public static function findByEmail($email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $role = Role::get_NameRole_ById($result['id_role']);
            return new User($result['id_user'], $result['name_full'],  $result['email'], $role, $result['avatar'],$result['password']);
        }

        return null;
    }

    // Method to register a new user (signup)
    public static function signup($name_full, $email, $avatar, $password, $role)
    {
        // Check if email already exists
        if (self::findByEmail($email)) {
            throw new Exception("Email is already registered");
        }
        $user = new User(0, $name_full, $email, $role, $avatar);
        $user->setPasswordHash($password); // Hash the password
        return $user->save();
    }
    // Method to login (signin)
    public static function signin($email, $password)
    {
        $user = self::findByEmail($email);
        //var_dump($user) ;
        // Check if user exists and password is correct
        if (!$user || !password_verify($password, $user->passwordHash)) {
            throw new Exception("Invalid_user email or password");
        }
        return $user;
    }


    public static function gotoLocation($role){
        if ($role == "student") {
            header("Location: ../espaceStudent/dashboard.php");
            exit(); 
        } elseif ($role == "teacher") {
            header("Location: ../espaceTeacher/dashboard.php");
            exit();
        }  elseif ($role == "Admin") {
            header("Location: ../espaceAdmin/dashboard.php");
            exit();
        }
    }
}
