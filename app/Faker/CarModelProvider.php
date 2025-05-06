<?php

namespace App\Faker;

use Faker\Provider\Base;

class CarModelProvider extends Base
{
    protected static $carModels = [
        'Corolla', 'Camry', 'RAV4', 'Land Cruiser', 'Hilux',
        'Focus', 'Fiesta', 'Mustang', 'Explorer', 'F-150',
        '3 Series', 'X5', '5 Series', '7 Series', 'M3',
        'C-Class', 'E-Class', 'S-Class', 'GLC', 'A-Class',
        'A3', 'A4', 'Q5', 'A6', 'A8',
        'Golf', 'Passat', 'Tiguan', 'Jetta', 'Touareg',
        'Civic', 'Accord', 'CR-V', 'Pilot', 'Fit',
        'Sonata', 'Tucson', 'Elantra', 'Kona', 'Santa Fe',
        'Sorento', 'Sportage', 'K5', 'Stinger', 'Seltos',
        'RX', 'NX', 'IS', 'ES', 'LS',
        'Mazda3', 'Mazda6', 'CX-5', 'CX-9', 'MX-5 Miata',
        'Altima', 'Sentra', 'Maxima', 'Murano', 'Pathfinder',
        'Malibu', 'Impala', 'Equinox', 'Tahoe', 'Silverado',
        'Clio', 'Megane', 'Captur', 'Koleos', 'Twingo',
        '208', '308', '3008', '5008', 'Partner',
    ];


    public function carModels()
    {
        return static::randomElement(static::$carModels);
    }
}
