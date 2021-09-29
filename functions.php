<?php
require_once("csv_utils.php");

$imgs = ["https://i.ibb.co/0MSRhGc/1.png",
        "https://i.ibb.co/Jy5hGRh/2.png",
        "https://i.ibb.co/Ny42x4n/3.png",
        "https://i.ibb.co/wRfd9h5/4.png",
        "https://i.ibb.co/yNK7Mz0/5.png",
        "https://i.ibb.co/Trm1g8y/6.png",
        "https://i.ibb.co/QPz9TjX/7.png",
        "https://i.ibb.co/kGKxG67/8.png"];

function createCards($users, $authors, $quotes, $imgs) {
    for ($i = 1; $i <= count($quotes); $i++) { ?>
        <div class="slider-item align-content-center">
            <div class="animation-card_image">
                <img src=<?= $imgs[random_int(0, 7)] ?>>
            </div>
            <div class="animation-card_content">
                <h3 class="animation-card_content_title title-2 fw-bold"><?= $users[$i]['name'] ?></h3>
                <p class="text-dark fw-lighter">@<?= $users[$i]['username'] ?></p>
                </figcaption>
                <figure>
                    <blockquote class="blockquote animation-card_content_description p-2 pt-1">
                        <p><i class="bx bxs-quote-alt-left quote-icon-left text-secondary pe-2"></i><?= $quotes[$i]['quote'] ?><i
                                class="bx bxs-quote-alt-right quote-icon-right text-secondary ps-2"></i></p>
                    </blockquote>
                    <figcaption class="blockquote-footer text-end">
                        <cite title="Source Title"><?= $authors[$quotes[$i]['author_id']]['first_name'] . " " . $authors[$quotes[$i]['author_id']]['last_name'] ?></cite>
                    </figcaption>
                </figure>
            </div>
        </div>
    <?
    }
}

function findAuthor($authors, $author) {
    for ($i = 1; $i <= count($authors); $i++) {
        if ($authors[$i]['first_name'] . " " . $authors[$i]['last_name'] == $author) {
            return $i;
        }
    }
    return $i++;
}