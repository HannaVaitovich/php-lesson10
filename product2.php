<?php
/**
 *
 */
 trait Shipping
 {
  protected function setShipping()
  {
    if ($this->discount != 0) 
    { 
      return $this->shipping = 300;
    } else {
      return $this->shipping = 250;
    }
     }
 }


interface DiscountedPrice
{
  public function setDiscPrice();
}

abstract class Product
{
  protected $price;
  protected $name;
  public $shipping;
  public $discount;
  
  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  abstract function setDiscount();
  abstract function getPrice();

}

class Furniture extends Product 
{
  private $weight;

  public function __construct($name, $price, $weight)
  {
    parent::__construct($name, $price);
    $this->weight = $weight;
  }

  public function setDiscount()
{
  if ($this->weight > 10000) 
    {
      $this->discount = 10;
    } else {
      $this->discount = 0;
    }
} 

public function getDiscount()
{
  return $this->discount;
}

  public function getPrice() {
    return $newPrice = $this->price - ($this->price * ($this->discount / 100));
  }

 
  use Shipping;

  public function getShipping()
  {
    return $this->setShipping();
  }

}


$bed1 = new Furniture ("bed", 2000, 9000);
echo $bed1->setDiscount();
echo $bed1->getDiscount();
echo "<br>";
echo $bed1->getPrice()."<br>";
echo $bed1->getShipping();
echo "<br>";
//exit();


class Cookware extends Product implements DiscountedPrice
{

  public function __construct($name, $price)
  {
   parent::__construct($name, $price); 
  }

  public function setDiscount()
  {
      $this->discount = 10;
  }
  
  public function setDiscPrice()
  {
    $this->price = $this->price - ($this->price * $this->discount / 100);
  }

  public function getPrice()
  {
    return $this->price;
  }
  
 use Shipping;
  public function getShipping ()
  {
      return $this->setShipping($this->shipping);
  }
}

$cookware1 = new Cookware("Frying pan", 3000);
echo $cookware1->setDiscount()."<br>";
$cookware1->setDiscPrice()."<br>";
echo $cookware1->getPrice()."<br>";
echo $cookware1->getShipping()."<br>";



class Bedding extends Product implements DiscountedPrice
{
  public function __construct($name, $price)
  {
   parent::__construct($name, $price); 
  }

  public function setDiscount()
  {
      $this->discount = 10;
  }
  
  public function setDiscPrice()
  {
    $this->price = $this->price - ($this->price * $this->discount / 100);
  }

  public function getPrice()
  {
    return $this->price;
  }
  
 use Shipping;
  public function getShipping ()
  {
      return $this->setShipping($this->shipping);
  }
}

$duvetCover1 = new Bedding("Lily", 5000);
echo $duvetCover1->setDiscount()."<br>";
$duvetCover1->setDiscPrice()."<br>";
echo $duvetCover1->getPrice()."<br>";
echo $duvetCover1->getShipping()."<br>";



?>