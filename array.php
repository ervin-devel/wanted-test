<?php
$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => 'test1'],
    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
];

#1
$filteredArray = array_intersect_key(
    $array,
    array_unique(
        array_column($array, 'id')
    )
);

#2
array_multisort(
    array_column($filteredArray, 'name'),
    SORT_ASC,
    $filteredArray
);

#3
$searchResult = array_filter($filteredArray, function ($item) {
    return $item['id'] === 2;
}, ARRAY_FILTER_USE_BOTH);

#4
$newArray = array_reduce($filteredArray, function ($reduce, $item) {
    $reduce[$item['name']] = $item['id'];
    return $reduce;
});