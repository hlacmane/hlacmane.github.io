<?php 

echo (5==6) ? "true" : "false";
echo "<br>";
echo (5=="5") ? "true" : "false";
echo "<br>";
echo (5==="5") ? "true" : "false";

echo "<br>";
echo "===CarPark Test===";
echo "<br>";
			
  class CarPark
  {
    private $capacity = 50;	//max capacity
    private $used = 0;		//cars using space

    function addCar()		//when car arrives
    {
      $avail = $this->getavail();
      if ($avail == 0)
      {
				echo "car park full bich<br>";
      }
      else
      {
				$this->used += 1;
      }
    }

    function carLeave()		//when car leaves
    {
      if ($this->used == 0)
      {
				echo "car cant leave as no cars in car park<br>";
      }
      else
      {
				$this->used -= 1;
      }
    }

    function getavail()		//get available spaces
    {
      return $this->capacity - $this->used;
    }

    function carHere()		//cars present
    {
			echo "Cars Here: ".$this->used."<br>";
      return $this->used;
    }
  }

  $atest = new CarPark();
  $atest->carHere();	
	echo "Car arriving! - ";
	$atest->addCar();
  $atest->carHere();
	echo "Car leaving! - ";
	$atest->carLeave();
	$atest->carHere();

?>