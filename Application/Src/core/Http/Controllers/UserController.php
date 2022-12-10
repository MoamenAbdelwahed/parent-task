<?php

namespace Application\Src\Http\Controllers;

use Domain\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package Application\Src\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        parent::__construct($userService);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $filters = $request->query();
        if (isset($filters['provider']) && !empty($filters['provider'])) {
            if ($filters['provider'] == 'DataProviderX') {
                unset($filters['provider']);
                $dataProviders = $this->applicationService->getDataProviderX($filters);
            } elseif ($filters['provider'] == 'DataProviderY') {
                unset($filters['provider']);
                $dataProviders = $this->applicationService->getDataProviderY($filters);
            }
        } else {
            $dataProviderX = $this->applicationService->getDataProviderX($filters);
            $dataProviderY = $this->applicationService->getDataProviderY($filters);
            $dataProviders = array_merge($dataProviderX, $dataProviderY);
        }
        return response()->json($dataProviders);
    }

    /**
     * @return mixed
     */
    function getRequestValidationObject()
    {
        // TODO: Implement getRequestValidationObject() method.
    }
}
