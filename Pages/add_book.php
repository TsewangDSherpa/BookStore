<?php
$category_id = filter_input(INPUT_POST, "category", FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'book_code');
$name = filter_input(INPUT_POST, 'book_name');
$description = filter_input(INPUT_POST, 'book_description');
$price = filter_input(INPUT_POST, 'book_price', FILTER_VALIDATE_FLOAT);



// echo $category_id . " " . $code . " " . $name . " " . $description . " " . $price;
if ($category_id == null || $category_id == false || $code == null || $code == false || $name == null || $name == false || $description == null || $description == false || $price == null || $price == false) {
    include("Create.php");
    exit();
} else {
    require_once('database.php');
    // INSERT INTO books 
    //     (bookCategoryID, bookCode, bookName, description, price ,dateAdded)
    //     VALUES (7, "123LYUZB3U", "CalcSi", "Learn about the Science" ,12.99, NOW());
    // add the product to the database;
    $query = 'INSERT INTO books 
        (bookCategoryID, bookCode, bookName, description, price ,dateAdded)
        VALUES (:category_id, :code, :name, :description ,:price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->bindValue(":code", $code);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":description", $description);
    $statement->bindValue(":price", $price);
    $statement->execute();
    $statement->closeCursor();
    echo " done ";
    header("Location: Books.php?bookCategoryID=" . $category_id);

}


?>