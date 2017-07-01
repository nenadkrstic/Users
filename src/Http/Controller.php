<?php

namespace App\Http;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\View\Factory;
use Illuminate\Http\Request;

class Controller extends BaseController
{

    /** @var  Factory $viewFactory */
    private $viewFactory;
    /** @var  App $app */
    protected $app;
    /** @var  Request $request */
    protected $request;
    /** @var  Redirector $redirector */
    protected $redirector;

    public function __construct(Factory $viewFactory, Request $request, Redirector $redirector)
    {
        $this->viewFactory = $viewFactory;
        $this->request = $request;
        $this->redirector = $redirector;
    }

    public function view($view, $data = [], $mergeData = [])
    {
        return $this->viewFactory->make($view, $data, $mergeData);
    }

    public function getInput($name)
    {
        return $this->request->input($name);
    }

    public function redirectTo($path)
    {
        return $this->redirector->to($path);
    }
}