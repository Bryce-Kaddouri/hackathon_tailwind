<?php
class PdoCtf
{
    /**
     * Propriétés privées de la classe PdoCtf pour les phases de tests
     */
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=hackathon_v2';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoCtf = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoCtf::$monPdo = new PDO(PdoCtf::$serveur . ';' . PdoCtf::$bdd, PdoCtf::$user, PdoCtf::$mdp);
        PdoCtf::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function __destruct()
    {
        PdoCtf::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoCtf = PdoCtf::getPdoCtf();
     * @return l'unique objet de la classe PdoCtf
     */
    public static function getPdoCtf()
    {
        if (PdoCtf::$monPdoCtf == null) {
            PdoCtf::$monPdoCtf = new PdoCtf();
        }
        return PdoCtf::$monPdoCtf;
    }

     /**
     * Retourne les informations d'une équipe
     * @param $login
     * @param $mdp
     * @return l'id, le libelle et le login sous la forme d'un tableau associatif 
     */
    public function getInfosEquipe($login, $mdp)
    {
        $hash = hash('sha512', $mdp);
        $req = "SELECT equipeID, libelle, login  
                    FROM equipe 
                    WHERE login=:login AND motDePasse=:mdp;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':login' => $login, ':mdp' => $hash]);
        $ligne = $req->fetch();
        return $ligne;
    }

     /**
     * Retourne les informations de toutes les catégoiries
     * @return l'id, le libelle des categiories sous la forme d'un tableau associatif 
     */
    public function getCategories()
    {
        $req = "SELECT * from categorie;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute();
        $lignes = $req->fetchAll();
        return $lignes;

    }

    public function getInfoDateSession($numSession){
        $req = "select CURRENT_TIMESTAMP as dateNow, dateDebut, dateFin from SESSION where numSession = :numSession;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':numSession' => $numSession]);
        $ligne = $req->fetch();
        return $ligne;
    }

   /**
     * Retourne la difference en seconde entre deux dates
     * @return diff_second qui est un enttier
     */
    public function getTimer($date1, $date2){
        $req = "select TIMESTAMPDIFF(SECOND, :date1 , :date2) as diff_seconds;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':date1' => $date1, ':date2' => $date2]);
        $ligne = $req->fetch();
        return $ligne['diff_seconds'];
    }

     /**
     * Retourne l'id de l'equipe qui est un entier
     */
    public function getIdEquipe($login)
    {
        $req = "SELECT equipeID 
                FROM equipe
                WHERE login=:login;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':login' => $login]);
        $ligne = $req->fetch();
        return $ligne['equipeID'];
    }

     /**
     * Retourne l'ensemble des enigmes qui ne sonbt pas resolues'
     * @return enigmesNonResoules sous la forme d'un tableau
     */
    public function getEnigmesNonResolues($idEquipe)
    {
        // tout sauf le mot de passe et le flag
        $req = "select * from enigme inner join concerner on concerner.noEnigme = enigme.numEnigme where numEnigme not in (select noEnigme from validation where idEquipe=:idEquipe);";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe]);

        $lignes = $req->fetchAll();
        return $lignes;
    }

         /**
     * Retourne l'ensemble des enigmes qui ne sont resolues'
     * @return enigmesResoules sous la forme d'un tableau
     */

    public function getEnigmesResolues($idEquipe)
    {
        // tout sauf le mot de passe et le flag
        $req = "select * from enigme  inner join concerner on concerner.noEnigme = enigme.numEnigme where numEnigme in (select noEnigme from validation where idEquipe=:idEquipe)";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe]);

        $lignes = $req->fetchAll();
        return $lignes;
    }

         /**
          * @param idEquipe
          * @param noCateg
     * Retourne l'ensemble des enigmes qui ne sont pas resolues trier par categories'
     * @return enigmesNonResoules sous la forme d'un tableau
     */

    public function getEnigmesNonResoluesByCateg($idEquipe, $noCateg)
    {
        // tout sauf le mot de passe et le flag
        $req = "select * from enigme inner join concerner on concerner.noEnigme = enigme.numEnigme where numEnigme not in (select noEnigme from validation where idEquipe=:idEquipe) and noCategorie = :noCateg;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe, ':noCateg' => $noCateg]);

        $lignes = $req->fetchAll();
        return $lignes;
    }

    public function getEnigmesResoluesByCateg($idEquipe, $noCateg)
    {
        // tout sauf le mot de passe et le flag
        $req = "select * from enigme  inner join concerner on concerner.noEnigme = enigme.numEnigme where numEnigme in (select noEnigme from validation where idEquipe=:idEquipe) and noCategorie = :noCateg;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe,  ':noCateg' => $noCateg]);

        $lignes = $req->fetchAll();
        return $lignes;
    }

    public function getSessionEnCours($idEquipe)
    {
        $req = "select numSession as current_session from session where idEquipe = :idEquipe and dateDebut = (select MIN(dateDebut) FROM session where idEquipe = :idEquipe);";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe]);
        $ligne = $req->fetch();
        return $ligne;

    }

    public function getUneEnigme($numChallenge)
    {
        $req = "SELECT numEnigme, libelle, url, thematique, contenu, nbPoints , noCategorie
                FROM enigme 
                WHERE numEnigme=:numero;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':numero' => $numChallenge]);
        $ligne = $req->fetch();
        return $ligne;
    }
    
}
    ?>