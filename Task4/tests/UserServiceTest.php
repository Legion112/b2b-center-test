<?php
namespace Tests;

use App\UserService;

class UserServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testValidQuery(){

        $pdoMock = $this->createMock(\PDO::class);
        $pdoStatementMock = $this->createMock(\PDOStatement::class);
        $pdoMock->method('prepare')->willReturn($pdoStatementMock);
        $pdoStatementMock->method('fetch')->willReturnOnConsecutiveCalls(
            ['id' => 1, 'name' => 'Max'],
            ['id' => 2, 'name' => 'Kate']
        );

        $userService = new UserService($pdoMock);

        $data = $userService->loadData([1, 2]);

        $this->assertEquals([
            1 => 'Max',
            2 => 'Kate'
        ], $data);
    }
}
