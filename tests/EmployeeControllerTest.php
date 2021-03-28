
<?php 

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
use Controller\EmployeeController;
use Model\Employee;
use Repository\EmployeeRepository;

class EmployeeContollerTest extends TestCase {

//======================================== example 1 =========================================
// public function testGetAllJsonReturnsJson() {
// // given
// $employeeController = new EmployeeController(new EmployeeRepository());
// // when
// $res = $employeeController->getAllJson();
// // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
// assertEquals('[{"id":"1","name":"Jonas"},{"id":"2","name":"Petras"}]', $res);
// }

//=============================================Stub example =========================================



// public function  test1 (){
// $stub = $this->createStub(EmployeeRepository::class);
// $stub->method('getAll')->willReturn(array(new Employee(1, "Jonas"),new Employee(2, "Petras")));
// // given ... attention, you might need to disable type hints to avoid inteliphence warnings!
// // $employeeController = new EmployeeController(new EmployeeRepository());
// $employeeController = new EmployeeController($stub);
// // when
// $res = $employeeController->getAllJson();

// // then
// assertEquals('[{"id":1,"name":"Jonas"},{"id":2,"name":"Petras"}]', $res);
// }

//======================================================Mock example==================================

public function testGetAllJsonReturnsJson() {
$mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
$employeeController = new EmployeeController($mock);
$mock->expects($this->exactly(2))
->method('getAll')
->willReturn(array(new Employee(1, "Jonas")));
// when
$res = $employeeController->getAllJson();
// then 
assertEquals('[{"id":1,"name":"Jonas"}]', $res);
}





}