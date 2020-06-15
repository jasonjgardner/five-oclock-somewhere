<?php
function fiveOclockSomewhere(): array {
    $zones = DateTimeZone::listIdentifiers();
    $itr = count($zones);
    
    $where = [];

    while ($itr--) {
        try {
            if ((new DateTime('now', new DateTimeZone($zones[$itr])))->format('G') === '17') {
                $where[] = $zones[$itr];
            }
        } catch (\Exception $e) {
            continue;
        }
    }
    
    return array_unique($where);
}

var_dump(fiveOclockSomewhere());