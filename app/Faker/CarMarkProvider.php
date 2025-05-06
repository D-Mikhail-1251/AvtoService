<?php

namespace App\Faker;

use Faker\Provider\Base;

class CarMarkProvider extends Base
{
    protected static $carBrands = [
        'Toyota', 'Ford', 'BMW', 'Mercedes-Benz', 'Audi',
        'Volkswagen', 'Honda', 'Hyundai', 'Kia', 'Lexus',
        'Mazda', 'Nissan', 'Chevrolet', 'Renault', 'Peugeot'
    ];

    public function carMarks()
    {
        return static::randomElement(static::$carBrands);
    }
}
