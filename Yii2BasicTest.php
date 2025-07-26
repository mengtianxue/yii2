<?php

use PHPUnit\Framework\TestCase;

// Include the Yii framework autoloader
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Basic Yii2 Framework functionality test
 */
class Yii2BasicTest extends TestCase
{
    /**
     * Test that we can access basic Yii2 classes
     */
    public function testYii2Classes()
    {
        // Test that we can access the BaseYii class
        $this->assertTrue(class_exists('yii\BaseYii'));
        
        // Test that we can access the Component class
        $this->assertTrue(class_exists('yii\base\Component'));
        
        // Test that we can access the Object class
        $this->assertTrue(class_exists('yii\base\BaseObject'));
    }

    /**
     * Test basic ArrayHelper functionality
     */
    public function testArrayHelper()
    {
        // Test that ArrayHelper class exists
        $this->assertTrue(class_exists('yii\helpers\ArrayHelper'));
        
        $array = [
            ['id' => 1, 'name' => 'John'],
            ['id' => 2, 'name' => 'Jane'],
            ['id' => 3, 'name' => 'Bob'],
        ];
        
        // Test getColumn method
        $names = \yii\helpers\ArrayHelper::getColumn($array, 'name');
        $this->assertEquals(['John', 'Jane', 'Bob'], $names);
        
        // Test map method  
        $map = \yii\helpers\ArrayHelper::map($array, 'id', 'name');
        $this->assertEquals([1 => 'John', 2 => 'Jane', 3 => 'Bob'], $map);
    }

    /**
     * Test Html helper functionality
     */
    public function testHtmlHelper()
    {
        // Test that Html helper class exists
        $this->assertTrue(class_exists('yii\helpers\Html'));
        
        // Test encode method
        $encoded = \yii\helpers\Html::encode('<script>alert("test")</script>');
        $this->assertEquals('&lt;script&gt;alert(&quot;test&quot;)&lt;/script&gt;', $encoded);
        
        // Test tag method
        $tag = \yii\helpers\Html::tag('div', 'Hello World', ['class' => 'test']);
        $this->assertEquals('<div class="test">Hello World</div>', $tag);
    }

    /**
     * Test Url helper functionality
     */
    public function testUrlHelper()
    {
        // Test that Url helper class exists
        $this->assertTrue(class_exists('yii\helpers\Url'));
        
        // We can't test routing without application context, 
        // but we can test that methods exist
        $this->assertTrue(method_exists('yii\helpers\Url', 'to'));
        $this->assertTrue(method_exists('yii\helpers\Url', 'toRoute'));
    }

    /**
     * Test StringHelper functionality
     */
    public function testStringHelper()
    {
        // Test that StringHelper class exists
        $this->assertTrue(class_exists('yii\helpers\StringHelper'));
        
        // Test truncate method
        $text = "This is a very long text that should be truncated";
        $truncated = \yii\helpers\StringHelper::truncate($text, 20);
        $this->assertStringContainsString('...', $truncated);
        $this->assertTrue(strlen($truncated) <= 23); // 20 + '...'
        
        // Test startsWith method
        $this->assertTrue(\yii\helpers\StringHelper::startsWith($text, 'This is'));
        $this->assertFalse(\yii\helpers\StringHelper::startsWith($text, 'That is'));
    }
}