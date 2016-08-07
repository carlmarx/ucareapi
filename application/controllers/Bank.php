<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CU_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	protected function allowAnonymous()
	{
		return true;
	}
	
	public function index()
	{
		echo "Welcome to Bank Page";
	}

	public function getAccountDetails(){
		// $service_url = 'http://apidev.unionbankph.com/api/Transfer';
  //     	$curl = curl_init($service_url);
  //     	// $curl_post_data = "{'channel_id': 'UCARE','transaction_id': '12345188',  'source_account': '000000000031',  'source_currency': 'PHP',  'target_account': '000000000032',  'target_currency': 'PHP',  'amount': 7.0}";
  //     	$curl_post_data = array(
	 //        'channel_id' => 'UCARE',
	 //        'transaction_id' => '1111',
	 //        'source_account' => '000000000031',
	 //        'source_currency' => 'PHP',
	 //        'target_account' => '000000000032',
	 //        'target_currency' => 'PHP',
	 //        'amount' => '7.0'
		// );
  //     	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //     	curl_setopt($curl, CURLOPT_POST, true);
  //     	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
  //     	$curl_response = curl_exec($curl);
  //     	curl_close($curl);

      	//$xml = new SimpleXMLElement($curl_response);

      	// echo $curl_response;
    }
	
}

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */