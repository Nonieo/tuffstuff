<!DOCTYPE html>
<html>
    <head>
        <title>Week #6 Lab</title>
    </head>
    <body>
        <?php
        class Car {
            public string $make;
            public string $model;
            public int $year;
            public string $plateNumber;

            public function __construct(string $make, string $model, int $year, string $plateNumber) {
                $this->make = $make;
                $this->model = $model;
                $this->year = $year;
                $this->plateNumber = $plateNumber;
            }
        }

        class Pet {
            public string $species;
            public string $name;

            public function __construct(string $species, string $name) {
                $this->species = $species;
                $this->name = $name;
            }
        }

        class Neighbor {
            public string $firstName;
            public string $lastName;
            public string $address;
            public string $city;
            public string $state;
            public Car $car;
            public Pet $pet;

            public function __construct(
                string $firstName,
                string $lastName,
                string $address,
                string $city,
                string $state,
                Car $car,
                Pet $pet
            ) {
                $this->firstName = $firstName;
                $this->lastName = $lastName;
                $this->address = $address;
                $this->city = $city;
                $this->state = $state;
                $this->car = $car;
                $this->pet = $pet;
            }

            public function convertJSON(): string {
                $data = [
                    'firstName' => $this->firstName,
                    'lastName' => $this->lastName,
                    'address' => $this->address,
                    'city' => $this->city,
                    'state' => $this->state,
                    'car' => [
                        'make' => $this->car->make,
                        'model' => $this->car->model,
                        'year' => $this->car->year,
                        'plateNumber' => $this->car->plateNumber
                    ],
                    'pet' => [
                        'species' => $this->pet->species,
                        'name' => $this->pet->name
                    ]
                ];
                return json_encode($data);
            }
        }

        $neighbors = [];

        $neighbors[] = new Neighbor(
            'Albert',
            'Einstein',
            '123 Main St',
            'Princeton',
            'NJ',
            new Car('Mercedes', 'Benz', 2020, 'ABC123'),
            new Pet('Dog', 'Einstein')
        );

        $neighbors[] = new Neighbor(
            'Marie',
            'Curie',
            '456 Oak Ave',
            'Paris',
            'FR',
            new Car('Renault', 'Clio', 2018, 'XYZ789'),
            new Pet('Cat', 'Radium')
        );

        $neighbors[] = new Neighbor(
            'Nikola',
            'Tesla',
            '789 Elm Rd',
            'New York',
            'NY',
            new Car('Ford', 'Model T', 1915, 'TES123'),
            new Pet('Pigeon', 'Spark')
        );

        foreach ($neighbors as $neighbor) {
            echo $neighbor->convertJSON() . "<br>\n";
        }

        ?>
    </body>
</html>
