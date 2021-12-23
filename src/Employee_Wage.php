<?php
echo "Welcome to Employee Wage Computation Problem\n";
// Class to Compute Employee Wage Problem
class Employee_Wage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $IS_FILL_TIME = 2;
    public $IS_PART_TIME = 1;
    public $IS_ABSENT = 0;

    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     * Using rand() to generate the random of 0 or 1
     */
    function attendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case $this->IS_PART_TIME:
                echo "Part Time Employee\n";
                return $this->PART_TIME_WORKING_HRS;
                break;

            case $this->IS_FILL_TIME:
                echo "Full Time Employee\n";
                return $this->FULL_TIME_WORKING_HRS;
                break;
                
            default:
                echo "Employee is Absent\n";
                return 0;
                break;
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
        echo "Daily Wage: " . $dailyWage;
    }
}
$obj = new Employee_Wage();
$obj->dailyWage();
