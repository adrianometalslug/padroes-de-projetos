<?php

function __autoload($class_name)
{
    include $class_name . '.php';
}

class Client
{

    //Para a instaciação direta
    private $fly1;
    private $fly2;
    //Para clonagem
    private $c1Fly;
    private $c2Fly;
    private $updatedCloneFly;

    public function __construct()
    {
        $this->fly1 = new MaleProto();
        $this->fly2 = new FemaleProto();

        //clona
        $this->c1Fly = clone $this->fly1;
        $this->c2Fly = clone $this->fly2;
        $this->updatedCloneFly = clone $this->fly2;

        //atualiza clones
        $this->fly1->mated = "true";
        $this->fly2->fecundity = "186";
        $this->updatedCloneFly->eyeColor = "purple";
        $this->updatedCloneFly->wingBeat = "220";
        $this->updatedCloneFly->unitEyes = "750";
        $this->updatedCloneFly->fecundity = "92";

        //Eniva por meio de método que usa indução de tipo
        $this->showFly($this->fly1);
        $this->showFly($this->fly2);
        $this->showFly($this->updatedCloneFly);
    }

    public function showFly(IPrototype $fly)
    {
        echo "Eye color: " . $fly->eyeColor . "<br/>";
        echo "Wing Beats/second: " . $fly->wingBeat . "<br/>";
        echo "Eye units: " . $fly->unitEyes . "<br/>";
        $genderNow = $fly::gender;
        echo "Gender: ";
        $genderNow . "<br/>";
        if ($genderNow == "FEMALE") {
            echo "Number of eggs: " . $fly->fecundity . "<p/>";
        } else {
            echo "Mated: " . $fly->mated . "<p/>";
        }
    }

}
$worker = new Client();