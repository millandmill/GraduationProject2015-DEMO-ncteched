<?php
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'libraries/include.php');

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 7/2/2560
 * Time: 16:53 น.
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mol_check", "check");
        $this->load->model("mol_auth_paper", "auth_paper");
        $this->load->model('mol_time',"time");
    }

    /**
     * @param $paper_id
     * @return bool
     */
    protected function check_data($paper_id){
        $get_id = $this->check->get_Paper($paper_id);

        if (!empty($get_id)){
            return true;
        }else{
            return false;
        }
    }

    protected function check_data_evaluate($paper_id){
        $get_id = $this->check->get_Paper_evaluate($paper_id);

        if (!empty($get_id)){
            return true;
        }else{
            return false;
        }
    }

    protected function check_data_owner($paper_id,$owner_id){
        $get_id = $this->check->get_paper_with_Oid($owner_id);

        if (@$get_id->paper_detail_id == $paper_id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $eval_id
     * @return bool
     */
    protected function check_evaluation($eval_id){
        $var = $this->check->get_evaluation_owner($eval_id);
        if(!empty($var)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $eval_id
     * @param $user_id
     * @return bool
     */
    protected function check_evaluation_user($eval_id,$user_id){
        $var = $this->check->get_evaluation($eval_id);
        if($var->user_id == $user_id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $eval_id
     * @param $user_id
     * @return bool
     */
    protected function check_paper_evaluation_user($eval_id,$user_id){
        $var = $this->check->get_evaluation($eval_id);
        if(!empty($var)){
            $check = $this->check_owner_paper($var->paper_detail_id,$user_id);
            return $check;
        }else{
            return false;
        }

    }

    /**
     * @param $user_id
     * @return mixed
     */
    protected function check_user_type($user_id){
        $var = $this->check->check_user_type($user_id);
        return $var;
    }

    /**
     * @param $paper_id
     * @param $user_id
     * @return bool
     */
    protected function check_owner_reviewer($paper_id,$user_id){

        $var = $this->check->get_public($paper_id,$user_id);
//
//        var_dump($var);
//        exit();

        if(!empty($var)){
            $comment[1] = $var->paper_file_owner_comment1;
            $comment[2] = $var->paper_file_owner_comment2;
            $comment[3] = $var->paper_file_owner_comment3;
            $comment[4] = $var->paper_file_owner_comment4;

            if(($comment[1] == $user_id || $comment[2] == $user_id || $comment[3] == $user_id || $comment[4] == $user_id) && $user_id != 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * @param $paper_id
     * @param $user_id
     * @return bool
     */
    protected function check_owner_paper($paper_id,$user_id)
    {
        $get_user_id = $this->auth_paper->getUser_by_Paper($paper_id);
        if(!empty($get_user_id)) {
            if ($get_user_id->user_id == $user_id) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }


    protected function check_paper_file_flag($file_id){
        $var = $this->check->get_paper_file($file_id);
        return $var;
    }
}

/**
 * Class Core_Paper
 */
class Core_Paper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("mol_auth_paper", "auth_paper");
        $this->load->model("mol_paper_numbering", "paper_numbering");
        $this->load->model('mol_time',"time");
    }

    /**
     * @param $id_dep
     * @return string
     */
    protected function generate_current_number($id_dep){

        $name = 'NCTED';

        $year_rs = $this->paper_numbering->getCurent_conferenceYear();
        $arr_sub = explode("/", $year_rs->conferences_select_note);

        $year = $arr_sub[0];
        $no = substr("00".$arr_sub[1],-2,2);
        $dep = substr("00".$id_dep,-2,2);
//        $year = substr($year_rs->conferences_select_note,0,4);

        $value['year'] = $year;
        $value['dep'] = $dep;
        $value['no'] = $no;
        $last_number = $this->paper_numbering->getLastPerperNumber($value);

        $set_number =array();
        if(empty($last_number)){
            $set_number['paper_numbering_no'] = $no;
            $set_number['paper_numbering_year'] = $year;
            $set_number['paper_numbering_dep'] = $dep;
            $set_number['paper_numbering_number'] = 1;
            $this->paper_numbering->set_paper_number($set_number);
        }else{
            $set_number['paper_numbering_no'] = $no;
            $set_number['paper_numbering_year'] = $year;
            $set_number['paper_numbering_dep'] = $dep;
            $set_number['paper_numbering_number'] = $last_number->paper_numbering_number+1;
            $this->paper_numbering->update_paper_number($set_number);
        }

        $Seq = substr("0000".$set_number["paper_numbering_number"],-4,4);
        $strNextSeq = $name."-".$set_number["paper_numbering_no"]."-".$set_number['paper_numbering_dep']."-".$Seq;

        return $strNextSeq;
    }

    protected function check_paper_file_flag($file_id){
        $var = $this->check->get_paper_file($file_id);
        if($var->paper_file_flg == 1){
            return true;
        }else{
            return false;
        }
    }
}

/**
 * Class Core_Paper2 for paper_reviewer
 */
class Core_Paper2 extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
}

/**
 * Class Core_evaluation
 */
class Core_Evaluation extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("mol_auth_evaluation", "auth_evaluation");
    }

    /**
     * @param $user_id
     * @return mixed
     */
    protected function check_type_evaluation($user_id){
        $var = $this->check->check_user_type($user_id);
        return $var;
    }

    protected function check_owner_evaluation($eval_id,$user_id){
        $get_user_id = $this->auth_evaluation->getUser_by_Eval($eval_id);
        if ($get_user_id->user_id == $user_id){
            return true;
        }else{
            return false;
        }
    }
}

/**
 * Class Core_Paper_with_admin
 */
class Core_Paper_with_admin extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }
}

/**
 * Class Core_Upload
 */
class Core_Upload extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $paper_id
     * @return bool
     */
    protected function check_permission_paper($paper_id){
        $user_id = $this->session->userdata('user_id');
        $var = $this->check_user_type($user_id);
        if(!empty($var)){
            //check user part
            if($var['user_type'] == 0){
                $data = $this->check_owner_paper($paper_id,$user_id);
                return $data;
            //check admin part
            }elseif($var['user_type'] == 1){
                return true;
            //check reviewer part
            }elseif($var['user_type'] == 2){
                $data = $this->check_owner_reviewer($paper_id,$user_id);
                return $data;
            //other
            }else{
                return false;
            }
        //not found
        }else{
            return false;
        }
    }

    protected function check_permission_paper_index($paper_id = null){
        $user_id = $this->session->userdata('user_id');
        $var = $this->check_user_type($user_id);
        if(!empty($var)){
            //check user part
            if($var['user_type'] == 0){
                return true;
                //check admin part
            }elseif($var['user_type'] == 1){
                return true;
                //check reviewer part
            }elseif($var['user_type'] == 2){
                return true;
                //other
            }else{
                return true;
            }
            //not found
        }else{
            return true;
        }
    }

    /**
     * @param $paper_id
     * @return bool
     */
    protected function check_permission_paper_eval($eval_id){
        $user_id = $this->session->userdata('user_id');
        $var = $this->check_user_type($user_id);
        if(!empty($var)){
            //check user part
            if($var['user_type'] == 0){
                $data = $this->check_paper_evaluation_user($eval_id,$user_id);
                return $data;
                //check admin part
            }elseif($var['user_type'] == 1){
                return true;
                //check reviewer part
            }elseif($var['user_type'] == 2){
                $data = $this->check_evaluation_user($eval_id,$user_id);
                return $data;
                //other
            }else{
                return false;
            }
            //not found
        }else{
            return false;
        }
    }

    protected function check_permission_payment($paper_id){
        $user_id = $this->session->userdata('user_id');
        $var = $this->check_user_type($user_id);
        if(!empty($var)){
            //check user part
            if($var['user_type'] == 0){
                $data = $this->check_owner_paper($paper_id,$user_id);
                return $data;
                //check admin part
            }elseif($var['user_type'] == 1){
                return true;
                //check reviewer part
            }elseif($var['user_type'] == 2){
                return false;
                //other
            }else{
                return false;
            }
            //not found
        }else{
            return false;
        }
    }
}

/**
 * Class Core_Payment
 */
class Core_Payment extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mol_time',"time");
    }
}

/**
 * Class Core_Payment
 */
class Core_NewsEmail extends MY_Controller {
    public function __construct()
    {
        parent::__construct();

    }
}