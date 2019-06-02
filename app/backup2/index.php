<?
include_once "parameters.php"; 
session_start();


if(isset($_GET['resultKey']) && !empty($_GET['resultKey'])){
    $_SESSION['resultKey'] = $_GET['resultKey'];
    header('Location: http://idol.drivefitness.ru');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title>Drive Fitness</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <? 
        if ($_SESSION['resultKey']) { ?>
            <meta property="og:image" content="uploads/<?=$_SESSION['resultKey']?>.png">
        <? } else { ?>
            <meta property="og:image" content="path/to/image.jpg">
        <? } ?>
    <link rel="shortcut icon" href="img/favicon/fire.png" type="image/x-icon">
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#fff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#fff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">

    <style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106073122-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-106073122-1');
  </script>
  <!-- Yandex.Metrika counter --> 
  <script type="text/javascript" > 
    (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter23058496 = new Ya.Metrika2({ id:23058496, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/tag.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks2"); 
  </script> 
  <noscript><div><img src="https://mc.yandex.ru/watch/23058496" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<script>window.roistatCookieDomain = 'drivefitness.ru';</script>

    <script>

    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', 'f1f50f523729691571e03b60d69bdea4');


    </script>
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-content">
                        <div class="header-content__left"><span>здесь идут к цели</span></div>
                        <div class="header-content__logo"><img src="img/logo2.svg" alt=""></div>
                        <div class="header-content__right"><a href="#section2">Начать игру</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fullpage">

        <section class="first-block section page" data-anchor="section1">
        
            <div class="first-place">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="first-place__line">Не смотри на них. Верь в себя</span>
                            <span class="first-place__line2">Раскрой свой драйв</span>
                            <span class="first-place__line3">Не смотри на них.<br>Верь в себя</span>
                        </div>
                    </div>
                </div>
            </div>
        
            <div id="msg_pop">
                <span class="msg_close" onclick="document.getElementById('msg_pop').style.display='none'; return false;"></span>
                На сайте DriveFitness используются cookie-файлы, данные об IP-адресе и местоположении с целью обеспечения работы сайта. Если, прочитав это сообщение, вы остаетесь на нашем сайте, это означает, что вы не возражаете против использования этих технологий.
            </div>
            
        </section>


        <section class="second-block section page" data-anchor="section2">
            <div class="second-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="second-content__done"><img src="img/done.png" alt=""></div>
                            
                            <div class="generator" <?/*=$_SESSION['resultKey'] ? 'data-result-key="'.$_SESSION['resultKey'].'"' : ''*/?> >
                                <div class="generator__place">
                                    <img src="img/logo2.svg" class="generator__img" alt="">
                                    <h3 class="generator__title">Я до сих пор не идеален, <br>потому что...</h3>
                                    <div class="generator__box" id="generator__box"></div>  
                                    <button class="generator__btn MuteOn">Найти причину</button>
                                </div>
                            </div>

                            <div class="second-content__social">
                                <span>А какие причины<br>у твоих друзей:</span>
                                <a class="vk" href="#"><img src="img/vk.png" alt=""></a>
                                <a class="fb" href="#"><img src="img/fb.png" alt=""></a>
                            </div>
                            <div class="canvas-layer" id='print-to'>
                                <canvas id="otkrytka" width="673px" height="378px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="third-block section page" data-anchor="section3">
            <div class="third-block__top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="third-block__top-line1">10 месяцев, чтобы достижения стали победой</span>
                            <div class="third-block__top-line2">Стань тем, кем хочешь быть</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="third-content__items">
                                <form id="query-form" action="query-form.php">
                                    <input type="hidden" value="" name="PROPERTY[CLUB]">

                                    <input type="hidden" value="" id="card_price" name="CARD_PRICE">

                                    <select class="place-select" name="PROPERTY[CLUB]">
                                        <option selected disabled>Выберите клуб</option>

                                        <?foreach ($arResult['ALL_CLUBS']['CLUB'] as $arValue){?>
                                            <option class="nms" value="<?=$arValue['VALUE']?>" data-id="<?=$arValue['VALUE_ID']?>" <?=$arValue['SELECTED'] ? $arValue['SELECTED'] : ''?> »><?=$arValue['NAME']?></option>
                                        <?}?>
                                    </select>
                                    <div class="place-select-parent"></div>
                                    <input type="hidden" value="-" name="PROPERTY[CARD]">
                                    <select class="tarif-select" name="PROPERTY[CARD]">
                                        <option disabled selected>Выберите карту</option>
                                        <?foreach ($arResult['ALL_CLUBS']['CARD'] as $arValue){?>
                                            <option class="nms" <?foreach ($arValue['PRICE'] as $i => $arPrice){?>
                                                        data-price_<?=$i?>="<?=$arPrice?>"
                                                    <?}?>
                                                    value="<?=$arValue['NAME']?>" <?=$arValue['SELECTED'] ? $arValue['SELECTED'] : ''?>»><?=$arValue['NAME']?></option>
                                        <?}?>
                                    </select>
                                    <div class="tarif-select-parent"></div>
                                    <div class="final-price"><span class="final-price__text">Итого:</span><span class="final-price__number">0</span><span class="red"> руб.</span></div>




                                    <input type="text" placeholder="Имя Фамилия" name="PROPERTY[FULL_NAME]" class="main-input" value="<?=$arResult['FORM_RESULT']['FULL_NAME'] ? $arResult['FORM_RESULT']['FULL_NAME'] : ''?>">
                                    <input type="phone" id="phone_input" name="PROPERTY[PHONE]" placeholder="Телефон" class="main-input" value="<?=$arResult['FORM_RESULT']['PHONE'] ? $arResult['FORM_RESULT']['PHONE'] : ''?>">
                                    <div class="form_message"></div>
                                    <div class="accord">
                                        <input type="checkbox" name="PROPERTY[POLITIC]" <?=$arResult['PROPERTIES']['POLITIC']['VALUE'];?> class="checkbox" id="checkbox"/>
                                        <label for="checkbox"><p align="justify">Нажимая на кнопку, я принимаю условия Акции, описанной на сайте drivefitness.ru, и даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»</p></label>
                                    </div>
                                    <input type="hidden" name="SUBMIT_FORM" value="Y">
                                    <input type="submit" class="book_button" value="Забронировать">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="fourth-block section page" data-anchor="section4">
            <div class="fourth-content">
               <div class="fourth-content__menu">
                   <select class="map-select">
                        <option value="Выберите город" disabled selected>Выберите город</option>
                       <option value="Екатеринбург">Екатеринбург</option>
                       <option value="Тюмень">Тюмень</option>
                   </select>
                   <div class="map-select-parent"></div>
                   <div class="fourth-content__list">
                       <ul class="geo-list" data-city="Екатеринбург">
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, Сибирский тракт, 8Н" data-yandex-x="56.823730" data-index="1" data-yandex-y="60.649765" data-name="клуб в тц «гагарин»">
                                    <span class="fourth-content__title">клуб в тц «гагарин»</span>
                                    <span class="fourth-content__address">Сибирский тракт, 8Н (доб. 1)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, Щербакова, 4" data-yandex-x="56.788549" data-index="1" data-yandex-y="60.649020" data-name="клуб в трк «глобус»">
                                    <span class="fourth-content__title">клуб в трк «глобус»</span>
                                    <span class="fourth-content__address">ул. Щербакова, 4 (доб. 2)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Ильича, 47" data-yandex-x="56.896027" data-index="1" data-yandex-y="60.605290" data-name="клуб в трц «победа»">
                                    <span class="fourth-content__title">клуб в трц «победа»</span>
                                    <span class="fourth-content__address">ул. Ильича, 47 (доб. 3)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Родонитовая, 4" data-yandex-x="56.792232" data-index="1" data-yandex-y="60.617615" data-name="Клуб на родонитовой">
                                    <span class="fourth-content__title">Клуб на родонитовой</span>
                                    <span class="fourth-content__address">ул. Родонитовая, 4 (доб. 4)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Айвазовского, 53" data-yandex-x="56.802238" data-index="1" data-yandex-y="60.598723" data-name="Клуб на айвазовского">
                                    <span class="fourth-content__title">Клуб на айвазовского</span>
                                    <span class="fourth-content__address">ул. Айвазовского, 53 (доб. 5)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Луначарского, 139" data-yandex-x="56.836697" data-index="1" data-yandex-y="60.622349" data-name="Клуб в тц «кортео»">
                                    <span class="fourth-content__title">Клуб в тц «кортео»</span>
                                    <span class="fourth-content__address">ул. Луначарского, 139 (доб. 6)</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Сулимова, 50" data-yandex-x="56.863483" data-index="1" data-yandex-y="60.630766" data-name="Клуб в трк «парк хаус»">
                                    <span class="fourth-content__title">Клуб в трк «парк хаус»</span>
                                    <span class="fourth-content__address">ул. Сулимова, 50 (доб. 7)</span>
                                </address>
                            </li>
                                                        <li>
                                <address class="geo-touch" data-street="Екатеринбург, ул. Машинистов, 1" data-yandex-x="56.852488" data-index="1" data-yandex-y="60.574406" data-name="Клуб в трк «парк хаус»">
                                    <span class="fourth-content__title">КЛУБ В ЖК «ОЛЬХОВСКИЙ ПАРК»</span>
                                    <span class="fourth-content__address">ул. Машинистов, 1</span>
                                </address>
                            </li>
                            <div class="fourth-content__phonebox">
                               <span class="fourth-content__phonetext">тел:</span>
                               <span class="fourth-content__phonenumber"><a href="tel:3021979" class="df-roistat-phone-city_33">+7 (343) 302-19-79</a></span>
                           </div>
                       </ul>
                       <ul class="geo-list hidden-list" data-city="Тюмень">
                            <li>
                                <address class="geo-touch" data-street="Тюмень, ул. Валерии Гнаровской, 12" data-yandex-x="57.123451" data-index="1" data-yandex-y="65.562804" data-name="КЛУБ В ТРЦ «ФАВОРИТ»">
                                    <span class="fourth-content__title">КЛУБ В ТРЦ «ФАВОРИТ»</span>
                                    <span class="fourth-content__address">ул. Валерии Гнаровской, 12</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="г. Тюмень, ул. Федюнинского, 67" data-yandex-x="57.102973" data-index="1" data-yandex-y="65.570368" data-name="КЛУБ В ТРЦ «ОСТРОВ»">
                                    <span class="fourth-content__title">КЛУБ В ТРЦ «ОСТРОВ»</span>
                                    <span class="fourth-content__address">ул. Федюнинского, 67</span>
                                </address>
                            </li>
                            <li>
                                <address class="geo-touch" data-street="г. Тюмень, ул. М. Горького, 70" data-yandex-x="57.148849" data-index="1" data-yandex-y="65.559867" data-name="КЛУБ В ТРЦ «ГУДВИН»">
                                    <span class="fourth-content__title">КЛУБ В ТРЦ «ГУДВИН»</span>
                                    <span class="fourth-content__address">ул. М. Горького, 70</span>
                                </address>
                            </li>
                            <div class="fourth-content__phonebox">
                               <span class="fourth-content__phonetext">тел:</span>
                               <span class="fourth-content__phonenumber"><a href="tel:2516690" class="df-roistat-phone-city_34">+7 (345) 251-66-90</a></span>
                           </div>
                       </ul>
                   </div>
               </div>
               <div class="fourth-content__map" id="map">
                   <div id="mobile-swipe"></div>
               </div>
            </div>
        </section>
        <section class="section fifth-block page" data-anchor="section5">
            <div class="fifth-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="fifth-block__text">
                                <div class="fifth-block__left"><span>Будь<br><span class="black"><span class="century">#</span>надрайве</span></span></div>
                                <div class="fifth-block__right"><span>с максимальной<br>выгодой</span></div>
                            </div>
                            <div class="fifth-block__bottom">
                                <a href="#section3" class="fifth-block__btn">Забронировать</a>
                                <div class="web-logo">
                                   <a href="https://website96.ru/" target="_blank">
                                    <img src="img/web-logo.png" alt="">
                                    <span>Разработка и продвижение сайтов</span>
                                </a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fifth-mobile">
                <div class="fifth-mobile__box">
                   <a href="#section3" class="fifth-mobile__btn">Забронировать</a> 
                </div>
                <div class="fifth-mobile__text">
                    <div class="fifth-mobile__left"><span>Будь<span class="black"><span class="century">#</span>надрайве</span></span></div>
                    <div class="fifth-mobile__right"><span>с максимальной выгодой</span></div>
                </div>
            </div>
        </section>

    </div>
    <div class="mobile-footer">
            <a href="#section2" class="book-link">Начать игру</a>
        </div>


    <?
        if ($_GET['i']) {
            $filename = $_SERVER['DOCUMENT_ROOT'].'uploads/' . $_GET['i'] . '.png';

            if (file_exists($filename)) {
                $img = '../uploads/'. $_GET['i'] . '.png';
                //var_dump($filename);
            } else {
                var_dump($filename);
                die();
            }
            
        } 
    ?>

    <!-- <div class="canvas-layer" id='print-to'>
        <canvas id="otkrytka" width="858px" height="378px"></canvas>
    </div> -->

    <img class="print-out-image" src="" width="858px" height="378px">



    <link rel="stylesheet" href="css/main.min.css">
    <script src="js/scripts.min.js"></script>
    <script>

    (function(w, d, s, h, id) {

        w.roistatProjectId = id; w.roistatHost = h;

        var p = d.location.protocol == "https:" ? "https://" : "http://";

        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";

        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);

    })(window, document, 'script', 'cloud.roistat.com', 'f1f50f523729691571e03b60d69bdea4');

    </script>

</body>
</html>

