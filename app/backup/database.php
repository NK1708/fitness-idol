<?
$dsn = 'mysql:host=localhost;dbname=u33804_invite';
/*$username = 'u33804';
$password = 'kjzppws3zq';*/
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$pdo = new PDO($dsn, $username, $password, $options);

if($_POST['club']!=''){
    $club = trim($_POST['club']);
    $type = trim($_POST['type']);
    $url = trim($_POST['url']);

    //echo $club." ". $type ." " . $url;
    

    $stmt = $pdo->prepare("INSERT INTO clubs_stats SET
        club = :club,
        type = :type,
        url = :url,
        date = NOW()
        ON DUPLICATE KEY UPDATE
        type = :type,
        url = :url,
        date = NOW()
    ");
    $stmt->execute(array('club' => $club,
                        'url' => $url,
                        'type' => $type
                            ));
    
    die();
}

if($_GET['report']=='all') {
    $datas = $pdo->query('SELECT club, count(1) as `count` FROM clubs_stats GROUP BY club')->fetchAll();

    foreach($datas as $data) {
        echo $data['club'].'  ---  '.$data['count'].'<br>';
    }
}
?>