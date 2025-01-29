<?php
    namespace {{NAMESPACE}}\App;

    require_once __DIR__ . '/Config.php';

    use PDO;
    use PDOException;

    class Database {
        private $dbh;
        private $stmt;

        public function __construct() {
            Config::loadEnv(); // Load environment variables from .env

            $host = Config::get('DB_HOST');
            $dbname = Config::get('DB_NAME');
            $user = Config::get('DB_USER');
            $pass = Config::get('DB_PASS');

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // Adding charset for better compatibility

            try {
                $this->dbh = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
                // Database connection is handled in controller for status updates
            } catch (PDOException $e) {
                // Instead of die(), we throw an exception to handle the error in the controller
                throw new PDOException("Database connection failed: " . $e->getMessage());
            }
        }

        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }

        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }

        // Transaction methods
        public function beginTransaction() {
            return $this->dbh->beginTransaction();
        }

        public function commit() {
            return $this->dbh->commit();
        }

        public function rollBack() {
            return $this->dbh->rollBack();
        }
    }
?>