<?php

require_once __DIR__.'/config.php';

$username = $_GET['username'];

$url = sprintf(
    'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=%s&api_key=%s&format=%s&limit=%d',
    $username,
    $config['api_key'],
    'json',
    1
);

$data = json_decode(file_get_contents($url), true);

if (isset($data['recenttracks']['track'][0])) {
    $data = $data['recenttracks']['track'][0];

    echo sprintf(
        '%s<strong>%s</strong> by <strong>%s</strong>%s',
        isset($data['image'][0]['#text']) ? sprintf('<img src="%s">', $data['image'][0]['#text']) : '',
        $data['name'],
        $data['artist']['#text'],
        $data['album']['#text'] ? sprintf(' from <strong>%s</strong>', $data['album']['#text']) : ''
    );
} else {
}

