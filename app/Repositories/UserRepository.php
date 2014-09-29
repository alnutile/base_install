<?php namespace App\Repositories;

use App\User;

class UserRepository {

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->paginate(5);
    }
} 