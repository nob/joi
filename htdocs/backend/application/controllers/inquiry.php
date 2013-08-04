<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inquiry extends CI_Controller {

	public function index()
	{
        $this->load->library(array('form_validation', 'email'));

        /* ---------------------------------------
         * input data validation.
         * --------------------------------------- */
        if ($this->form_validation->run() === FALSE) {
            //redirect back to form page and show error message.
//echo validation_errors();exit;
            echo json_encode(array('accepted' => false));
            return;
        }

        $data = array(
                 'name' => $this->input->post('name'),
                 'url' => $this->input->post('url'),
                 'email' => $this->input->post('email'),
                 'message' => $this->input->post('inquiry-msg'),
                 'create_date' => date('Y-m-d H:i:s'),
        );

        /* ---------------------------------------------
         * send notification email to our team.
         * --------------------------------------------- */
        $this->email->from($this->config->item('notice_from'),
                           $this->config->item('notice_from_name'));
        $this->email->to($this->config->item('notice_to'));
        $this->email->reply_to($data['email']);
        $this->email->subject(sprintf($this->config->item('notice_subject'), $data['name']));
		$email_body = $this->load->view('inquiry_notification_email', $data, true);
		$this->email->message($email_body);
        $this->email->send();
        log_message('info', $this->email->print_debugger());

        $this->email->clear(true); //clear all variables set above, including attachment file.

        /* ---------------------------------------------
         * send confirmation email to customer.
         * --------------------------------------------- */
        $this->email->from($this->config->item('confirmation_from'),
                           $this->config->item('confirmation_from_name'));
        $this->email->to($data['email']);
        $this->email->subject($this->config->item('confirmation_subject'));
		$email_body = $this->load->view('customer_confirmation_email', $data, true);
		$this->email->message($email_body);
        $this->email->send();
        log_message('info', $this->email->print_debugger());

        /* ---------------------------------------
         * inquiry submission was accepted.
         * --------------------------------------- */
        echo json_encode(array('accepted' => true));
        return;
	}
}
