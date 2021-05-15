<?php
function style($profile,$cover){
    echo('    <style>
    .pagenamea {
        top: 0px;
        width: 100%;
        height: 80%;
        margin: 0px;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-image: url("'.$cover.'");
    }

    .profilepic {
        background-image: url("'.$profile.'");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 180px;
        height: 180px;
        display: flex;
        justify-self: center;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50%;
        z-index: 99999;
        margin-top: -60px;
    }

    .everpic {
        background-image: url("'.$profile.'");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 20px;
        height: 20px;
        display: flex;
        justify-self: center;
        border-radius: 50%;
        z-index: 99999;
        margin-right: 4px;
    }

    .everpic2 {
        background-image: url("'.$profile.'");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 40px;
        height: 40px;
        display: flex;
        justify-self: center;
        border-radius: 50%;
        z-index: 99999;
        margin-right: 4px;
    }
    @import url("https://fonts.googleapis.com/css?family=Lato&display=swap");

    .music-container {
        background-color: #858796;
        border-radius: 15px;
        box-shadow: 0 5px 5px 0 #85858598;
        display: flex;
        padding: 20px 30px;
        position: relative;
        margin: 100px 0;
        z-index: 10;
    }

    .img-container {
        position: relative;
        width: 110px;
    }


    .img-container img {
        border-radius: 50%;
        object-fit: cover;
        height: 110px;
        width: inherit;
        position: absolute;
        bottom: 0;
        left: 0;
        animation: rotate 3s linear infinite;

        animation-play-state: paused;
    }

    .music-container.play .img-container img {
        animation-play-state: running;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .navigation {
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }

    .action-btn {
        background-color: rgba(255, 255, 255, 0);
        border: 0;
        color: #f8f9fc;
        font-size: 20px;
        cursor: pointer;
        padding: 10px;
        margin: 0 20px;
        transition: ease 0.3s all;
    }

    .action-btn:hover {
        background-color: rgba(255, 255, 255, 0);
        color: #5a5c69;
    }

    .action-btn.action-btn-big {
        color: #f8f9fc;
        font-size: 30px;
    }

    .action-btn.action-btn-big:hover {
        color: #5a5c69;
        font-size: 30px;
    }

    .action-btn:focus {
        outline: 0;
    }

    .music-info {
        background-color: #8587967c;
        color: #5a5c69;
        border-radius: 15px 15px 0 0;
        position: absolute;
        top: 0;
        left: 20px;
        width: calc(100% - 40px);
        padding: 10px 10px 10px 150px;
        opacity: 0;
        transform: translateY(0%);
        transition: transform 0.3s ease-in, opacity 0.3s ease-in;
        z-index: 0;
    }

    .music-container.play .music-info {
        opacity: 1;
        transform: translateY(-100%);
    }

    .music-info h4 {
        margin: 0;
    }

    .progress-container {
        background: #858796;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px 0;
        height: 4px;
        width: 100%;
    }

    .progress {
        background-color: #f8f9fc;
        border-radius: 5px;
        height: 100%;
        width: 0%;
        transition: width 0.1s linear;
    }

    .margin {
        margin-top: 70px;
    }

</style>
');
}
function musicstyle(){
    echo('
    <style>
    @import url("https://fonts.googleapis.com/css?family=Lato&display=swap");

    .music-container {
        background-color: #858796;
        border-radius: 15px;
        box-shadow: 0 5px 5px 0 #85858598;
        display: flex;
        padding: 20px 30px;
        position: relative;
        margin: 100px 0;
        z-index: 10;
    }

    .img-container {
        position: relative;
        width: 110px;
    }


    .img-container img {
        border-radius: 50%;
        object-fit: cover;
        height: 110px;
        width: inherit;
        position: absolute;
        bottom: 0;
        left: 0;
        animation: rotate 3s linear infinite;

        animation-play-state: paused;
    }

    .music-container.play .img-container img {
        animation-play-state: running;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .navigation {
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }

    .action-btn {
        background-color: rgba(255, 255, 255, 0);
        border: 0;
        color: #f8f9fc;
        font-size: 20px;
        cursor: pointer;
        padding: 10px;
        margin: 0 20px;
        transition: ease 0.3s all;
    }

    .action-btn:hover {
        background-color: rgba(255, 255, 255, 0);
        color: #5a5c69;
    }

    .action-btn.action-btn-big {
        color: #f8f9fc;
        font-size: 30px;
    }

    .action-btn.action-btn-big:hover {
        color: #5a5c69;
        font-size: 30px;
    }

    .action-btn:focus {
        outline: 0;
    }

    .music-info {
        background-color: #8587967c;
        color: #5a5c69;
        border-radius: 15px 15px 0 0;
        position: absolute;
        top: 0;
        left: 20px;
        width: calc(100% - 40px);
        padding: 10px 10px 10px 150px;
        opacity: 0;
        transform: translateY(0%);
        transition: transform 0.3s ease-in, opacity 0.3s ease-in;
        z-index: 0;
    }

    .music-container.play .music-info {
        opacity: 1;
        transform: translateY(-100%);
    }

    .music-info h4 {
        margin: 0;
    }

    .progress-container {
        background: #858796;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px 0;
        height: 4px;
        width: 100%;
    }

    .progress {
        background-color: #f8f9fc;
        border-radius: 5px;
        height: 100%;
        width: 0%;
        transition: width 0.1s linear;
    }

    .margin {
        margin-top: 70px;
    }

    </style>');
}
?>