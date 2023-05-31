<?php
class SomeObject {
    protected $name;

    public function setObjectName(string $name) {
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

class SomeObjectsHandler extends SomeObject {

    public function handleObjects(array $names) {
        $handlers = [];

        foreach ($names AS $name) {
            $this->setObjectName($name);

            if ($this->getObjectName() === 'object_1') {
                $handlers[] = 'handle_object_1';
            }
            if ($this->getObjectName() === 'object_2') {
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
$soh = new SomeObjectsHandler();
$result = $soh->handleObjects($names);

echo '<pre>', print_r($result), '</pre>';