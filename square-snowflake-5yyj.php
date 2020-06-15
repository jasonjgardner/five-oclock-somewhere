<?php require_once('vendor/autoload.php');$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);$dotenv->load();

function fiveOclockSomewhere() : array
{
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
cdump(fiveOclockSomewhere());
