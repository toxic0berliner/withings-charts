<?php
require_once './php-withings/vendor/autoload.php';

use Paxx\Withings\Api as WithingsApi;
use Paxx\Withings\Server\Withings as WithingsAuth;

use Carbon\Carbon;

session_start();

//a touch of colors
$darkorange="#cc6600";
$orange=	 "#ff6600";
$yellow=	 "#fcd202";
$darkyellow="#b09303";
$blue=		 "#6074ea";
$darkblue= "#0f1d71";
$green=		 "#67d642";
$darkgreen="#235412";
$prune=		 "#cc00ff";
$darkprune="#660080";
$grey=		  "#666666";
$darkgrey=	"#404040";

//sume ugly global vars
$startdate = null;
$usersize=null;
$measures=array();
$lastfetch=null;
$datarefreshed=false;

// See if we were requested to refresh our data or obviously have to
if (array_key_exists('forcerefresh',$_GET) || !isset($_SESSION['lastfetch'])) {

  $datarefreshed=true;

  try {

    $config = array(
        'identifier' => '<get it from withings>',
        'secret' => '<get it from withings>',
        'callback_uri' => 'https://your/path/here/callback.php'
    );

    $server = new WithingsAuth($config);

    if (isset($_SESSION['oauth_token'])) {
        // Step 2

        // Retrieve the temporary credentials from step 2
        $temporaryCredentials = unserialize($_SESSION['temporary_credentials']);

        // Retrieve token credentials - you can save these for permanent usage
        $tokenCredentials = $server->getTokenCredentials($temporaryCredentials, $_SESSION['oauth_token'], $_SESSION['oauth_verifier']);

        // Also save the userId
        $userId = $_SESSION['userid'];
    } else {
        // Step 1

        // These identify you as a client to the server.
        $temporaryCredentials = $server->getTemporaryCredentials();

        // Store the credentials in the session.
        $_SESSION['temporary_credentials'] = serialize($temporaryCredentials);

        // Redirect the resource owner to the login screen on Withings.
        $server->authorize($temporaryCredentials);
    }

    $config = $config + array(
        'access_token' => $tokenCredentials->getIdentifier(),
        'token_secret' => $tokenCredentials->getSecret(),
        'user_id'      => $userId
    );

    $api = new WithingsApi($config);
    $user = $api->getUser();

    //finding out the user's size :
    foreach($user->getMeasures() as $measure) {
    	if (is_null($usersize) && !is_null($measure->getHeight())) {
    		$usersize=$measure->getHeight();
    	}
    }

    //if the user connected is myself, then fill in the old data from manual entry using json
    if ($user->getId()=="XXXXXXX") {
    	$startdate=Carbon::createFromFormat('Y-m-d H', '2016-07-13 09');
    }

    // Building the set of measures
    /**
     * @var \Paxx\Withings\Entity\Measure $measure
     */

    foreach($user->getMeasures() as $measure) {
    	if (!is_null($startdate) && $measure->getCreatedAt()->gt($startdate)) {
    		array_push($measures,$measure);
    	} elseif (is_null($startdate)){
    		array_push($measures,$measure);
    	}
    }
    $measures = array_reverse($measures);

    // store the measures in session :
    $_SESSION['measures']=serialize($measures);
    $lastfetch = Carbon::now();
    $_SESSION['lastfetch']=serialize($lastfetch);
    $_SESSION['usersize']=serialize($usersize);
  } catch (Exception $e) {
    // something went wrong, most probably in oauth. So we clean oAuth and retry :
    unset($_SESSION['oauth_token']);
    unset($_SESSION['oauth_verifier']);
    unset($_SESSION['userid']);
    header('Location: ./forcerefresh.php');
    exit;
  }

} else {
  //here we have not been requested to refresh our data set.
  // just load it from session:
  $measures = unserialize($_SESSION['measures']);
  $lastfetch = unserialize($_SESSION['lastfetch']);
  $usersize = unserialize($_SESSION['usersize']);
  
  //check if data is not too old : 
  $threshold = Carbon::now()->subHours(1);
  if ($lastfetch->lt($threshold)) {
  	//our data is too old, force refreshing : 
  	header('Location: ./forcerefresh.php');
  	exit;
  }
}


include 'html-part1.php';

// at this point, we only need to fill in the dataProvider before including the next html part.

//if the user connected is myself, then fill in the old data from manual entry using json
if ($_SESSION['userid']=="XXXXXXX") {
	echo file_get_contents('data-google.json');
	$startdate=Carbon::createFromFormat('Y-m-d H', '2016-07-13 09');
}

foreach($measures as $measure) {
    if ($measure->getWeight()) {
    	printf('{"TimeStamp": "%s", "Weight": "%s", "BMI": "%s",',$measure->getCreatedAt(), round($measure->getWeight(),1), round($measure->getWeight()/($usersize*$usersize),1));
		if ($measure->getFatRatio()>0) {
			printf(' "Fat": "%s",', round($measure->getFatRatio(),2));
		}
		if ($measure->getHydrationRatio()>0) {
			printf(' "Water": "%s",', round($measure->getHydrationRatio(),2));
		}
		if ($measure->getMuscleRatio()>0) {
			printf(' "Muscle": "%s",', round($measure->getMuscleRatio(),2));
		}
		if ($measure->getBoneRatio()>0) {
			printf(' "Bone": "%s",', round($measure->getBoneRatio(),2));
		}
		printf(' },%s',"\n");
    }
}

include 'html-part2.php';
