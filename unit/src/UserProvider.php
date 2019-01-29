<?php

namespace Solvolabs;

class UserProvider
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getUsers()
    {
        $users = $this->database->execute('some-query');

        return json_encode($users);
    }
}
