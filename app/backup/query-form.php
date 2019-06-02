<?

include_once "parameters.php"; 

$arResult['FILEDS_NAME'] = array(
        'CLUB' => 'Клуб: ',
        'CARD' => 'Карта: ',
        'FULL_NAME' => 'Имя, Фамилия: ',
        'PHONE' => 'Телефон: ',
        'POLITIC' => 'Потвеждение согласия: '
);
$arResult['MAIL_NAME'] = 'Заявка с сайта';
/*$arResult['MAIL_TO'] = 'a.kuznetsova@drivefitness.ru';*/
$arResult['MAIL_TO'] = array();
$arResult['MAIL_MAIN'] = 'a.kuznetsova@drivefitness.ru';

$arResult['MESS_SUCCESS'] = 'Спасибо за заявку! Менеджер Drive Fitness свяжется с вами в ближайшее время.';
$arResult['MESS_ERROR'] = 'Ошибка отправки';

$arResult['ERROR'] = array(
    'CLUB' => 'Выберите клуб',
    'CARD' => 'Выберите карту',
    'FULL_NAME' => 'Укажите имя',
    'PHONE' => 'Укажите телефон',
    'POLITIC' => 'Потвердите согласие на обработку персональных данных'
);
$arResult['CLUB'] = array();

$json = array();

if($_POST['SUBMIT_FORM'] == 'Y'){
    $arResult['FORM_RESULT'] = $_POST['PROPERTY'];
    $arError = 'N';
    foreach ($arResult['FORM_RESULT'] as $propCODE => $arProperty) {
        if(empty($arProperty) || $arProperty == '-') {
            $arError = 'Y'; 
            $arResult['MESSAGE'] = $arResult['ERROR'][$propCODE];
            $json['error'] = $arProperty;
            break;
        } else {
            $arResult['PROPERTIES'][$propCODE] = array('VALUE'=>$arProperty);
        }
    }
    if(!isset($arResult['FORM_RESULT']['POLITIC'])){
        $arResult['MESSAGE'] = $arResult['ERROR']['POLITIC'];
        $arError = 'Y'; 
    }
    if($arError == 'N'){
        
        $arResult['MAIL_CONTENT'] = '<html><head><title>'.$arResult['MAIL_NAME'].'</title></head><body>';

        foreach ($arResult['PROPERTIES'] as $propCODE => $prop_value) {
            /*
            if ($propCODE == 'CLUB') {
                foreach ($arResult['CLUB'] as $key => $club) {
                    if ($prop_value['VALUE'] == $club['VALUE']) {
                       // $prop_value['VALUE'] = $club['NAME'];
                        $arResult['MAIL_TO'] = $club['EMAIL'];
                        break;
                    }
                   
                }
            }
            //var_dump($arResult);*/

            if($propCODE == 'CLUB') {
                
                $arResult['MAIL_TO'] = $arResult['ALL_CLUBS']['CLUB'][$prop_value['VALUE']]['EMAIL'];
                $prop_value['VALUE'] = $arResult['ALL_CLUBS']['CLUB'][$prop_value['VALUE']]['NAME'];
            }

            if ($propCODE == 'POLITIC') continue;
            $arResult['MAIL_CONTENT'] .= $arResult['FILEDS_NAME'][$propCODE] . $prop_value['VALUE'] .'<br>';
            
        }
        $arResult['MAIL_CONTENT'] .= '</body></html>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        
        if(mail($arResult['MAIL_MAIN'], $arResult['MAIL_NAME'], $arResult['MAIL_CONTENT'], $headers)){
            if(isset($arResult['MAIL_TO'][0])){
                 mail($arResult['MAIL_TO'], $arResult['MAIL_NAME'], $arResult['MAIL_CONTENT'], $headers);
             };

             if ($_POST["roistat_visit"] && count($_POST["roistat_visit"]) > 0){
                $roistat = $_POST["roistat_visit"];
            }
            else {
                $roistat = null;
            }

            $arResult["ROISTAT_DATA"] = array(
                'roistat'=> array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : null,
                'key'=>'NjgzNDM6NTY3MDE6ZTk4MjViNmU1ZGRiOWU2YTYyNDM2NjRjZTkwMTZiYjY=',
                'title'=>'ФОС Лендинг',
                'name'=>$arResult['FORM_RESULT']['FULL_NAME'],
                'phone'=>$arResult['FORM_RESULT']['PHONE'],
                'fields'=>array(
                    "club_id"=>$arResult['CLUB'][$arResult['FORM_RESULT']['CLUB']]['ROISTAT_ID'],
                    "club_name"=>$arResult['CLUB'][$arResult['FORM_RESULT']['CLUB']]['NAME'],
                    "card"=> $arResult['FORM_RESULT']['CLUB'] == 99 ? '217' : '225',
                    "card_name"=> $arResult['FORM_RESULT']['CLUB'] == 99 ? 'Дневная' : 'Комфорт',
                    "paymentType"=>'бронирование карты',
                    "reserve"=>'Комфорт',
                    "source_rekl"=>$_SERVER['HTTP_REFERER'],
                    "client_id"=>array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : null,
                    "sum"=>$_POST['CARD_PRICE'],
                    "durn"=>'10',
                    "source"=> '{source}',
                ),
            );

            $arResult['ROISTAT_RESULT'] = file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?".http_build_query($arResult["ROISTAT_DATA"]));

            if($arResult['ROISTAT_RESULT']) {
                $arResult['MESSAGE'] = $arResult['MESS_SUCCESS'];
                $json['success'] = $arResult['MESS_SUCCESS'];
            }
            
        } else {
            $arResult['MESSAGE'] = $arResult['MESS_ERROR'];
            $json['error'] = $arResult['MESSAGE'];
        }
    } else {
        $json['error'] = $arResult['MESSAGE'];
    }
    echo json_encode($json);
}
?>