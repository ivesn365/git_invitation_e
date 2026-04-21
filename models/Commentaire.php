<?php

class Commentaire
{

    private $id, $idBillet, $comments, $date, $status;

    /**
     * @param $id
     * @param $idBillet
     * @param $comments
     * @param $date
     * @param $status
     */
    public function __construct($id, $idBillet, $comments, $date, $status)
    {
        $this->id = $id;
        $this->idBillet = $idBillet;
        $this->comments = $comments;
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
    public function getIdBillet()
    {
        return $this->idBillet;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
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
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Commentaire($i->id, $i->idBillet, Events::key()->decrypt($i->comments), $i->date, $i->status);
            return $tab;
        }
    }

    public static function toDoList2($query){
        if ($query){
           $i = $query->fetch(PDO::FETCH_OBJ);
           return new Commentaire($i->id, $i->idBillet, Events::key()->decrypt($i->comments), $i->date, $i->status);
        }
    }

    public static function afficher($query){
        return self::toDoList(Query::CRUD($query));
    }
    public static function afficher2($query){
        return self::toDoList2(Query::CRUD($query));
    }

    public function ajouter(){
        Query::CRUD("INSERT INTO `commentaire`(`idBillet`, `comments`, `status`) VALUES ('$this->idBillet','$this->comments','$this->status')");
    }


}