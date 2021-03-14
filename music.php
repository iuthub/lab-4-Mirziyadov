<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="../../Downloads/Telegram%20Desktop/viewer.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="playlist">
        <?php
        //        $q = $_REQUEST["playlist"];// Gives an error
        if (isset($_REQUEST["playlist"])) {
            $querySongs = file("songs/{$_REQUEST["playlist"]}");
            ?>
            <a href="../webpage/music.php" id="return">Back</a>
            <?php foreach ($querySongs as $file) {
                if (strchr($file,'#')) {continue;}?>
                <li class="mp3item">
                    <a href="<?= "songs/{$file}" ?>"><?= $file ?></a>
                </li>
            <?php } ?>
    </ul>
    <ul id="musiclist">
    <?php } else {
            $songs = glob("songs/*.mp3");
            foreach ($songs as $song) {
                $songName = basename($song);
                $size = filesize($song)
                ?>
                <li class="mp3item">
                    <a href="<?= $song ?>"><?= $songName ?></a>
                    <?php if ($size < 1023) { ?>
                        (<?= round($size, 2) ?> b)
                    <?php } elseif (($size >= 1048576 )) { ?>
                    (<?= round($size / 1048576, 2) ?>mb)
                    <?php } elseif ($size >= 1024 and $size <= 1048576) { ?>
                        (<?= round($size / 1024, 2) ?>kb)
                    <?php } ?>
                </li>
            <?php } ?>

            <?php $playlists = glob("songs/*.txt");
            foreach ($playlists as $playlist) {
                $playlistName = basename($playlist);
                ?>
                <li class="playlistitem">
                    <a href="<?= $playlist ?>"><?= $playlistName ?></a>
                </li>
            <?php }
        }
        ?>
    </ul>

        <!---->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Be More.mp3">Be More.mp3</a>-->
        <!--            (5438375 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Drift Away.mp3">Drift Away.mp3</a>-->
        <!--            (5724612 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Hello.mp3">Hello.mp3</a>-->
        <!---->
        <!--            (1871110 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="mp3item">-->
        <!--            <a href="songs/Panda Sneeze.mp3">Panda Sneeze.mp3</a>-->
        <!--            (58 b)-->
        <!--        </li>-->
        <!---->
        <!--        <li class="playlistitem">-->
        <!--            <a href="music.php?playlist=mypicks.txt">mypicks.txt</a>-->
        <!--        </li>-->
        <!---->
        <!--        <li class="playlistitem">-->
        <!--            <a href="music.php?playlist=playlist.txt">playlist.txt</a>-->
        <!--        </li>-->
    </ul>
</div>
</body>
</html>
