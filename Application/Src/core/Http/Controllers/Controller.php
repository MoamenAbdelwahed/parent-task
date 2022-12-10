<?php

namespace Application\Src\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * @var AbstractDomainService $applicationService
     */
    protected $applicationService;

    /**
     * Controller constructor.
     * @param $applicationService
     */
    public function __construct($applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * @param Request
     * @param $entityId
     * @return mixed
     */
    public function show(Request $request, $entityId)
    {
        $data = $this->applicationService->find($entityId);
        return $this->sendResponse($data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $post = $this->removeEmpty($post);
        $this->getRequestValidationObject()->validateCreation($post);
        $data = $this->applicationService->create($post);
        return $this->sendResponse($data);
    }

    /**
     * @param Request $request
     * @param $entityId
     * @return mixed
     */
    public function update(Request $request, $entityId)
    {
        $post = $request->all();
        $data = $this->applicationService->update($entityId, $post);
        return $this->sendResponse($data);
    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function destroy($entityId)
    {
        try {
            $data = $this->applicationService->delete($entityId);
            return $this->sendResponse($data);
        } catch (ForeignKeyConstraintViolationException $e) {
            return JsonResponseDefault::create(false, ['Error' => Error::HAS_ASSOCIATION_FIELDS], Error::HAS_ASSOCIATION_FIELDS, 400);
        }
    }

    /**
     * @param $data
     * @param bool $exclude
     * @return mixed
     */
    protected function sendResponse($data, $exclude = false)
    {
        $data = $this->serialize($data, $exclude);
        return JsonResponseDefault::create(true, $data, 'success', 200);
    }

    /**
     * @param $haystack
     * @return mixed
     */
    public function removeEmpty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->removeEmpty($haystack[$key]);
            }
            if (!is_numeric($haystack[$key]) && empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }
        return $haystack;
    }

    /**
     * @return mixed
     */
    abstract function getRequestValidationObject();
}
