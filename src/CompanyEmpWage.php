<?php

/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class to Compute Employee Wage Problem
 */
class CompanyEmpWage
{
    public $companyName;
    public $workingDaysPerMonth;
    public $workingHoursPerMonth;
    public $wagePerHour;
    public $totalEmpWage;

    public function __construct($companyName, $workingDaysPerMonth, $workingHoursPerMonth, $wagePerHour)
    {
        $this->companyName = $companyName;
        $this->workingDaysPerMonth = $workingDaysPerMonth;
        $this->workingHoursPerMonth = $workingHoursPerMonth;
        $this->wagePerHour = $wagePerHour;
    }
}
