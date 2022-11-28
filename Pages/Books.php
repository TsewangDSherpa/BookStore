<!-- Tsewang D Sherpa
IT202 - 001 
Nov 26, 2022
Phase 3 -->
<?php
require_once('database.php');
$category_id = filter_input(INPUT_GET, 'bookCategoryID', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}



$queryCategory = 'SELECT * FROM bookCategories
                    WHERE bookCategoryID = :category_id';


$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['bookCategoryName'];
$statement1->closeCursor();

$queryAllCategories = 'SELECT * FROM bookCategories
                        ORDER by bookCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();


$statement2->closeCursor();

$queryProducts = 'SELECT * FROM books 
                    WHERE bookCategoryID = :category_id
                    ORDER BY bookID';


$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(":category_id", $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="../styles/style5.css">
</head>

<body>
    <main>
        <h1>Book List</h1>
        <aside>

            <nav>
                <ul>
                    <?php
                    foreach ($categories as $category): ?>
                    <li>
                        <a href="?bookCategoryID=<?php echo $category['bookCategoryID']; ?>">
                            <?php echo $category['bookCategoryName']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

        </aside>


        <div class="TableContent">
            <h2>
                <?php echo $category_name; ?>
            </h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($products as $product): ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $product['bookCode']; ?>
                        </td>
                        <td>
                            <?php echo $product['bookName']; ?>
                        </td>
                        <td>
                            <?php echo $product['description']; ?>
                        </td>
                        <td>

                            <?php echo "$" . $product['price']; ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>

        <form action="Home.html" style="margin:25px;">
            <input type="Submit" value="Go Back" />
        </form>

    </main>
    <footer>
        <hr />
        <hr>
        &copy; Copyright 2022 Bookstore of the Students!
        <br />
        <span>
            All images either created by me, or taken from Canva, while giving
            credits to the creator!</span> <br>
        Tsewang D Sherpa <br>
        IT202 - 001 <br>
        Nov 08, 2022 <br>
        Semester Phase 2 <br>
    </footer>
</body>

</html>