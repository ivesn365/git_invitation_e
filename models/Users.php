<?php

class Users
{
    private $id;
    private $pseudo;
    private $password;
    private $role;
    private $status;

    /**
     * @param $id
     * @param $pseudo
     * @param $password
     * @param $role
     * @param $status
     */
    public function __construct($id, $pseudo, $password, $role, $status)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    public static function key(){
        return new AES('');
    }

    public static function toDoList($query){
        $key = self::key();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Users($i->id, $key->decrypt($i->pseudo), '', $key->decrypt($i->role), $i->status);
            return $tab;
        }
    }
    public static function toDoList2($query){
        $key = self::key();
        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return  new Users($i->id, $key->decrypt($i->pseudo), '', $key->decrypt($i->role), $i->status);
        }
    }
    public static function afficher($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher2($query){ return self::toDoList2(Query::CRUD($query)); }

    public function ajouter(){
        Query::CRUD("INSERT INTO `usersss`(`pseudo`, `password`, `role`, `status`) VALUES ('$this->pseudo','$this->password','$this->role','$this->status')");
    }




}