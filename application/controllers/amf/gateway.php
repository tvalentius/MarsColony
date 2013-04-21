<?php

require_once APPPATH . "/libraries/Amfphp/ClassLoader.php";

 
 class Gateway extends MY_Controller
 {
        function __construct()
        {       
                parent::__construct();
        }
        function index()
        {
                $config = new Amfphp_Core_Config();//do something with config object here
                $config->serviceFolderPaths = array(dirname(__FILE__) . "/services/");
                $gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);

                $gateway->service();
                $gateway->output();
        }
 }