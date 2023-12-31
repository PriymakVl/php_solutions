<?php

namespace App\Helpers;

class Message
{

    public static function addKey($type, $key) 
    {
        session_start();
        $_SESSION['mess']['type'] = $type;
        $_SESSION['mess']['key'] = $key;
    }

    public static function addText($type, $text)
    {
        session_start();
        $_SESSION['mess']['type'] = $type;
        $_SESSION['mess']['text'] = $text;
    }

    public static function display()
    {
        session_start();
        if (empty($_SESSION['mess'])) return;
        $type = $_SESSION['mess']['type'];

        $text = self::getText($type);
        if ($type == 'ok') echo "<div class='alert alert-success mt-3'>$text</div>";
        else echo "<div class='alert alert-danger mt-3'>$text</div>"; 

        unset($_SESSION['mess']);
    }

    private static function getText($type)
    {
        if ($_SESSION['mess']['text']) return $_SESSION['mess']['text'];
        $key = $_SESSION['mess']['key'];
        $messages = include 'messages.php';
        return $messages[$type][$key];
    }
}

// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>