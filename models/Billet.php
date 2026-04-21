<?php

class Billet
{
    private $id, $nom, $idEvent, $date, $status, $idEmplacement,$nbre,$tel,$password;

    /**
     * @param $id
     * @param $nom
     * @param $idEvent
     * @param $date
     * @param $status
     */
    public function __construct($id, $nom, $idEvent, $date, $status, $idEmplacement, $nbre,$tel,$password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->idEvent = $idEvent;
        $this->date = $date;
        $this->status = $status;
        $this->idEmplacement = $idEmplacement;
        $this->nbre = $nbre;
         $this->tel = $tel;
        $this->password = $password;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getIdEmplacement()
    {
        return $this->idEmplacement;
    }
       /**
     * @return mixed
     */
    public function getNbre()
    {
        return $this->nbre;
    }
    
     public function getTel()
    {
        return $this->tel;
    }
    public function getPassword()
    {
        return $this->password;
    }



    public static function key(){ return new AES("QJ0SqV?Fx8iXv8x,LeG<R,<J],L9LA/N^j{JgE!Ws>,t6hu!rSdp4XIwL,>M"); }
    public static function toDoList($query){
        $key = self::key();
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Billet($i->id, $key->decrypt($i->nom), $i->idEvent, $i->date, $i->status, $i->idEmplacement, $i->nbre,$key->decrypt($i->tel),$key->decrypt($i->password));
            return $tab;
        }
    }

    public static function toDoList2($query){
        $key = self::key();
        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return new Billet($i->id, $key->decrypt($i->nom), $i->idEvent, $i->date, $i->status, $i->idEmplacement, $i->nbre,$key->decrypt($i->tel),$key->decrypt($i->password));

        }
    }

    public static function afficher($query){
        return self::toDoList(Query::CRUD($query));
    }
    public static function afficher2($query){
        return self::toDoList2(Query::CRUD($query));
    }

    public function ajouter(){
        Query::CRUD("INSERT INTO `billet`(`nom`, `idEvent`, `status`, idEmplacement, nbre, tel, password) VALUES ('$this->nom','$this->idEvent','$this->status','$this->idEmplacement','$this->nbre','$this->tel','$this->password')");
    }

    public static function nbrePlace($id){
        $h =  self::afficher("SELECT * FROM billet WHERE idEmplacement='$id'");
        $som = 0;
        if($h){
            foreach($h as $i){
                $som += $i->getNbre();
            }
        }
        return $som;
    }


}