<?php 
$castNow = getMp3StreamTitle('http://radioemiter.pl:8000/emiter.mp3', 19200);

if (strpos($castNow, ' - ') !== false) {
    list($songArtist, $songTitle) = explode(' - ', $castNow);
} else {
    $songTitle = $castNow;
    $songArtist = '';
}

$songArtistAPI = str_replace(' ', '%20', $songArtist);
$songTitleAPI = str_replace(' ', '%20', $songTitle);


if(getAlbumCoverFromLastfmAPI($songArtistAPI, $songTitleAPI) !== false) {
    $imageSrc = getAlbumCoverFromLastfmAPI($songArtistAPI, $songTitleAPI);
} else if(getAlbumCoverFromYoutubeAPI($songArtistAPI, $songTitleAPI) !== false) {
    $imageSrc = getAlbumCoverFromYoutubeAPI($songArtistAPI, $songTitleAPI);
} else {
    $imageSrc = 'https://image.flaticon.com/icons/svg/702/702130.svg';
}

?>
    <div class="MusicPlayer__cover"><img src=<?= $imageSrc ?>></img> </div>

    <div class="MusicPlayer__TextContainer">
        <p class="MusicPlayer__songTitle"> <?= $songTitle ?> </p>
        <p class="MusicPlayer__songAuthor"> <?= $songArtist ?> </p>
    </div>
<?php

function getAlbumCoverFromLastfmAPI($songArtistAPI, $songTitleAPI) {
    $lastfmApiKey = '24ea1ddb00614b6584fa6c8478591fd1';
    $url = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=$lastfmApiKey&artist=$songArtistAPI&track=$songTitleAPI&format=json";
    
    if($url == '') {
        return false;
    }

    $json = file_get_contents ($url);
    $array = json_decode($json, true);

    if(!empty($array['error'])) { 
        return false;
    }

    if(empty($array['error']) && !empty($array['track']['album']['image'])){
        return end($array['track']['album']['image'])['#text'];
    } 
    
    return false;
}

function getAlbumCoverFromYoutubeAPI($songArtistAPI, $songTitleAPI) {
    $youtubeApiKey = 'AIzaSyCmAFOJhsIMrM5eVXKhP4ZxKfsEDn9X534';
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&q=$songTitleAPI%20$songArtistAPI=video&key=$youtubeApiKey";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch);  
    $output = json_decode($output, true);

    if(!empty($output['error'])){
        return false;
    } else {
        return end($output['items'][0]['snippet']['thumbnails'])['url'];
    }
}

function getMp3StreamTitle($streamingUrl, $interval, $offset = 0, $headers = true) {
    $needle = 'StreamTitle=';
    $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36';

    $opts = [
            'http' => [
            'method' => 'GET',
            'header' => 'Icy-MetaData: 1',
            'user_agent' => $ua
        ]
    ];

    if (($headers = get_headers($streamingUrl))) {
        foreach ($headers as $h) {
            if (strpos(strtolower($h), 'icy-metaint') !== false && ($interval = explode(':', $h)[1])) {
                break;
            }
        }
    }

    $context = stream_context_create($opts);

    if ($stream = fopen($streamingUrl, 'r', false, $context)) {
        $buffer = stream_get_contents($stream, $interval, $offset);
        fclose($stream);

        if (strpos($buffer, $needle) !== false) {
            $title = explode($needle, $buffer)[1];
            return substr($title, 1, strpos($title, ';') - 2);
        } else {
            return getMp3StreamTitle($streamingUrl, $interval, $offset + $interval, false);
        }
    } else {
        throw new Exception("Unable to open stream [{$streamingUrl}]");
    }

}
