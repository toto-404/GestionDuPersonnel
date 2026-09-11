<?php
class M_generique
{
    protected $cnx;

    protected function Connexion()
    {
        $this->cnx = mysqli_connect("localhost", "root", "", "empCse");
        mysqli_set_charset($this->cnx, 'utf8');
    }

    protected function GetCnx()
    {
        return $this->cnx;
    }

    public function Deconnexion()
    {
        mysqli_close($this->cnx);
    }
}