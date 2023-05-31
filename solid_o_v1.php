<?php
interface SomeObjectInterface
{
    public function setObjectName(string $name);
    public function getObjectName();
}

class SomeObject implements SomeObjectInterface {
    protected $name;

    public function setObjectName(string $name) {
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

class SomeObjectsHandler {

    public function __construct(protected SomeObjectInterface $someObject)
    {
    }

    public function handleObjects(array $names) {
        $handlers = [];

        foreach ($names AS $name) {
            $this->someObject->setObjectName($name);

            if ($this->someObject->getObjectName() === 'object_1') {
                $handlers[] = 'handle_object_1';
            }
            if ($this->someObject->getObjectName() === 'object_2') {
                $handlers[] = 'handle_object_2';
            }
        }

        return $handlers;
    }
}

$names = [
    'object_1',
    'object_2'
];

$someObject = new SomeObject();
$soh = new SomeObjectsHandler($someObject);
$result = $soh->handleObjects($names);

echo '<pre>', print_r($result), '</pre>';