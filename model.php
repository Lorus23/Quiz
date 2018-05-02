<?php
/**
 * Created by PhpStorm.
 * User: Sayat
 * Date: 002 02.04.18
 * Time: 9:50
 */
include_once "Db.php";

class model
{
    public static function getQuestions()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM quiz_questions';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);


        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();


        // Получение и возврат результатов
        $i = 0;
        $questionList = array();
        while ($row = $result->fetch()) {
            $questionList[$i]['id'] = $row['id'];
            $questionList[$i]['Qestion'] = $row['Qestion'];
            $questionList[$i]['Answer1'] = $row['Answer1'];
            $questionList[$i]['Answer2'] = $row['Answer2'];
            $questionList[$i]['Answer3'] = $row['Answer3'];
            $questionList[$i]['Answer4'] = $row['Answer4'];
            $i++;
        }
        return $questionList;

    }

    public static function getResult()
    {
        // Соединение с БД
        $db = Db::getConnection();


        // Текст запроса к БД
        $sql = 'SELECT * FROM quiz_result';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);


        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();


        // Получение и возврат результатов
        $i = 0;
        $resultList = array();
        while ($row = $result->fetch()) {
            $resultList[$i]['id'] = $row['id'];
            $resultList[$i]['Qestion'] = $row['Qestion'];
            $resultList[$i]['Answer1'] = $row['Answer1'];
            $resultList[$i]['Answer2'] = $row['Answer2'];
            $resultList[$i]['Answer3'] = $row['Answer3'];
            $resultList[$i]['Answer4'] = $row['Answer4'];
            $i++;
        }
        return $resultList;
    }

    public static function updateResult($resultList)
    {
        $resultList2 = $resultList;
        echo '<pre>';
        print_r($resultList2);
//
//        // Соединение с БД
        $db = Db::getConnection();
//
        foreach ($resultList2 as $key => $testimonials) {
            $Qestion = $testimonials['Qestion'];
            $Answer1 = $testimonials['Answer1'];
            $Answer2 = $testimonials['Answer2'];
            $Answer3 = $testimonials['Answer3'];
            $Answer4 = $testimonials['Answer4'];
            $id = intval($testimonials['id']);
             //  Текст запроса к БД
            $sql = "UPDATE quiz_result SET Qestion=:Qestion, Answer1=:Answer1, Answer2=:Answer2, Answer3=:Answer3, Answer4=:Answer4 WHERE id=:id";
//
//            //Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':Qestion', $Qestion, PDO::PARAM_STR);
            $result->bindParam(':Answer1', $Answer1, PDO::PARAM_INT);
            $result->bindParam(':Answer2', $Answer2, PDO::PARAM_INT);
            $result->bindParam(':Answer3', $Answer3, PDO::PARAM_INT);
            $result->bindParam(':Answer4', $Answer4, PDO::PARAM_INT);
            $result->execute();
        }



//        echo '<pre>';
//        print_r($resultList2);
    }
}