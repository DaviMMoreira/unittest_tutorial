<?php
namespace Hairy\Lib
{
    class Dbadapter
    {
        /**
         * @var \PDO
         */
        protected $db;

        public function __construct()
        {
            $dsn = 'mysql:host=localhost;dbname=tektest';
            $user = '';
            $password = '';
            $this->connect($dsn, $user, $password);
        }

        protected function connect($dsn, $username, $password)
        {
            $db = new \PDO($dsn, $username, $password);
            $this->db = $db;
        }

        /**
         * Returns the result for the query given as an array (not really, we're
         * just pretending in this case - there isn't a real database).
         * @param string $query the query to execute
         */
        public function getRows($query, $params=null)
        {
            $statement = $this->db->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll();
        }
    }
}