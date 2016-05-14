<?php
/**
 * Created by PhpStorm.
 * User: crwgr
 * Date: 5/12/2016
 * Time: 1:17 PM
 */

namespace Nativerank\Logger\Controller;

use Nativerank\Logger\Utilities\LogTrimmer;
use Nativerank\Logger\Utilities\LogTruck;
use Pagekit\Application as App;

use Nativerank\Utilities\PagekitLogger;

/**
 * Class LoggerController
 * @package Nativerank\Logger\Controller
 * @access(admin=true)
 */
class LoggerController
{
    /**
     * @var LogTrimmer
     */
    protected $logTrimmer;

    protected $logTruck;

    /**
     * LoggerController constructor.
     */
    public function __construct()
    {
        $this->logTrimmer = new LogTrimmer();

        $this->logTruck = new LogTruck();
    }

    /**
     * @Route("/")
     * @Method("GET")
     */
    function indexAction()
    {
//        $e = new App\Exception('hello world');
//        $logger = new PagekitLogger();
//        $logger->logException($e);

//        $logger->log('hello world');

        $logs = $this->logTruck->getLogs();

        return [
            '$view' => [
                'title' => __('Logger Panel'),
                'name' => 'pagekitlogger:views/index.php'
            ],
            '$data' => [
                'logs' => $logs
            ]
        ];
    }

    /**
     * @Route("/settings")
     * @Method("GET")
     */
    function settingsAction()
    {
//        $e = new App\Exception('hello');
//        $logger = new PagekitLogger();
//        $logger->logException($e);

        return [
            '$view' => [
                'title' => __('Logger Settings'),
                'name' => 'pagekitlogger:views/settings.php'
            ],
            '$data' => [

            ]
        ];
    }

}