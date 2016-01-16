    interface IAbstractDbConnector
    {
        public function connect($ip, $dbName, $user, $pass);
        public function getAllUsers();
    }
    
    class FileDbConnector implements IAbstractDbConnector
    {
        public function connect($ip, $dbName, $user, $pass)
        {
            
        }
        public function getAllUsers()
        {
            
        }
    }
