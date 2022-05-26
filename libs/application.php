<?php

class Application
{
    /** @var null controller */
    private $url_controller = null;
    
    /** @var null controller */
    private $url_action =  null;

    /** @var null controller */
    private $url_params = array();

    /**
     * Start the application
     */
    public function __construct()
    {
        // Create array with URL parts in $url
        $this->splitUrl();

        // Check for controller
        if(file_exists('./controller/'. $this->url_controller . 'php')){

            require './controller/' . $this->url_controller . '.php';
            $this->url_controller =  new $this->url_controller();

            // check for method
            if(method_exists($this->url_controller, $this->url_action)){

                if(!empty($this->url_params)){

                   // Call method and pass arg
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else{
                    $this->url_controller->{$this->url_action}();
                }
            } else{
                $this->url_controller->index();
            }
        } else {
            // for invalid url, show home/index
            require './controller/home.php';
            $home = new Home();
            $home->index();
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if(isset($_GET['url'])){

            // split URL
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL into accrording properties
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase arrays keys and store the URL params
            $this->url_params = array_values($url);

            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';


        }
    }
}
