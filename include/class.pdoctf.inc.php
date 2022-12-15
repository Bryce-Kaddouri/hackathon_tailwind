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
}
    ?>