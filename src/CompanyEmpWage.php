<?php

/**
 * Author -> Arafath Baig
 * PHP Version -> 8.0.9
 * Class to Compute Employee Wage Problem
 */
class CompanyEmpWage
{
    /**
     * Function for multiple companies and 
     * storing name and total wage into arrays
     * Printing the array
     */
    public function numOfCompanies()
    {
        $name = array();
        $totalWage = array();
        $n = readline("Number of Companies: ");
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