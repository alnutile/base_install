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
        //Since it is an array we want that info as well
        $users      = $this->userRepository->all()->toArray();

        //Transform the data, this is super key to a good API
        // because we are using a pager the data is in the user return value
        $resource   = $this->userTransformer->getCollection($users['data'], function(array $data){
            return $this->userTransformer->collectionCallback($data);
        });

        //Return the transformed data.
        // at this point we can transform it or add more info to it.
        // for example
        // $results['selectAllTags'] = $this->getAListOfAllTagsForUsersPossible();
        $results = $this->userTransformer->createData($resource);
        $results['pagination'] = $this->getPagination($users);

        return $results;
    }

    protected function getPagination($data)
    {
        $pagination                 = [];
        $pagination['total']        = $data['total'];
        $pagination['to']           = $data['to'];
        $pagination['from']         = $data['from'];
        $pagination['per_page']     = $data['per_page'];
        $pagination['last_page']    = $data['last_page'];
        $pagination['current_page'] = $data['current_page'];
        return $pagination;
    }


} 