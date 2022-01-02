<?php

/**
 * Interface to declare the functions to be implemented
 */
interface computeEmpWage
{
    public function attendance();
    public function dailyWage($WAGE_PER_HR);
    public function monthlyWage($companyName, $WORKING_DAYS_PER_MONTH, $WORKING_HOURS_PER_MONTH, $WAGE_PER_HR);
    public function companyDetails($companyName, $workingDaysPerMonth, $workingHoursPerMonth, $wagePerHour);
    public function computeEmpWage();
    public function getTotalWage($company);
}
