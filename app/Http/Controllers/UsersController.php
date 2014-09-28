<?php namespace App\Http\Controllers;

use App\Helpers\ThrowAndLogErrors;
use App\Http\Helpers\ResponseHelper;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller {
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ResponseHelper
     */
    private $responseHelper;


    /**
     * This Service is in the Providers/UsersService.php file
     * @param UserService $userService
     * @param ResponseHelper $responseHelper
     */
    public function __construct(UserService $userService, ResponseHelper $responseHelper)
    {
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
    }

	/**
	 * Display a listing of the resource.
	 * Note that the Dependency system, in controllers, can not
     * inject the class for you per method not just on the Construct
     *
	 * @return Response
	 */
	public function index()
	{
        //The Controller JUST takes the requests and
        // asks the service for a response.
        // the controller does nothing else.
		try
        {
            $results = $this->userService->index();
            return Response::json($this->responseHelper->respond($results, "User Index"), 200);
        }
        catch(\Exception $e)
        {
            return Response::json($this->responseHelper->respond($e->getMessage(), "User Index Failed"), 422);
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
