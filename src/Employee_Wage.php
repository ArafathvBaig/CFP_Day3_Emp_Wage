<?php
echo "Welcome to Employee Wage Computation Problem\n";
// Class to Compute Employee Wage Problem
class Employee_Wage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;

    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     * Using rand() to generate the random of 0 or 1
     */
    function attendance()
    {
        $empCheck = rand(0, 1);
        if ($empCheck == 1) {
            echo "Employee is Present\n";
            return $this->FULL_TIME_WORKING_HRS;
        } else {
            echo "Employee is Absent\n";
            return 0;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Printing the daily wage to the output
     */
    function dailyWage()
    {
        $obj = new Employee_Wage();
        $hrs = $obj->attendance();
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        echo "Daily Wage: ".$dailyWage;
    }
}
$obj = new Employee_Wage();
$obj->dailyWage();
