<?php
/*************************************************************************************************************************************/
/*									CLASS za technical_test																			 */
/*************************************************************************************************************************************/
class TechnicalTest{
	//class members
	private 	$APIUsername	=	"hiring";
	private 	$APIPassword	=	"cosmicdev";
	private 	$APIurl			=	"http://technical_test.client.cosmicdevelopment.com/api/token/";
	private		$getEmpl		=	"http://technical_test.client.cosmicdevelopment.com/api/employee/list/";
	private		$access_token	=	"";

	public function __construct(){
		$this->access_token	=	$this->getTocken();//return fe2e5745701fcd3e2b105349eb92572b
	}
	public function getData(){
		return $this->setCURL($this->getEmpl);
	}
	private function getTocken(){
		$access_token	=	$this->setCURL($this->APIurl);
		$data			= 	json_decode($access_token,true);
		return $data["data"]["access_token"];
	}
	private function setCURL($url){
		
			$data = array(
				"grant_type" => "password",
				"client_id" => "6779ef20e75817b79601",
				"client_secret" => "3e0f85f44b9ffbc87e90acf40d482601",
				"username" => $this->APIUsername,
				"password" => $this->APIPassword
			);
			// Initializes a new cURL session
			$curl = curl_init($url);
			// Set the CURLOPT_RETURNTRANSFER option to true
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			// Set the CURLOPT_POST option to true for POST request
			curl_setopt($curl, CURLOPT_POST, true);
			// Set the request data as JSON using json_encode function
			curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
			// Set custom headers for RapidAPI Auth and Content-Type header
			curl_setopt($curl, CURLOPT_HTTPHEADER, [
				  'X-RapidAPI-Host:'.$url,
				  "Access-Token:".$this->access_token,
				  'Content-Type: application/json'
			]);
			// Execute cURL request with all previous settings
			$response = curl_exec($curl);

			 if(curl_exec($curl) === false)
			{
				echo 'Curl error: ' . curl_error($curl);
			}
			else
			{
				// Close cURL session
				curl_close($curl);
				return $response;
			}

	}
}
/*************************************************************************************************************************************/
/*									END CLASS za technical_test																		 */
/*************************************************************************************************************************************/
?>