<?php

class Emplacement
{
    private $id, $nom, $idEvent, $nbre, $date, $status;

    /**
     * @param $id
     * @param $nom
     * @param $idEvent
     * @param $nbre
     * @param $date
     * @param $status
     */
    public function __construct($id, $nom, $idEvent, $nbre, $date, $status)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->idEvent = $idEvent;
        $this->nbre = $nbre;
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
    public function getNbre()
    {
        return $this->nbre;
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


    public static function key(){ return new AES("}?gxB*`)KXdA=R2XAE!6");}

    public static function toDoList($query){
        $key = self::key();
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Emplacement($i->id, $key->decrypt($i->nom), $i->idEvent, $i->nbre, $i->date, $i->status);
            return $tab;
        }
    }

    public static function toDoList2($query){
        $key = self::key();
        if ($query){
           $i = $query->fetch(PDO::FETCH_OBJ);
           return new Emplacement($i->id, $key->decrypt($i->nom), $i->idEvent, $i->nbre, $i->date, $i->status);

        }
    }
    public static function afficher($query){
        return self::toDoList(Query::CRUD($query));
    }

    public function ajouter(){
        Query::CRUD("INSERT INTO `emplacement`(`nom`, `nbre`, `idEvent`,  `status`) VALUES ('$this->nom','$this->nbre','$this->idEvent','$this->status')");
    }
    public static function getTotalNbrePlace($id){
        $query = self::afficher("SELECT * FROM emplacement WHERE idEvent='$id'");
        $som = 0;
        if ($query){
            foreach ($query as $item)
                $som += $item->getNbre();
        }
        return $som;
    }


}