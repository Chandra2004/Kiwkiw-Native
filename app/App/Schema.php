<?php
    namespace User\KiwkiwNative\App;

    use Closure;
    use User\KiwkiwNative\App\Database;
    use User\KiwkiwNative\App\Blueprint;

    class Schema {
        public static function create($table, Closure $callback) {
            $db = Database::getInstance();
            $blueprint = new Blueprint($table);
            $callback($blueprint);

            $sql = "CREATE TABLE IF NOT EXISTS `$table` (";
            $sql .= implode(", ", $blueprint->getColumns());

            if ($blueprint->getPrimaryKey()) {
                $sql .= ", PRIMARY KEY (" . $blueprint->getPrimaryKey() . ")";
            }

            $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            
            $db->query($sql);
            $db->execute();
        }

        public static function dropIfExists($table) {
            $db = Database::getInstance();
            $sql = "DROP TABLE IF EXISTS `$table`;";
            $db->query($sql);
            $db->execute();
        }
    }
?>