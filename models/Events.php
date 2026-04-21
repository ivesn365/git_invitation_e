<?php

class Events
{
    private $id;
    private $nom;
    private $titre;
    private $logo;
    private $photo;
    private $typeEvent;
    private $nbreBillets;
    private $date;
    private $adresse;
    private $telephone;
    private $modifie_moi;
    private $delete_me;
    private $status;
    private $message;
    
    private $commune;
    private $dateCommune;
    private $heureCommune;
    private $heureMesse, $lieuMesse;

    /**
     * @param $id
     * @param $nom
     * @param $logo
     * @param $typeEvent
     * @param $nbreBillets
     * @param $date
     * @param $adresse
     * @param $telephone
     * @param $modifie_moi
     * @param $delete_me
     * @param $status
     */
    public function __construct($id, $nom, $logo, $typeEvent, $nbreBillets, $date, $adresse, $telephone, $modifie_moi, $delete_me, $status,$message,$commune,$dateCommune,$heureCommune,$heureMesse,$lieuMesse,$titre, $photo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->titre = $titre;
        $this->logo = $logo;
        $this->photo = $photo;
        $this->typeEvent = $typeEvent;
        $this->nbreBillets = $nbreBillets;
        $this->date = $date;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->modifie_moi = $modifie_moi;
        $this->delete_me = $delete_me;
        $this->status = $status;
        $this->message = $message;
        $this->commune = $commune;
        $this->dateCommune = $dateCommune;
        $this->heureCommune = $heureCommune;
        $this->heureMesse = $heureMesse;
        $this->lieuMesse = $lieuMesse;
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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @return mixed
     */
    public function getTypeEvent()
    {
        return $this->typeEvent;
    }

    /**
     * @return mixed
     */
    public function getNbreBillets()
    {
        return $this->nbreBillets;
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
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getModifieMoi()
    {
        return $this->modifie_moi;
    }

    /**
     * @return mixed
     */
    public function getDeleteMe()
    {
        return $this->delete_me;
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
    public function getMessage()
    {
        return $this->message;
    }
      public function getCommune()
    {
        return $this->commune;
    }
    public function getDateCommune()
    {
        return $this->dateCommune;
    }

  public function getHeureCommune()
    {
        return $this->heureCommune;
    }
      public function getHeureMesse()
    {
        return $this->heureMesse;
    }

    public function getLieuMesse()
    {
        return $this->lieuMesse;
    }
    
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getTitre()
    {
        return $this->titre;
    }


    public static function key(){ return new AES('?}P$p5g7#6^}8^7qjUN[769u.S?LbNt35,*}J2G2s23{2NR:5N-fxd*497/x88a9X/y6=J35,dVw4[6a9cgf.MD92d6p8z_K{866L+!Z2FW(=u7T3if:R7%k)24k;8c8+v9B?=H]D%2mmYaEv;63v_f2:7Zzza6-N94;gi*g(X@C568Xc/57F458enzg#=!=xRSCa_A4)2_bq9T9T-%}qqN4{Pd2p$4yNP,F.Z9(39v;75n_Qp8!Hrhf84w*_/.pTa,.39TmeE,%t2C2rb365?[yyUBZ]b^XEvX(K%RXu83g)8a#3kHjd=sacAj,@mED_=9wQ+64G)3Qk#7)$V4!tkp6)SF#422Fvv3#pkZ+vA(7LHD:56C%-t$5}D:/~qP2BAB6g4LS[mD^52gR3Dshy-J~T66?AP~;cX*2%{vnye86{4xRKGV]m3T6~Jy:U9=U5[$USF735w:f*n%f6!6U(LG(Jz}kgax*X8GxVt8Py,PBG:[-/R998$2a7[ad-@9]wG49.yqw~Z6cNwNMi2VRC+S]g^P7bNHdQ28i}~:E]c6@UftV9bR8rC43Pk]=6.{f-,WR5.-*(Yj;5[zSpAc68cd+3)[8@69Vf6Ut98MV4eAT?S@53Uan6WLkmRB5U6gi@AU/P+#79%W46WCmk;38a4tn;ZN8}9p4eWV{BxnG3#8{gN8!dEW8!g.9C;+DEUQWm.Re3NDWzYrL4%tEzN4P_9XG2^p/GQhe~M$za7cx+!8{$2*{54U(en6d9PW72_!4r8@3+3HVwu~)w@Kjb-3U2qg9Q4yebw95A6!SXB32,/9v6v(599K?qe#6?Y^{h)d;,g6Qm]~*599dwHQp_V6p7bY]tnJ5b96}?ER*nR@=#Md!pM3b9Tp7q3n38^9DwnMPUZ?yC2Cm9^T/KjVw:$t59NXf78p8jKn94.)89T^2aucCU/JCME]4M=822d$is292ZFkTK5;ZzW~)M79}F7v2[piggLFjTJ#vHm3E7C_a'); }

    public static function newInstance($query){
        $key = self::key();
        if ($query){
            while($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Events($i->id, $key->decrypt($i->nom), $key->decrypt($i->logo), $key->decrypt($i->typeEvent), $i->nbreBillets, $i->date, $key->decrypt($i->adresse), $key->decrypt($i->telephone), $key->decrypt($i->modifie_moi), $key->decrypt($i->delete_me), $key->decrypt($i->status), $key->decrypt($i->message), $key->decrypt($i->commune), $key->decrypt($i->dateCommune), $key->decrypt($i->heureCommune), $key->decrypt($i->heureMesse), $key->decrypt($i->lieuMesse), $key->decrypt($i->titre), $key->decrypt($i->photo));
            return $tab;
        }
    }
    public static function newInstance2($query){
        $key = self::key();
        if ($query){
          $i = $query->fetch(PDO::FETCH_OBJ);
           return  new Events($i->id, $key->decrypt($i->nom), $key->decrypt($i->logo), $key->decrypt($i->typeEvent), $i->nbreBillets, $i->date, $key->decrypt($i->adresse), $key->decrypt($i->telephone), $key->decrypt($i->modifie_moi), $key->decrypt($i->delete_me), $key->decrypt($i->status), $key->decrypt($i->message), $key->decrypt($i->commune), $key->decrypt($i->dateCommune), $key->decrypt($i->heureCommune), $key->decrypt($i->heureMesse), $key->decrypt($i->lieuMesse), $key->decrypt($i->titre), $key->decrypt($i->photo));
        }
    }

    public static function afficher($query){
        return self::newInstance(Query::CRUD($query));
    }
    public static function afficher2($query){
        return self::newInstance2(Query::CRUD($query));
    }

    public function ajouter(){
        Query::CRUD("INSERT INTO `events`(`nom`, `logo`, `typeEvent`, `nbreBillets`, `date`, `adresse`, `telephone`, `status`,modifie_moi, delete_me,message,commune,dateCommune,heureCommune, heureMesse,lieuMesse,titre,photo) VALUES ('$this->nom','$this->logo','$this->typeEvent','$this->nbreBillets','$this->date','$this->adresse','$this->telephone','$this->status','$this->modifie_moi', '$this->delete_me', '$this->message', '$this->commune', '$this->dateCommune', '$this->heureCommune', '$this->heureMesse', '$this->lieuMesse', '$this->titre', '$this->photo')");
    }






}