<?php

namespace App\Repositories;

use App\Models\User;
use Czim\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
