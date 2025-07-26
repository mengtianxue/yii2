<?php

use PHPUnit\Framework\TestCase;

/**
 * Simple test demonstration for basic PHP functionality
 */
class SimpleTest extends TestCase
{
    /**
     * Test basic PHP functionality
     */
    public function testBasicPhp()
    {
        $this->assertTrue(true);
        $this->assertEquals(2, 1 + 1);
        $this->assertIsString("Hello World");
    }

    /**
     * Test array functionality
     */
    public function testArrayFunctionality()
    {
        $array = ['a', 'b', 'c'];
        $this->assertCount(3, $array);
        $this->assertContains('b', $array);
        $this->assertEquals('a', $array[0]);
    }

    /**
     * Test that we can access some basic PHP classes
     */
    public function testPhpClasses()
    {
        $dateTime = new DateTime();
        $this->assertInstanceOf(DateTime::class, $dateTime);
        
        $array = new ArrayObject(['key' => 'value']);
        $this->assertEquals('value', $array['key']);
    }

    /**
     * Test string operations
     */
    public function testStringOperations()
    {
        $string = "Yii2 Framework Testing";
        $this->assertStringContainsString('Yii2', $string);
        $this->assertStringStartsWith('Yii2', $string);
        $this->assertStringEndsWith('Testing', $string);
    }

    /**
     * Test JSON operations
     */
    public function testJsonOperations()
    {
        $data = ['name' => 'Yii2', 'version' => '2.0'];
        $json = json_encode($data);
        $this->assertJson($json);
        
        $decoded = json_decode($json, true);
        $this->assertEquals($data, $decoded);
    }
}