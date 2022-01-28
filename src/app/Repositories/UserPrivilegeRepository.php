<?php

namespace App\Repositories;

use App\Models\UserPrivilege;
use Czim\Repository\BaseRepository;

class UserPrivilegeRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return UserPrivilege::class;
    }
}
