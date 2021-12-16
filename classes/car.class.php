<?php
class Car {
    protected $Conn;
    public function __construct($Conn){
        $this->Conn = $Conn;
    }

	private function generateParams($filters){
        if ($filters['search']) {
            $params['search'] = $filters['search'];
        }
        else if ($filters['filter']) {
            if($filters['min_price_per_day']) {
                $params['price']['min_price'] = $filters['min_price_per_day'];
            }
            if($filters['max_price_per_day']) {
                $params['price']['max_price'] = $filters['max_price_per_day'];
            }
            if($filters['fuel_type']) {
                $params['fuel'] = $filters['fuel_type'];
            }
            if($filters['transmission_type']) {
                $params['transmission'] = $filters['transmission_type'];
            }
        }
          
        return $params;
	}

    private function searchCars($query_string) {
        $query = "SELECT * FROM cars WHERE active = 1 AND make LIKE :query_string;";
        $stmt = $this->Conn->prepare($query);
        $data = [
            "query_string" => "%".$query_string."%"
        ];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCars(){
        $query = "SELECT * FROM cars";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllFilteredActiveCars($filters, $date) {
        // $date is an array the user passed in
        $car_filters = $this->generateParams($filters);
        $query = "SELECT DISTINCT cars.* FROM cars INNER JOIN car_order ON cars.car_id = car_order.car_id WHERE active = 1";
        $data = [];
        $firstHalfQuery = $query;
        $secondHalfQuery = $query;
        if ($car_filters['search']) {
            $car_data = $this->searchCars($car_filters['search']);
        } else {
            if ($car_filters['price']['min_price']) {
                $firstHalfQuery .= " AND price_per_day >= :min_price";
                $secondHalfQuery .= " AND price_per_day >= :min_price1";
                $data['min_price'] = (int)$car_filters['price']['min_price'];
                $data['min_price1'] = (int)$car_filters['price']['min_price'];
            }
            if ($car_filters['price']['max_price']) {
                $firstHalfQuery .= " AND price_per_day <= :max_price";
                $secondHalfQuery .= " AND price_per_day <= :max_price1";
                $data['max_price'] = (int)$car_filters['price']['max_price'];
                $data['max_price1'] = (int)$car_filters['price']['max_price'];
            }
            if ($car_filters['fuel']) {
                $firstHalfQuery .= " AND fuel = :fuel";
                $secondHalfQuery .= " AND fuel = :fuel1";
                $data['fuel'] = $car_filters['fuel'];
                $data['fuel1'] = $car_filters['fuel'];
            }
            if ($car_filters['transmission']) {
                $firstHalfQuery .= " AND transmission = :transmission";
                $secondHalfQuery .= " AND transmission = :transmission1";
                $data['transmission'] = $car_filters['transmission'];
                $data['transmission1'] = $car_filters['transmission'];
            }
            $fullQuery .= $firstHalfQuery;
            if ($date) {
                $fullQuery .= " AND date <> :date";
                $data["date"] = $date;
            }
            $fullQuery .= " AND NOT EXISTS (";
            $fullQuery .= $secondHalfQuery;
            if ($date) {
                $fullQuery .= " AND date = :date1)";
                $data["date1"] = $date;
            }
            $fullQuery .= ";";
            $stmt = $this->Conn->prepare($fullQuery);
            $stmt->execute($data);
            $car_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $car_data;
    }

    public function getCar($car_id) {
        $query = "SELECT * FROM cars WHERE active = 1 AND car_id = :car_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "car_id" => $car_id
        ]);
        $car_data = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM car_images WHERE car_id = :car_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "car_id" => $car_id
        ]);
        $car_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $car_data;
    }

    public function updateCar($car_details) {
        $query = "UPDATE cars SET
        make = :make,
        model = :model,
        variant = :variant,
        mileage = :mileage,
        year_built = :year_built,
        description = :description,
        fuel = :fuel,
        transmission = :transmission,
        seats = :seats,
        colour = :colour,
        body_type = :body_type,
        price_per_day = :price,
        active = :active
        WHERE car_id = :car_id;";
        $stmt = $this->Conn->prepare($query);
        $data = [
            'make' => $car_details['make'],
            'model' => $car_details['model'],
            'variant' => $car_details['variant'],
            'mileage' => (int)$car_details['mileage'],
            'year_built' => (int)$car_details['year_built'],
            'description' => $car_details['description'],
            'fuel' => $car_details['fuel'],
            'transmission' => $car_details['transmission'],
            'seats' => (int)$car_details['seats'],
            'colour' => $car_details['colour'],
            'body_type' => $car_details['body_type'],
            'price' => (float)$car_details['price'],
            'active' => (bool)$car_details['active'],
            'car_id' => (int)$car_details['car_id'],
        ];
        $stmt->execute($data);
        return true;
    }
}