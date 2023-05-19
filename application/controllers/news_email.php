<?php


class news_email extends Core_NewsEmail
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mol_email", "sys_email");
        $this->load->model("mol_news_email", "news_email");
        $this->load->library('manage_file');
        $this->load->library('form_validation');
    }

    function index()
    {

        redirect('news_email/form_email');
    }

    function form_email()
    {
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('news_email/index');
    }

    function send_email()
    {

        $data['blank'] = '';

        if (!$this->input->is_ajax_request()) {
            exit('no valid req.');
        }

        $this->form_validation->set_rules('chk_group', 'chk_group', 'required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $chk_group = $_POST['chk_group'];
            $title = $_POST['title'];
            $message = $_POST['message'];

            $data = array();

            if (isset($_FILES['filename']) && is_uploaded_file($_FILES['filename']['tmp_name'])) {

                //check dir
                $dirname = date("Y_m");
                $filename = "./uploads/attachment-file/" . $dirname . "/";
                $this->manage_file->check_dir($filename);

                //set preferences
                $config['upload_path'] = $filename;
                $config['allowed_types'] = 'pdf|doc|docx|zip|jpg|png';
                //$config['max_size']    = '11102400';

                //load upload class library
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('filename')) {
                    // case - failure
//                    $upload_error = array('error' => $this->upload->display_errors());

                    $data_msg['err'] = '<div class="errors">' . $this->upload->display_errors() . '</div>';
                    $data_msg['flag'] = false;

                    $data_msg = json_encode($data_msg);

                    echo $data_msg;
                    return false;


                } else {

                    // case - success
                    $upload_data = $this->upload->data();
                    $rename_file = 'Att_NCTECHED_' . date("Ymdmis");
                    $set_hash_file_name = sha1(time() . $rename_file) . "_a";
                    $full_rename_file = $upload_data['file_path'] . $set_hash_file_name . $upload_data['file_ext'];
                    $data_rename = rename($upload_data['full_path'], $full_rename_file);

                    $data['news_email_logs_file_name'] = $rename_file;
                    $data['news_email_logs_file_name_hash'] = $set_hash_file_name;
                    $data['news_email_logs_file_type'] = $upload_data['file_ext'];
                    $data['news_email_logs_year_dir'] = $dirname;

                }
            } else {


                $data['news_email_logs_file_name'] = '';
                $data['news_email_logs_file_name_hash'] = '';
                $data['news_email_logs_file_type'] = '';
                $data['news_email_logs_year_dir'] = '';
            }

            $data['news_email_logs_title'] = $title;
            $data['news_email_logs_msg'] = $message;
            $data['news_email_logs_user_type'] = implode(",", $chk_group);
            $data['user_id'] = $this->session->userdata('user_id');

            $list = $this->news_email->get_user_detail_from_type($chk_group);

            $all_email = array();
            foreach ($list as $emails) {
                $all_email[] = $emails->email;
            }

            $return_id = $this->news_email->insert_news_email($data);

            if (!empty($data['news_email_logs_file_name'])) {
                $data_hash = array(
                    'news_email_logs_id' => $return_id,
                    'news_email_logs_hash_str' => sha1(time() . $return_id),
                );


                $file_hash_id = $this->news_email->insert_file_hash($data_hash);

                $msg_att = '<div><p>ไฟล์แนบ :<a href="' . base_url() . 'uploadfile/download_attachment_file/' . $data_hash['news_email_logs_hash_str'] . '" target="_blank"> คลิก</a> </p></div>';
            } else {
                $msg_att = '';
            }

            $set_msg = '<div><p>' . $message . '</p></div>';
            $default_msg = '<hr><p>ทีมงาน NCTECHED</p>';

            $data_send = array(
                'title' => $title,
                'email' => $all_email,
                'message' => $set_msg . $msg_att . $default_msg

            );

            if($this->sys_email->broadcast_email(@$data_send)){
                $data_msg['err'] = '<div class="success">Your news is already send</div>';
                $data_msg['flag'] = true;

                $data_msg = json_encode($data_msg);

                echo $data_msg;
            } else {
                $data_msg['err'] = '<div class="errors">Your news is not send</div>';
                $data_msg['flag'] = false;

                $data_msg = json_encode($data_msg);

                echo $data_msg;
            }

        } else {

            $data_msg['err'] = '<div class="errors">' . validation_errors() . '</div>';
            $data_msg['flag'] = false;

            $data_msg = json_encode($data_msg);

            echo $data_msg;
        }


    }


}