<?php
/**
 * User: aslukili
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\Event;
use app\models\NatRep;


/**
 * Class DashboardController
 *
 * @author  Abdeslam Loukili <abdeslam.edu@gmail.com>
 * @package app\controllers
 */
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['dashboard']));
    }

    public function dashboard()
    {
        $User = new User();
        $User->getCount();
        $event = new Event();
        $event->getCount();
        $resp = new NatRep();
        $resp->getCount();

        $this->setLayout('dashboard');
        return $this->render('dashboard', [
            'Users' => $User->count,
            'events' => $event->count,
            'resp' => $resp->count,
        ]);
    }

}