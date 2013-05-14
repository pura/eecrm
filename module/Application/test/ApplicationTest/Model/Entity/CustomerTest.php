<?php
namespace ApplicationTest\Model\Entity;

use Application\Model\Entity\Customer;
use PHPUnit_Framework_TestCase;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Customer
     */
    protected $entity;

    /**
     * @var array
     */
    protected $data = array(
        'id'          => 1,
        'title'       => 'My Title',
        'description' => 'My Description',
        'created_on'  => '2010-01-01 00:00:00',
        'updated_on'  => '2010-01-02 00'
    );

    public function setUp()
    {
        $this->entity = new Customer();
    }

    public function testItemInitialState()
    {
        $this->assertNull($this->entity->getId(), '"id" should initially be null');
        $this->assertNull($this->entity->getTitle(), '"title" should initially be null');
        $this->assertNull($this->entity->getDescription(), '"description" should initially be null');
        $this->assertNull($this->entity->getUpdatedOn(), '"update_on" should initially be null');
        $this->assertNull($this->entity->getCreatedOn(), '"created_on" should initially be null');
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $this->entity->exchangeArray($this->data);

        $this->assertSame($this->data['id'], $this->entity->getId());
        $this->assertSame($this->data['title'], $this->entity->getTitle());
        $this->assertSame($this->data['description'], $this->entity->getDescription());
        $this->assertSame($this->data['created_on'], $this->entity->getCreatedOn());
        $this->assertSame($this->data['updated_on'], $this->entity->getUpdatedOn());
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $this->entity->exchangeArray($this->data);
        $this->entity->exchangeArray(array());

        $this->assertNull($this->entity->getId());
        $this->assertNull($this->entity->getTitle());
        $this->assertNull($this->entity->getDescription());
        $this->assertNull($this->entity->getCreatedOn());
        $this->assertNull($this->entity->getUpdatedOn());
    }

}