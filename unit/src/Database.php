<?php

namespace Solvolabs;

/**
 * This class is used to emulate a fake and naive database.
 * For training purposes only, don't reuse it.
 *
 * @author Mickaël Andrieu <mickael.andrieu@solvolabs.com>
 */
class Database
{
    private $users = [
        [
            'name' => 'Harry', 'age' => '17', 'title' => 'wizard',
        ],
        [
            'name' => 'Hermione', 'age' => '17', 'title' => 'wizard',
        ],
        [
            'name' => 'Ron', 'age' => '17', 'title' => 'wizard',
        ],
    ];

    public function execute($query)
    {
        if (!empty($query)) {
            return $this->users;
        }

        return [];
    }
}
