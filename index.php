<?php

include_once "model.php";

$questionList = model::getQuestions();
$resultList = model::getResult();
//echo '<pre>';
//print_r($resultList);

?>

<form method="post">
    <?php foreach ($questionList as $Item): ?>

        <p><?php echo $Item['Qestion'];?></p>
        <div>
            <?php for ($i=1;$i<=4; $i++){?>
            <input type="radio" name="Qestion<?php echo $Item['id']; ?>" value="Answer<?php echo $i; ?>"> <?php echo $Item['Answer'.$i] ?>
            <?php } ?>
        </div>
    <?php endforeach; ?>

    <div>
        <br>
        <input type=submit name=btn value="Отправить"><br>
    </div>
    </form>
<?php
//echo '<pre>';
//print_r(($_POST));
//?>
<?php if(isset($_POST['btn'])) { ?>
<?php foreach ($questionList as $Item):
$resultList [$Item['id']-1][$_POST['Qestion'.$Item['id']]]++;


 endforeach;
 echo '<hr>';
 model::updateResult($resultList);}?>



<?php
//echo '<pre>';print_r($resultList);


// if (!empty($resultListView)) {model::insertResult();} else model::updateResult(); ?>


