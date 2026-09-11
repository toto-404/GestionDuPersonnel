<?php

require_once "M_generique.php";
require_once "metiers/Employe.php";

class M_employe extends M_generique
{
    public function GetListe()
    {
        $resultat = array();

        $this->Connexion();

        $req = "select * from employe";
        $res = mysqli_query($this->GetCnx(), $req);
        $ligne = mysqli_fetch_assoc($res);

        while ($ligne)
        {
             $employe = new Employe($ligne['emp_matricule'], $ligne['emp_nom'], $ligne['emp_prenom'], $ligne['emp_service']);
                 $resultat[] = $employe;
                 $ligne = mysqli_fetch_assoc($res);
        }

        $this->Deconnexion();

        return $resultat;
    }
}
