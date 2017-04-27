<?php


try {

$google = new Google_Client(array(
	'client_id' => $this->config->item('GOOGLE_CLIENT_ID'),
	'client_secret' => $this->config->item('GOOGLE_CLIENT_SECRET'),
	'redirect_uri' => $this->config->item('GOOGLE_REDIRECT_URI'), 

return 

));

	if(isset($_GET['code'])){
		$google->fetchAccessTokenWithAuthCode($GET['code']);
		$_SEESION['google_access_token'] = $google->getAccessToken();
		$google_user = $google->verifyIdToken();
		$id = $google_user['sub'];
	}

	
}

catch(LogicException $e){

}

catch(InvalidArgumentException $e){

}

if(isset($_SESSION['google_access_token'])){
	$google->setAccessToken($_SESSION['google_access_token']);
	if ($google->isAccessTokenExpired())
	{
		$google->fetchAccessTokenWithRefreshToken();
		$_SESSION['google_access_token'] = $google->getAccessToken();	
	}
}

//Not sure this part need or not

load_script("//apis.google.com/js/api.js", function()){
	gapi.load("client:auth2", function() ){
		gapi.auth2.init({
			client_id: "<?=$this->config->item('GOOGLE_CLIENT_ID')?>",
			scope: "https://www.googleapis.com/auth/calnendar"
		}).then(function() {
			gapi.auth2.getAuthInstance().isSignedIn.listen(function() {
				gapi.client.load("calendar", "v3", function() {});
		})

		gapi.auth2.getAuthInstance().signIn();

	});
});

//
//

if (gapi.auth2.getAuthInstance().isSignedIn.get()) {


	
}



?>
