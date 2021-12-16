<?php
class Basket {
	protected $Conn;
	public function __construct($Conn) {
		$this->Conn = $Conn;
	}
	
	private function clearBasket(){
		$query = "DELETE FROM car_basket WHERE user_id = :user_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id']
		]);
		return true;
	}

	private function addDatesToOrder(){
		$carsInBasket = $this->getBasketForUser();
		// take cars out of stock
		$carsToSell = 0;
		$data = [];
		foreach($carsInBasket as $index => $car) {
			$query = "INSERT INTO car_order (car_id, date) VALUES (:car_id, :date);";
			$data = [
				'car_id' => $car['car_id'],
				'date' => $car['date']
			];
			$stmt = $this->Conn->prepare($query);
			$stmt->execute($data);
		}
		return true;
	}

	public function isInBasket($car_id, $date) {
		$query = "SELECT * FROM car_basket WHERE user_id = :user_id AND car_id = :car_id AND date = :date";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id'],
			"car_id" => $car_id,
			"date" => $date
		]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function toggleInBasket($car_id){
		$isInBasket = $this->isInBasket($car_id, $_SESSION['date']);
		if($isInBasket) {
			// Is already in basket - so remove.
			$query = "DELETE FROM car_basket WHERE basket_id = :basket_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute([
				"basket_id" => $isInBasket['basket_id']
			]);
			return false; // Return false for "removed"

		} else {
			// Is not in basket - so add
			$query = "INSERT INTO car_basket (user_id, car_id, date) VALUES (:user_id, :car_id, :date)";
			$stmt = $this->Conn->prepare($query);
			
			return $stmt->execute(array(
				"user_id" => $_SESSION['user_data']['user_id'],
				"car_id" => $car_id,
				"date" => $_SESSION['date']
			));
			return true; // Return true for "added"
		}
	}
	public function getBasketForUser(){
		$query = "SELECT * FROM car_basket LEFT JOIN cars ON car_basket.car_id = cars.car_id WHERE car_basket.user_id = :user_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id']
		]);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	public function checkoutForUser(){
		//get cars in basket
		$addDatesToOrder = $this->addDatesToOrder();

		//empty basket
		$basketCleared = $this->clearBasket();
	}

}
