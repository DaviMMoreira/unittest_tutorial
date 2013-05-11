<?php
namespace Hairy\Lib
{
    use \PDO;
    use \Hairy\Lib;

    class Dbadapter
    {
        /**
         * @var PDO
         */
        protected $db;

        public function __construct()
        {
            $db = Registry::get('db', 'tek');
            $dsn = 'mysql:host=localhost;dbname=' . $db;
            $user = 'tek';
            $password = 'tek';
            $this->connect($dsn, $user, $password);
        }

        protected function connect($dsn, $username, $password)
        {
            $db = new PDO($dsn, $username, $password);
            $this->db = $db;
        }

        /**
         * Returns the result for the query given as an array (not really, we're
         * just pretending in this case - there isn't a real database).
         * @param string $query the query to execute
         */
        public function getRows($query, $params=null)
        {
            $db = $this->db;
            $statement = $db->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll();
        }

        /**
         * Run a query on the database
         * @param string $query the query to execute
         * @return PDOStatement
         */
        public function query($query)
        {
            return $this->db->query($query);
        }
    }
}