<?php

class Livre_or
{
    private $id, $idusers, $idEvent, $message, $date, $status;

    /**
     * @param $id
     * @param $idusers
     * @param $idEvent
     * @param $message
     * @param $date
     * @param $status
     */
    public function __construct($id, $idusers, $idEvent, $message, $date, $status)
    {
        $this->id = $id;
        $this->idusers = $idusers;
        $this->idEvent = $idEvent;
        $this->message = $message;
        $this->date = $date;
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
    public function getIdusers()
    {
        return $this->idusers;
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
    public function getMessage()
    {
        return $this->message;
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


    public static function toDoList($query){
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Livre_or($i->id, $i->idusers, $i->idEvent, Events::key()->decrypt($i->message), $i->date, $i->status);
            return $tab;
        }
    }
    public static function toDoList2($query){
        $tab = array();
        if ($query){
           $i = $query->fetch(PDO::FETCH_OBJ);
           return  new Livre_or($i->id, $i->idusers, $i->idEvent, Events::key()->decrypt($i->message), $i->date, $i->status);

        }
    }

    public static function afficher($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher2($query){ return self::toDoList2(Query::CRUD($query)); }

    public function ajouter(){
        Query::CRUD("INSERT INTO `livre_or`(`idusers`, `idEvent`, `message`,`status`) VALUES ('$this->idusers','$this->idEvent','$this->message','$this->status')");
    }
}