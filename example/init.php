<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Expression;
use App\Job;
use App\Parameter;

$jobs = [];

$jobs[] = new Job('Company A', Expression::andX([
    Expression::orX([
        Parameter::APARTMENT,
        Parameter::HOUSE,
    ]),
    Parameter::PROPERTY_INSURANCE,
]));

$jobs[] = new Job('Company B', Expression::andX([
    Expression::orX([
        Parameter::CAR_4_DOORS,
        Parameter::CAR_5_DOORS,
    ]),
    Expression::andX([
        Parameter::CAR_DRIVER_LICENSE,
        Parameter::CAR_INSURANCE,
    ]),
]));

$jobs[] = new Job('Company C', Expression::andX([
    Parameter::SOCIAL_SECURITY_NUMBER,
    Parameter::WORK_PERMIT,
]));

$jobs[] = new Job('Company D', Expression::orX([
    Parameter::APARTMENT,
    Parameter::HOUSE,
    Parameter::FLAT,
]));

$jobs[] = new Job('Company E', Expression::andX([
    Expression::orX([
        Parameter::CAR_2_DOORS,
        Parameter::CAR_3_DOORS,
        Parameter::CAR_4_DOORS,
        Parameter::CAR_5_DOORS,
    ]),
    Parameter::CAR_DRIVER_LICENSE,
]));

$jobs[] = new Job('Company F', Expression::orX([
    Expression::orX([
        Parameter::SCOOTER,
        Parameter::BIKE,
    ]),
    Expression::andX([
        Parameter::MOTORCYCLE,
        Parameter::MOTORCYCLE_DRIVER_LICENSE,
        Parameter::MOTORCYCLE_INSURANCE,
    ]),
]));

$jobs[] = new Job('Company G', Expression::andX([
    Parameter::MASSAGE_CERTIFICATE,
    Parameter::LIABILITY_INSURANCE,
]));

$jobs[] = new Job('Company H', Expression::andX([
    Parameter::STORAGE_PLACE,
    Parameter::GARAGE,
]));

$jobs[] = new Job('Company K');

$jobs[] = new Job('Company D', Expression::andX([
    Parameter::PAYPAL_ACCOUNT,
]));

return $jobs;
