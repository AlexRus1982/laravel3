<?php //create additional columns
    //$sqlRequest = "ALTER TABLE `tags` ADD `tag_alias` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'название для тэга' AFTER `property_url`";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `tags` ADD `tag_alias_h1` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'название H1 для тэга' AFTER `tag_alias`";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `tags` ADD `tags_default_title` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка тэга' AFTER `tag_alias_h1`";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `tags` ADD `tag_use_default_meta` INT NOT NULL DEFAULT '1' COMMENT 'использовать формулу по умолчанию' AFTER `tag_alias_h1`";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `tags` ADD `tags_default_title_h1` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка H1 тэга' AFTER `tag_use_default_meta`";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `tags` ADD `tags_default_meta` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула для meta тэга' AFTER `tags_default_title_h1`";
    //DB::statement($sqlRequest);


    //$sqlRequest = "ALTER TABLE `categories` ADD `category_use_default_meta` INT NOT NULL DEFAULT '1' COMMENT 'использовать формулу по умолчанию'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `categories` ADD `category_title` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `categories` ADD `category_title_h1` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка H1'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `categories` ADD `category_meta` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула для meta'";
    //DB::statement($sqlRequest);


    //$sqlRequest = "ALTER TABLE `catalog` ADD `products_use_default_meta` INT NOT NULL DEFAULT '1' COMMENT 'использовать формулу по умолчанию'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `catalog` ADD `products_title` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `catalog` ADD `products_title_h1` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула формирования заголовка H1'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `catalog` ADD `products_meta` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула для meta'";
    //DB::statement($sqlRequest);
    //$sqlRequest = "ALTER TABLE `catalog` ADD `products_desc` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'формула для описания'";
    //DB::statement($sqlRequest);
?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="cookie-uuid" content="{{ Config::get('cookie-uuid') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <title>Test page</title>
    </head>
    <body>
        Test page<br>

        <details class="p-3 border m-2" style="width: 30%;">
            <summary>
                12235435
            </summary>
                <hr>
                234235235346
        </details>
        <details class="p-3 border m-2" style="width: 30%;">
            <summary>
                12235435
            </summary>
                <hr>
                234235235346
        </details>

        <img class="ms-5" src="/public/images/edit-button.svg" style="width: 64px; height: 64px; color: #00F;">

        <div id="my-social-icon" class="m-5">{!! file_get_contents($_SERVER['DOCUMENT_ROOT']. '/public'. '/images/edit-button.svg') !!}</div>
        <style>
            #my-social-icon svg {
                transition: 0.3s;
                width: 64px;
                height: 64px;
                color: blue;
            }

            #my-social-icon:hover svg {
                cursor: pointer;
                transform: scale(1.2);
                color: red;
            }
        </style>

        <div class="disappear">
            <span>з</span>
            <span>а</span>
            <span>г</span>
            <span>р</span>
            <span>у</span>
            <span>з</span>
            <span>к</span>
            <span>а</span>
            <span>.</span>
            <span>.</span>
            <span>.</span>
        </div>
        <style>
            body {
                overflow: hidden;
                background: white;
            }
            .disappear {
                height:100vh;
                font-size:8vw;
                font-weight: 900;
                text-transform: uppercase;
                position: absolute;
                left:0;
                right:0;
                margin: auto;
                width:100%;
                text-align: center;
                height:fit-content;
                bottom:0;
                top:0;
                transform: scaleX(0.7);
            }
            .disappear span {
                display: inline-block;
                color:transparent;
                text-shadow: 0px 0px 0px #0000FF;
                animation-duration: 3s;
                animation-iteration-count: infinite;
            }
            .disappear span:nth-child(1){
                animation-name: disappearleft;
            }
            .disappear span:nth-child(2){
                animation-name: disappearleft;
                animation-delay: .3s;
            }
            .disappear span:nth-child(3){
                animation-name: disappearight;
                animation-delay: .6s;
            }
            .disappear span:nth-child(4){
                animation-name: disappearleft;
                animation-delay: .8s;
            }
            .disappear span:nth-child(5){
                animation-name: disappearight;
                animation-delay: 1s;
            }
            .disappear span:nth-child(6){
                animation-name: disappearight;
                animation-delay: 1.3s;
            }
            .disappear span:nth-child(7){
                animation-name: disappearleft;
                animation-delay: 1.6s;
            }
            .disappear span:nth-child(8){
                animation-name: disappearight;
                animation-delay: 2s;
            }
            .disappear span:nth-child(9){
                animation-name: disappearight;
                animation-delay: 2.3s;
            }
            .disappear span:nth-child(10){
                animation-name: disappearight;
                animation-delay: 2.5s;
            }

            .disappear span:nth-child(11){
                animation-name: disappearight;
                animation-delay: 2.7s;
            }
            @keyframes disappearleft{
                50% {transform: skew(50deg) translateY(-200%);
                    text-shadow: 0px 0px 50px;
                        opacity: 0;
                }
            }
            @keyframes disappearight{
                50% {transform: skew(-50deg) translateY(-200%);
                    text-shadow: 0px 0px 50px;
                        opacity: 0;
                }
            }
        </style>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/test.js"></script>
   
</html>
