<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class ValidationController extends Controller {

    /**
     * Ajax request to see if the password exists
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkUserName($name)
    {
        $result = $this->checkNames($name);
        return response()->json(['result' => $result]);
    }

    /**
     * Ajax request to see if the password exists
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkEmail($name) {
        $result = $this->checkEmails($name);
        return response()->json(['result' => $result]);
    }

    /**
     * Checks if email exists
     *
     * @param $name
     * @return bool
     */
    public function checkEmails($name) {
        $names = User::lists('email');
        $result = true;
        if(in_array($name, $names)) {
            $result = false;
        }
        return $result;
    }

    /**
     * Checks if user name exists
     *
     * @param $name
     * @return bool
     */
    private function checkNames($name)
    {
        $names = User::lists('name');
        $result = true;
        if(in_array($name, $names)) {
            $result = false;
        }
        return $result;
    }
}
