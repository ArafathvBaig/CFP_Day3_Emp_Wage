<?php
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

    public $WORKING_DAYS_PER_MONTH;
    public $WORKING_HOURS_PER_MONTH;
    public $WAGE_PER_HR;

    public $workingHrs = 0;
    public $monthlyWage = 0;
    public $totalWorkingDays = 0;
    public $totalWorkingHours = 0;

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
    function monthlyWage($WORKING_DAYS_PER_MONTH, $WORKING_HOURS_PER_MONTH, $WAGE_PER_HR)
    {
        // $WORKING_DAYS_PER_MONTH = $this->$WORKING_DAYS_PER_MONTH; 
        // $WORKING_HOURS_PER_MONTH = $this->$WORKING_HOURS_PER_MONTH;
        // $WAGE_PER_HR = $this->$WAGE_PER_HR;
        while (
            $this->totalWorkingHours <= $WORKING_HOURS_PER_MONTH &&
            $this->totalWorkingDays < $WORKING_DAYS_PER_MONTH
        ) {
            $this->totalWorkingDays++;
            echo "Day:: " . $this->totalWorkingDays . "\n";
            $dailyWage = $this->dailyWage($WAGE_PER_HR);
            $this->monthlyWage += $dailyWage;
            $this->totalWorkingHours += $this->workingHrs;
        }
        echo "Total Working Days:: " . $this->totalWorkingDays . "\n";
        echo "Total Working Hours:: " . $this->totalWorkingHours . "\n";
        echo "Monthly Wage:: " . $this->monthlyWage . "\n\n";
        return $this->monthlyWage;
    }

    /**
     * Function to take user input for wage per hour, max working days and 
     * max working hours, calling monthly wage function and
     * passing these constant variables as parameters
     */
    function userInput()
    {
        $this->WORKING_DAYS_PER_MONTH = readline('Enter Max Working Days Per Month: ');
        $this->WORKING_HOURS_PER_MONTH = readline('Enter Max Working Hours Per Month: ');
        $this->WAGE_PER_HR = readline('Enter Employee Wage Per Hour: ');
        return $this->monthlyWage($this->WORKING_DAYS_PER_MONTH, $this->WORKING_HOURS_PER_MONTH, $this->WAGE_PER_HR);
    }
}

/**
 * Class for multiple companies
 * have numofCompanies functon to run that many times
 * and storing company names and total wages into array
 */
class CompanyEmpWage
{
    /**
     * Function for multiple companies and 
     * storing name and total wage into arrays
     * Passing number of companies as parameter
     */
    public function numOfCompanies($n)
    {
        $name = array();
        $totalWage = array();
        for ($i = 0; $i < $n; $i++) {
            $name[$i] = readline('Enter Name of Company: ');
            echo "Employee Wage Computation For\n";
            echo "***** " . $name[$i] . " *****\n";
            $employeeWage = new Employee_Wage();
            $totalWage[$i] = $employeeWage->userInput();
        }
        for ($i = 0; $i < $n; $i++) {
            echo "\nName of Company:: " . $name[$i];
            echo "\nTotal Salary:: " . $totalWage[$i];
        }
    }
}

$n = readline("Number of Companies: ");
$companyEmpWage = new CompanyEmpWage();
$companyEmpWage->numOfCompanies($n);
