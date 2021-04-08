<?php

class Printer {
        public $in_an;
        public $chat_lieu;
        public $gia_cong;

        function __construct() {
            $this->in_an = array("Decal","Tờ rơi","Poster","Catalogue");
            $this->chat_lieu = array("Decal sữa","Decal trong ","Decal giấy","Decal nhựa");
            $this->gia_cong = array("Cán màng bóng","Cán màng mờ","Không cán màng");
        }

    }
?>