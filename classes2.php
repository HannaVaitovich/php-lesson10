<?php

interface Pricable
{
  public function getPrice();
}

abstract class Veichle 
{
  protected $color;
  private $make;

  public function __construct($color, $make)
  {
    $this->color = $color;
    $this->make = $make;
  }

}

class Car extends Veichle implements Pricable
{

  private $year;
  private $price;

  public function __construct($color, $make, $year, $price)
  {
    parent::__construct($color, $make);
    $this->year = $year;
    $this->price = $price;
  }

  public function getPrice()
  {
    if ($this->year > 2011) {
      return ($this->price - 2000);
    } else
    {
      return $this->price;
    }
  }
  public function getColor ()
  {
    return $this->color;
  }

}

$car1 = new Car ('white', 'BMW', 2013, 35000);
echo $car1->getPrice()."<br>";
echo $car1->getColor()."<br>";



$car2 = new Car ('red', 'Opel', 2010, 12000);
echo $car2->getPrice()."<br>";

//exit();

interface Watchable
{
  public function setTimer($timer);
  public function watch();
}

class Electronics 
{
  protected $brand;
  protected $price;

  public function getDescription()
  {
    echo "Brand is ".$this->brand.". "." Price is ".$this->price;
  }
  
}

class Television extends Electronics implements Pricable, Watchable
{
  private $screen_size = 32;
  public $timer;
  
  public function __construct($brand, $price, $screen_size)
  {
    $this->brand = $brand;
    $this->price = $price;
    $this->screen_size = $screen_size;
  }

  public function getScreenSize($screen_size)
  {
    return $this->screen_size = $screen_size;
  }

  public function getFullDescription ()
  {
    return parent::getDescription();

  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setTimer($timer = 0)
  {
    $this->timer = $timer;
  }

  public function getTimer()
  {
    return $this->timer;
  }

  public function watch()
  {
    if($this->timer > 0) {
      echo "You have ".$this->timer." minutes left before power off.";
    } else {
      echo "Your time ran out.";
    }
    
  }

}

$television1 = new Television("LG", 5000, 32);
echo $television1->getScreenSize(43)."<br>";
echo $television1->getFullDescription()."<br>";
echo $television1->getPrice()."<br>";
echo $television1->setTimer(10)."<br>";
echo $television1->getTimer()."<br>";
echo $television1->watch()."<br>";

$television2 = new Television('Samsung', 3500, 32);
echo $television2->getScreenSize(52)."<br>";
echo $television2->setTimer(0)."<br>";
echo $television2->watch()."<br>";

interface Usable
{
  public function canUse();
}

class SchoolSupplies
{
  protected $name;

  public function setName($name)
  {
    return $this->name = $name;
  }

}

class Pen extends SchoolSupplies implements Usable
{
  private $color;
  private $inkColor;
  public static $total_pens = 0;
  protected $inkAmount;

  public function __construct ($color)
  {
    $this->color = $color;
    Pen::$total_pens++;
  }
  
  public function getInkColor()
  {
    if ($this->color === 'red') 
    {
      return $this->inkColor = 'black';
    }
    else 
    {
      return $this->inkColor = 'blue';
    }
  }
  
  public function getColor()
  {
    return $this->color;
  }

  public function setInkAmount ($inkAmount = 0)
  {
    $this->inkAmount = $inkAmount;
  }

  public function canUse ()
  {
    if ($this->inkAmount >= 1) {
      echo "You can use your pen.";
    } else {
      echo "You need a new pen.";
    }
    
  }
}

$pen1 = new Pen('red');
echo $pen1->getColor().": ";
echo $pen1->getInkColor()."<br>";
echo $pen1->setInkAmount(2);
echo $pen1->canUse()."<br>";

$pen2 = new Pen('pink');
echo $pen2->setName("Best Pen Ever")."<br>";
echo $pen2->getColor().": ";
echo $pen2->getInkColor()."<br>";
echo $pen2->setInkAmount();
echo $pen2->canUse()."<br>";

echo Pen::$total_pens ."<br>";

interface AbleToLayEggs
{
  public function setGender($gender);
  public function abilityToLayEggs();
}

abstract class Bird
{
  protected $color;
  protected $age;

  abstract public function __construct($color, $age);
  
}

class Duck extends Bird implements AbleToLayEggs
{
  private $gender;
  
  public function __construct($color, $age)
  {
    $this->color = $color;
    $this->age = $age;
  }

  public function abilityToFly()
  {
    if ($this->age >= 1 && $this->age <= 7) {
      echo "Duck can fly.";
    }
    else 
    {
      echo "Duck can't fly.";
    }
  }

  public function getAge()
  {
    return $this->age;
  }

  public function setGender($gender)
  {
    return $this->gender = $gender;
  }

  public function abilityToLayEggs()
  {
    if($this->gender === "female")
    {
      echo "Duck is able to lay eggs.";
    } 
    else
    {
      echo "Duck is a male and can't lay eggs.";
    } 
    
  }
}

$duck1 = new Duck('white', 5);
echo $duck1->getAge()."<br>";
echo $duck1->abilityToFly()."<br>";
echo $duck1->setGender("female")."<br>";
echo $duck1->abilityToLayEggs()."<br>";

$duck2 = new Duck('black', 8);
echo $duck2->getAge()."<br>";
echo $duck2->abilityToFly()."<br>";
echo $duck2->setGender("male")."<br>";
echo $duck2->abilityToLayEggs()."<br>";

interface Shipable
{
  public function getFreeShipping();
}

class Business
{
  protected $price;
  protected $discount;

  public function setDescription($price, $discount)
  {
    $this->price = $price;
    $this->discount = $discount;
  }
}

class Product extends Business implements Pricable
{
  private $category;
  private $views;
  private $shipping;
  
  public function __construct($category, $views)
  {
    $this->category = $category;
    $this->views = $views;
  }

  public function mostPopular()
  {
    if ($this->views >= 100) {
      echo "Most popular in ", $this->category;
    }
    else
    {
      return $this->views;
    }
  }

  public function getPrice()
  {
    return $this->price = round($this->price - ($this->price * $this->discount) / 100);
  }

  public function getFreeShipping()
  {
    $shipping = 5.99;
    if($this->price >= 2000 || $this->views >= 200)
    {
      $shipping = 0;
      echo "Your order is eligable for a Free Shipping";
    } 
    else 
    {
      echo "Shipping is ", $shipping;
    }
  }
}

$product1 = new Product('Dresses', 150);
$product1->setDescription(1000, 10);
echo "Price: ", $product1->getPrice()."<br>";
echo $product1->mostPopular()."<br>";
echo $product1->getFreeShipping()."<br>";

$product2 = new Product('Antiques', 250);
$product2->setDescription(20000, 0);
echo "Price: ", $product2->getPrice()."<br>";
echo $product2->mostPopular()."<br>";
echo $product2->getFreeShipping()."<br>";





?>