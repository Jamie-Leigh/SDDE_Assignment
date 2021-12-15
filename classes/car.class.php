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
            if($filters['min_price']) {
                $params['price']['min_price'] = $filters['min_price'];
            }
            if($filters['max_price']) {
                $params['price']['max_price'] = $filters['max_price'];
            }
            if($filters['min_mileage']) {
                $params['mileage']['min_mileage'] = $filters['min_mileage'];
            }
            if($filters['max_mileage']) {
                $params['mileage']['max_mileage'] = $filters['max_mileage'];
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
        if ($car_filters['search']) {
            $car_data = $this->searchCars($car_filters['search']);
        } else {
            if ($car_filters['price']['min_price']) {
                $query .= " AND price_per_day >= :min_price";
                $data['min_price'] = $car_filters['price']['min_price'];
            }
            if ($car_filters['price']['max_price']) {
                $query .= " AND price_per_day <= :max_price";
                $data['max_price'] = $car_filters['price']['max_price'];
            }
            if ($car_filters['mileage']['min_mileage']) {
                $query .= " AND mileage >= :min_mileage";
                $data['min_mileage'] = $car_filters['mileage']['min_mileage'];
            }
            if ($car_filters['mileage']['max_mileage']) {
                $query .= " AND mileage <= :max_mileage";
                $data['max_mileage'] = $car_filters['mileage']['max_mileage'];
            }
            if ($car_filters['fuel']) {
                $query .= " AND fuel = :fuel";
                $data['fuel'] = $car_filters['fuel'];
            }
            if ($car_filters['transmission']) {
                $query .= " AND transmission = :transmission";
                $data['transmission'] = $car_filters['transmission'];
            }
            $fullQuery .= $query;
            if ($date) {
                $fullQuery .= " AND date <> :date";
                $data["date"] = $date;
            }
            $fullQuery .= " AND NOT EXISTS (";
            $fullQuery .= $query;
            if ($date) {
                $fullQuery .= " AND date = :date1)";
                $data["date1"] = $date;
            }
            return ($fullQuery);
            $fullQuery .= ";";
            // return([$fullQuery, $data]);
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
        price = :price,
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