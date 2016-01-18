<?php
/*
 My simple decorator example1
*/
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('display_errors', 'On');

    abstract class Beverage
    {

        public $description = "Unknown beverage";

        public function getDescription()
        {
            return $this->description;
        }

        abstract public function cost();

    }

    abstract class AddonsDecorator extends Beverage
    {

    }


    class Espresso extends Beverage
    {
        public function  __construct()
        {
            $this->description = "Espresso";

        }

        public function cost()
        {
            return 2.99;
        }
    }

    class Capuchino extends Beverage
    {
        public function  __construct()
        {
            $this->description = "Capuchino";
        }

        public function cost()
        {
            return 4.55;
        }
    }


    class Milk extends AddonsDecorator
    {

        public $Beverage;

        public function  __construct(Beverage $Beverage)
        {
            $this->Beverage = $Beverage;
        }

        public function getDescription()
        {
            return $this->Beverage->getDescription() . ' plus Milk!';
        }

        public function cost()
        {
            return 0.5 + $this->Beverage->cost();
        }
    }

    class Powder extends AddonsDecorator
    {

        public $Beverage;

        public function  __construct(Beverage $Beverage)
        {
            $this->Beverage = $Beverage;
        }

        public function getDescription()
        {
            return $this->Beverage->getDescription() . ' plus Powder!!';
        }

        public function cost()
        {
            return 0.81 + $this->Beverage->cost();
        }
    }

    class Sugar extends AddonsDecorator
    {

        public $Beverage;

        public function  __construct(Beverage $Beverage)
        {
            $this->Beverage = $Beverage;
        }

        public function getDescription()
        {
            return $this->Beverage->getDescription() . ' plus Sugar!!';
        }

        public function cost()
        {
            return 0.21 + $this->Beverage->cost();
        }
    }

    $befr1 = new Espresso();


    echo $befr1->getDescription() . ' - $ ' . $befr1->cost() . '<br>';


    $befr2 = new Capuchino();
    $befr2 = new Milk($befr2);
    $befr2 = new Milk($befr2);
    $befr2 = new Powder($befr2);
    echo $befr2->getDescription() . ' - $ ' . $befr2->cost() . '<br>';

