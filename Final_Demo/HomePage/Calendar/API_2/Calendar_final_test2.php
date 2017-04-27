  <?php

  date_default_timezone_set('UTC');

  //date.timezone="Asia/Seoul";
  //$calendarId = 'sonch123@iastate.edu'; // TODO 내 캘린더 아이디로 설정
  $calendarId = 'grademe-3@grademe-309.iam.gserviceaccount.com';

  //require_once __DIR__ . '/vendor/autoload.php';

/*
  define('APPLICATION_NAME', 'Google Calendar API PHP Quickstart');
  define('CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
  define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
  define('SCOPES', implode(' ', array(
    Google_Service_Calendar::CALENDAR_READONLY)
  ));
   
  
  error_reporting(E_ALL); ini_set("display_errors", 1); // php 에러를 출력 하도록 합니다
  require_once 'vendor/autoload.php'; // google api 로드
  putenv('GOOGLE_APPLICATION_CREDENTIALS=service-account.json'); // 인증 정보 저장 파일을 환경 변수로 설정
  //define('SCOPES', implode(' ', array(Google_Service_Calendar::CALENDAR_READONLY ) )); // 구글 캘린더 접근 권한을 설정
  define('SCOPES', 'https://www.googleapis.com/auth/calendar');
  // 구글 인증
  $client = new Google_Client();
  $client->setScopes(SCOPES);
  $client->useApplicationDefaultCredentials();
  */
 require_once __DIR__ . '/vendor/autoload.php';


define('APPLICATION_NAME', 'GradeMe4');
define('CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/service-account.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR)
));
/*
if (php_sapi_name() != 'cli') {
  throw new Exception('This application must be run on the command line.');
}
*/

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {
    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser:\n%s\n", $authUrl);
    print 'Enter verification code: ';
    $authCode = trim(fgets(STDIN));

    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
  }
  return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}

$client = getClient();
// 캘린더 서비스 사용
$service = new Google_Service_Calendar($client);
$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Google API Event Insert',
  'description' => 'A chance to hear more about Google\'s developer products.',
  'start' => array(
    'dateTime' => '2017-04-13T09:00:00-07:00', // TODO 시간을 조절하세요
    'timeZone' => 'America/Chicago',
  ),
  'end' => array(
    'dateTime' => '2017-04-16T17:00:00-07:00', // TODO 시간을 조절하세요
    'timeZone' => 'America/Chicago',
  ),
));
// 샘플 이벤트 등록
$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Google I/O 2015',
  'location' => '800 Howard St., San Francisco, CA 94103',
  'description' => 'A chance to hear more about Google\'s developer products.',
  'start' => array(
    'dateTime' => '2015-05-28T09:00:00-07:00',
    'timeZone' => 'America/Los_Angeles',
  ),
  'end' => array(
    'dateTime' => '2015-05-28T17:00:00-07:00',
    'timeZone' => 'America/Los_Angeles',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=2'
  ),
  'attendees' => array(
    array('email' => 'lpage@example.com'),
    array('email' => 'sbrin@example.com'),
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));

//$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s\n', $event->htmlLink);


?>
