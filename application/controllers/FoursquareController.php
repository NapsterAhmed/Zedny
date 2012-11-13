<?php

    include('api/FoursquareAPI.class.php');

        class FoursquareController extends Zend_Controller_Action

        {

            public $client_key = "3TZHZPQ3ZL4PHYUQQSI1K1M1WS4QTVCDUOKH4MNHQM2FNXT3";
            public $client_secret = "YVE0J4U0XD2CQ0YT1USUBRMRUTJPA0VL10E4LKPBCQTM2KOQ";
            public $redirect_uri = "http://www.vedohost.com/fs/test/fs-operations.php";
            public $code;
            public $foursquare;
            public $token;

            public function init()
            {
                $this->_db = Zend_Db::factory('Pdo_Mysql', array(
                    'host'     => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'dbname'   => 'zendy'
                ));
            }

            public function indexAction()
            {
                
            }


            function authAction() {

            $this->foursquare = new FoursquareAPI($this->client_key,$this->client_secret);
            $token = $this->getRequest()->getParam('code');
                    if($this->getRequest()){
                        $this->foursquare->SetAccessToken($token);
                    }
                    if(!isset($token)){
                        echo "<a href='".$this->foursquare->AuthenticationLink($this->redirect_uri)."'>Connect to this app via Foursquare</a>";
                    }else{
                        echo "Your auth token: $token<br>";
            }

                $saveToken = new Application_Model_DbTable_Foursquare;
                $saveToken->insert($token);

            }

            function getUserBadgesAction() {
                $badges = $this->foursquare->getPrivate("/users/self/badges");
                var_dump($badges);
            }

        	

        }