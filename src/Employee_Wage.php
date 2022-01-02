<?php
include 'CompanyEmpWage.php';
include 'Employee_Wage_Interface.php';
echo "Welcome to Employee Wage Computation Problem\n";
/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class to Compute Employee Wage Problem
 */
class Employee_Wage implements computeEmpWage
{
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $IS_FILL_TIME = 2;
    public $IS_PART_TIME = 1;
    public $IS_ABSENT = 0;

    public $empWageArray = array();
    public $totalWageArray = array();
    public $dailyWageArray = array();

    /**
     * Function to add details of Company to an array
     * Passing companyName, workingDaysPerMonth, workingHoursPerMonth and 
     * WagePerHour as Parameters and calling the CompanyEmpWage Constructor
     */
    public function companyDetails($companyName, $workingDaysPerMonth, $workingHoursPerMonth, $wagePerHour)
    {
        $this->empWageArray[$companyName] = new CompanyEmpWage($companyName, $workingDaysPerMonth, $workingHoursPerMonth, $wagePerHour);
    }

    /**
     * Function to Compute Employee Wage for all the Companies
     * Non-Parameterized Funciton
     * Storing total Wage of each Company into an array
     */
    public function computeEmpWage()
    {
        foreach ($this->empWageArray as $key => $value) {
            $totalWage = $this->monthlyWage($value->companyName, $value->workingDaysPerMonth, $value->workingHoursPerMonth, $value->wagePerHour);
            echo $value->companyName." Company Total Emp Wage is:: " . $totalWage . "\n\n";
            $this->totalWageArray[$value->companyName] = $totalWage;
        }
    }

    /**
     * Function to get total wage of a particular company
     * passing company name as parameter
     * printing the total wage of the company
     */
    public function getTotalWage($company)
    {
        foreach ($this->totalWageArray as $key => $value) {
            if ($key == $company) {
                echo "Total Wage For " . $company . " is: " . $this->totalWageArray[$company];
            } 
        }
    }

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
     * Passing wage per hour as parameter
     * Calling attendance function to check employee attendance
     * returns daily wage of the employee
     */
    function dailyWage($WAGE_PER_HR)
    {
        $this->workingHrs = $this->attendance();
        $dailyWage = $WAGE_PER_HR * $this->workingHrs;
        echo "Working Hours:: " . $this->workingHrs . "\n";
        echo "Daily Wage:: " . $dailyWage . "\n\n";
        return $dailyWage;
    }

    /**
     * Function to Calculate Monthly Wage
     * Calling daily wage function to get daily wage
     * Passing working days per month, working hours per month 
     * and wage per hour as parameters
     */
    function monthlyWage($companyName, $WORKING_DAYS_PER_MONTH, $WORKING_HOURS_PER_MONTH, $WAGE_PER_HR)
    {
        $workingHrs = 0;
        $monthlyWage = 0;
        $totalWorkingDays = 0;
        $totalWorkingHours = 0;
        //$i=0;

        while (
            $totalWorkingHours <= $WORKING_HOURS_PER_MONTH &&
            $totalWorkingDays < $WORKING_DAYS_PER_MONTH
        ) {
            $totalWorkingDays++;
            echo "Day:: " . $totalWorkingDays . "\n";
            $dailyWage = $this->dailyWage($WAGE_PER_HR);
            $monthlyWage += $dailyWage;
            $totalWorkingHours += $this->workingHrs;
            // $dailyWageArray[$companyName][$i] = $dailyWage;
            // $i++;
        }
        echo "Total Working Days:: " . $totalWorkingDays . "\n";
        echo "Total Working Hours:: " . $totalWorkingHours . "\n";
        echo "Monthly Wage:: " . $monthlyWage . "\n\n";
        return $monthlyWage;
    }
}

$employeeWage = new Employee_Wage();
$employeeWage->companyDetails("Reliance", 20, 100, 20);
$employeeWage->companyDetails("Heritage", 25, 125, 18);
$employeeWage->companyDetails("Vishal Mart", 30, 150, 15);
$employeeWage->computeEmpWage();
$employeeWage->getTotalWage("Vishal Mart");
