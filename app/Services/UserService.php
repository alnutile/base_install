<?php namespace App\Services;


use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class UserService {

    protected $collection;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserTransformer
     */
    private $userTransformer;

    /**
     * @param UserRepository $userRepository
     * @param UserTransformer $userTransformer
     */
    public function __construct(UserRepository $userRepository, UserTransformer $userTransformer)
    {

        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }

    public function index()
    {
        //Validation if any happens here
        // none here since it is not a post or put etc

        //Talk to the Repo happens here
        $users      = $this->userRepository->all()->toArray();

        //Transform the data, this is super key to a good API
        $resource   = $this->userTransformer->getCollection($users, function(array $data){
            return $this->userTransformer->collectionCallback($data);
        });

        //Return the transformed data.
        // at this point we can transform it or add more info to it.
        // for example
        // $results['selectAllTags'] = $this->getAListOfAllTagsForUsersPossible();

        $results = $this->userTransformer->createData($resource);
        return $results;
    }


} 