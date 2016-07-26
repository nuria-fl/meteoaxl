<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MeteoAxl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-6926012-5', 'auto');
    ga('send', 'pageview');

    </script>
</head>
<body>
    <h1>#MeteoAxl</h1>
    <main>
        <i id="content-icon"></i>
        <span id="content"></span>
    </main>
    <footer>
        <a href="https://github.com/nuria-fl/meteoaxl"><i class="fa fa-github"></i> @nuria-fl</a>
        &nbsp; | &nbsp;
        <a href="https://twitter.com/pincfloit"><i class="fa fa-twitter"></i> @pincfloit</a>
    </footer>
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
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="dist/scripts.min.js"></script>
    <script>
        var json = <?php echo $request ?>;
        loadMeteo(json)
    </script>
</body>
</html>