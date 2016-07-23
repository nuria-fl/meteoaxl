<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MeteoAxl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            font-family: sans-serif;
            color: #fff;
            text-align: center;
        }
        h1 {
            text-shadow: 0 0 10px rgba(0,0,0,.5)
        }
    </style>
</head>
<body>
    <h1></h1>
    <?php
    ini_set('display_errors', 1);
    require_once('TwitterAPIExchange.php');

    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    $settings = array(
        'oauth_access_token' => "57012246-LaTcPv9ME3H78IwfL9tdsR4jd2CkhfcoRGeT88q1Z",
        'oauth_access_token_secret' => "3beb3v9cc2UQFecfXPBt5AkEmk6dvjY5iFqeQGHWE6S5i",
        'consumer_key' => "zzNdQM6ek5jCMQhgBf3BmfwK1",
        'consumer_secret' => "bCVa3EWNJoFPCsUFjwiMKJhvWrAbYhogFLuGDRNneXxEgpEBEr"
    );

    /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
    $url = 'https://api.twitter.com/1.1/search/tweets.json';
    $getfield = '?q=%23meteoaxl&from=oreidoefecto&filter=media';
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    $request = $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    ?>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        var json = <?php echo $request ?>;
        var lastTweet = json.statuses[0];
        console.log(lastTweet)
        var img = lastTweet.entities.media[0].media_url;
        $('body').css('background-image', 'url("' + img + '")')
        var cleanText = lastTweet.text.split('http')[0];
        $('h1').text(cleanText)
        
    </script>
</body>
</html>