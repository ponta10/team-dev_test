<?php
const DB_HOST = 'mysql:dbname=team;host=localhost:8889;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

try{
  $pdo = new PDO(DB_HOST ,DB_USER,DB_PASSWORD,[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//連想配列
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外
    PDO::ATTR_EMULATE_PREPARES => false,//SQLインジェクション対策
  ]);
  // echo '接続成功';
}catch(PDOException $e){
  echo '接続失敗' ,$e->getMessage() . "\n";
  exit();
}


// $stmt_shuffle = $pdo->prepare('select publisher_five from agent where agent_name=:name ');
// $stmt_shuffle->bindValue('name',$cnt["agent_name"],PDO::PARAM_STR);
// $stmt_shuffle->execute();
// $shuffles = $stmt_shuffle->fetchAll();

?>

<?php
if (!isset($_GET['narrow'])) :
  if (!isset($_GET['search'])) :
    // require(dirname(__FILE__) . "/dbconnect.php");
    $shuffle = isset($_GET['shuffle']) ? $_GET['shuffle'] : 'agent_name';
// $shuffle = 'agent_name';
$cnt_stmt = $pdo->prepare("select * from agent order by $shuffle desc");
$cnt_stmt->execute();
$cnts = $cnt_stmt->fetchAll();
    else :
      $search = $_GET['search'];
      $cnt_stmt = $pdo->prepare("select * from agent where agent_name like '$search'");
      $cnt_stmt->execute();
      $cnts = $cnt_stmt->fetchAll();
    endif;
  else :
        // ini_set('display_errors', 1);
        $narrows = $_GET['narrow'];
        $shuffle = isset($_GET['shuffle']) ? $_GET['shuffle'] : 'agent_name';
        foreach ($narrows as $narrow) :
          $cnt_stmt = $pdo->prepare("select * from agent_tag join agent on agent.id = agent_tag.agent_id right join tag on tag.id = agent_tag.tag_id where tag_name=:name order by $shuffle desc");
          $cnt_stmt->bindValue('name', $narrow, PDO::PARAM_STR);
          $cnt_stmt->execute();
          $cnts = $cnt_stmt->fetchAll();
          // var_dump($cnts) . '<br>';
        endforeach;
      endif;
?>