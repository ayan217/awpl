<?php
defined('BASEPATH') or exit('No direct script access allowed');
class multipleNeedsModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function mail($to, $subject, $msg, $atch = array())
	{
		$this->load->library('email');
		$tos = explode(',', $to);
		foreach ($tos as $too) {
			$this->email->from(FROM_MAIL, 'AWPL');
			$this->email->to($too);
			$this->email->subject($subject);
			$this->email->set_mailtype("html");
			$this->email->message($msg);
			if (!empty($atch)) {
				foreach ($atch as $attachment) {
					$this->email->attach($attachment);
				}
			}
			$this->email->send();
		}
	}
}
