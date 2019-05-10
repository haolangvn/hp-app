<?php

use yii\helpers\Url;
?>
<nav class="navbar navbar-expand-md mainanv d-none d-md-block">
    <div class="collapse navbar-collapse" id="navbarsExample04">

        <ul class="navbar-nav mr-auto">
            <?= $mainNav; ?>
        </ul>
    </div>
</nav>

<div class="modal fade d-block d-md-none mobile" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog mobile_nav" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-list">
                    <li>
                        <a href="<?= Url::toRoute(['about/index']) ?>" class="tree-toggle nav-header">Về Minus 417</a>
                    </li>
                    <?= $mobileNav; ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#newsLetter">Đăng ký</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--<div class="modal fade d-block d-md-none mobile" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog mobile_nav" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <ul class="nav nav-list">

                    <li><a href="https://www.minus417.com/about" class="tree-toggle nav-header">ABOUT</a>

                    </li>
                    <li><a href="javascript:void(0)" class="tree-toggle nav-header">Products</a>

                        <ul class="nav nav-list tree" style="display: none;">

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Show me</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/new-products">New products</a></li><li><a href="https://www.minus417.com/en/special-offers">Special offers</a></li><li><a href="https://www.minus417.com/gifts-special-offers">Gifts</a></li><li><a href="https://www.minus417.com/en/everything">everything</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Face</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/day-moisturizer">DAY MOISTURIZER</a></li><li><a href="https://www.minus417.com/en/night-cream">NIGHT CREAM</a></li><li><a href="https://www.minus417.com/en/serum">SERUM</a></li><li><a href="https://www.minus417.com/en/cleanser">CLEANSER</a></li><li><a href="https://www.minus417.com/en/masks">MASKS</a></li><li><a href="https://www.minus417.com/en/peelings">PEELINGS</a></li><li><a href="https://www.minus417.com/en/eye-creams">EYES</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Body</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/body-scrub">BODY SCRUB</a></li><li><a href="https://www.minus417.com/en/body-butter">BODY BUTTER</a></li><li><a href="https://www.minus417.com/en/dead-sea-salt">BODY DEAD SEA SALT</a></li><li><a href="https://www.minus417.com/en/dead-sea-mud">BODY DEAD SEA MUD</a></li><li><a href="https://www.minus417.com/en/shower-gel">SHOWER GEL</a></li><li><a href="https://www.minus417.com/en/hair-care">HAIR CARE</a></li><li><a href="https://www.minus417.com/en/hand-cream">HAND CREAM</a></li><li><a href="https://www.minus417.com/en/foot-cream">FOOT CREAM</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">CONCERNS</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/anti-aging">ANTI AGING</a></li><li><a href="https://www.minus417.com?section=2103">hydration</a></li><li><a href="https://www.minus417.com/en/even-skin-tone">EVEN SKIN TONE</a></li><li><a href="https://www.minus417.com/en/body-slimmimg">BODY SLIMMING</a></li><li><a href="https://www.minus417.com/en/body-pampering">BODY PAMPERING</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Skin type</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/dry-skin">DRY SKIN</a></li><li><a href="https://www.minus417.com/en/normal-skin">NORMAL SKIN</a></li><li><a href="https://www.minus417.com/en/oily-skin">OILY SKIN</a></li><li><a href="https://www.minus417.com/en/sensitive-skin">SENSITIVE SKIN</a></li>
                                </ul>

                            </li>

                        </ul>

                    </li>
                    <li><a href="javascript:void(0)" class="tree-toggle nav-header">Collection</a>

                        <ul class="nav nav-list tree" style="display: none;">

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">HYDRATING</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/redefine">Re Define</a></li><li><a href="https://www.minus417.com/en/infinite-motion">Infinite Motion </a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">BRIGHTENING</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/even-more">Even More</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Anti Aging</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/radiant-see">Radiant See</a></li><li><a href="https://www.minus417.com/en/time-control">Time Control</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">Body &amp; Hair</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/serenity-legend">Serenity Legend</a></li><li><a href="https://www.minus417.com/en/absolute-mud">Absolute Mud</a></li><li><a href="https://www.minus417.com/en/sensual-essense">Sensual Essense</a></li>
                                </ul>

                            </li>

                            <li>
                                <a href="javascript:void(0)" class="tree-toggle nav-header">For Men</a>

                                <ul class="nav nav-list tree" style="display: none;">
                                    <li><a href="https://www.minus417.com/en/for-men">For Men</a></li>
                                </ul>

                            </li>

                        </ul>

                    </li>
                    <li>
                        <a href="#" class="tree-toggle nav-header">English</a>
                        <ul class="nav nav-list tree" style="display: none;">

                            <li><a href="https://www.minus417.com?section=1" class="tree-toggle nav-header">English</a></li>
                            <li><a href="http://fr.minus417.com" class="tree-toggle nav-header">français</a></li>
                            <li><a href="https://www.minus417.com/es" class="tree-toggle nav-header">español</a></li>
                            <li><a href="https://www.minus417.com/de" class="tree-toggle nav-header">Deutsch</a></li>
                            <li><a href="https://www.minus417.com/ru-index" class="tree-toggle nav-header">русский</a></li>
                            <li><a href="https://www.minus417.com/portugues" class="tree-toggle nav-header">Português</a></li>
                            <li><a href="https://www.minus417.com?section=402" class="tree-toggle nav-header">中文</a></li>
                            <li><a href="https://www.minus417.com?section=653" class="tree-toggle nav-header">עברית</a></li>
                            <li><a href="https://www.minus417.com?section=656" class="tree-toggle nav-header">Cyprus</a></li>
                            <li><a href="https://www.minus417.com?section=719" class="tree-toggle nav-header">Finnish</a></li>
                            <li><a href="https://www.minus417.com?section=1139" class="tree-toggle nav-header">polish</a></li>
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#newsLetter">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>-->