<?php
/**
 * Created by PhpStorm.
 * User: anais
 * Date: 02/11/18
 * Time: 10:12
 */

namespace Tests\Unit\Repository;

use App\Model\Connection;
use App\Repository\StudentRepository;
use PHPUnit\Framework\TestCase;

class StudentRepositoryTest extends TestCase
{

    public function testCreate()
    {
        $pdoStatement = $this->createMock( \PDOStatement::class );
        $pdoStatement->expects( $this->once() )
            ->method( 'execute' )
            ->with( array(
                    'lastname' => 'anais',
                    'firstname' => 'martin',
                    'birthdate' => '2019-12-02'
                )
            );

        $pdo = $this->createMock( \PDO::class );
        $pdo->expects( $this->once() )
            ->method( 'prepare' )
            ->willReturn( $pdoStatement )
            ->with(
                'INSERT INTO student(lastname, firstname, birthdate) VALUES(:lastname, :firstname, :birthdate)'
            );

        $connection = $this->createMock( Connection::class );
        $connection->expects( $this->once() )
            ->method( 'connect' )
            ->willReturn( $pdo );

        $repository = new StudentRepository( $connection );
        $repository->create( 'martin', 'anais', new \DateTime ( '2019-12-02' ) );


    }

    public function testDelete()
    {
        $pdoStatement = $this->createMock( \PDOStatement::class );
        $pdoStatement->expects( $this->exactly( 2 ) )
            ->method( 'execute' )
            ->with( array(
                    'id' => 'testIdDelete'
                )
            );
        $pdoStatement->expects( $this->once() )
            ->method( 'fetch' )
            ->willReturn( array(
                    'id' => 'testIdDelete',
                    'lastname' => 'charles',
                    'firstname' => 'martin',
                    'birthdate' => '2023-01-10'
                )
            );
        $pdo = $this->createMock( \PDO::class );

        $pdo->expects( $this->exactly( 2 ) )
            ->method( 'prepare' )
            ->willReturn( $pdoStatement )
            ->withConsecutive(
                ['SELECT * FROM student WHERE id=:id'],
                ['DELETE FROM student WHERE id=:id ']
            );

        $connection = $this->createMock( Connection::class );
        $connection->expects( $this->once() )
            ->method( 'connect' )
            ->willReturn( $pdo );


        $repository = new StudentRepository( $connection );
        $repository->delete( 'testIdDelete' );

    }

    public function testUpdate()
    {
        $pdoStatement = $this->createMock( \PDOStatement::class );
        $pdoStatement->expects( $this->once() )
            ->method( 'execute' )
            ->with( array(
                    'id' => 'testID',
                    'lastname' => 'charles',
                    'firstname' => 'martin',
                    'birthdate' => '2023-01-10'
                )
            );

        $pdo = $this->createMock( \PDO::class );
        $pdo->expects( $this->once() )
            ->method( 'prepare' )
            ->willReturn( $pdoStatement )
            ->with(
                'UPDATE student SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate WHERE id=:id'
            );

        $connection = $this->createMock( Connection::class );
        $connection->expects( $this->once() )
            ->method( 'connect' )
            ->willReturn( $pdo );

        $repository = new StudentRepository( $connection );
        $repository->update( 'testID', 'martin', 'charles', new \DateTime ( '2023-01-10' ) );

    }
}
