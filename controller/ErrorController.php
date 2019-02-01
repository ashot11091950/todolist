<?php
    class ErrorController extends Controller
    {
        public function Error404(){
            $this->setOutput('error404');
        }
    }
    