<?php
require('database.php');
$query = 'SELECT * From bookCategories ORDER BY bookCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../Images/SB.png" />
  <link rel="stylesheet" href="../styles/style2.css" />
  <title>Create</title>
</head>

<body>
  <script src="../javascript/create.js"></script>
  <header>
    <div class="logo">
      <img src="../Images/SherpaLogo.png" alt="Logo" />
    </div>
    <nav>
      <ul>
        <li><a href="../Index.html">Home</a></li>
        <li><a href="../Pages/Create.php">Create</a></li>
        <li><a href="../Pages/About.html">About</a></li>
        <li><a href="../Pages/Contact.html">Contact</a></li>
        <li><a href="../Pages/Books.php">Books</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <form name="form" method="post" action="add_book.php">
      <fieldset>
        <legend>Create and add a new book to the store.</legend>
        <label for="category">Book Category/Genre: </label>
        <select name="category">
          <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category['bookCategoryID']; ?>">
            <?php echo $category['bookCategoryName']; ?>
          </option>
          <?php endforeach; ?>
        </select><br>
        <br />
        <hr />
        <label for="book_code">Book Code: </label>
        <input type="text" id="book_code" name="book_code" placeholder="XXXXXX" minlength="10" maxlength="10"
          required />
        <hr />
        <label for="book_name">Book Name: </label>
        <input type="text" id="book_name" name="book_name" placeholder="Book Name" minlength="3" maxlength="255"
          required />
        <hr />
        <label for="book_description">Book Description</label>
        <br />
        <textarea id="book_description" name="book_description" rows="3" cols="100" minlength="5"
          maxlength="255"></textarea>
        <br />
        <hr />
        <label for="book_price">Book Price: $</label>
        <input type="number" id="book_price" name="book_price" placeholder="0.00" min="0.01" step="0.01" value="0"
          pattern="^\d*(\.\d{0,2})?$" required />
        <br />
        <br />
        <input type="submit" />
        <input type="reset" />
      </fieldset>
    </form>
    <div class="TableContent">
      <h2>List of Books You May Like</h2>
      <table>
        <thead>
          <tr>
            <th>Book</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img class="BigImage" src="../Images/ByCoco'sTeamOnCanva.png" alt="ImageByCoco" />
            </td>
            <td>Coco's Team</td>
            <td>A3EE6U</td>
            <td>$9.99</td>
          </tr>
          <tr>
            <td>
              <img src="../Images/ByAshiyaPixelOnCanva.png" alt="ImageByCoco" />
            </td>
            <td>Ashiya Pixel</td>
            <td>LO3IYU</td>
            <td>$62.99</td>
          </tr>
          <tr>
            <td>
              <img src="../Images/ByHeyJaiStudioOnCanva.png" alt="ImageByCoco" />
            </td>
            <td>Hey Jai Studio</td>
            <td>27JUYH</td>
            <td>$29.99</td>
          </tr>
          <tr>
            <td>
              <img src="../Images/ByLittleLionDogsOnCanva.png" alt="ImageByCoco" />
            </td>
            <td>Little Lion Dogs</td>
            <td>HJEU32</td>
            <td>$15.99</td>
          </tr>
          <tr>
            <td>
              <img src="../Images/ByManinggaRunggaDesignOnCanva.png" alt="ImageByCoco" />
            </td>
            <td>Maningga Runggas</td>
            <td>33HFE2</td>
            <td>$8.99</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
  <footer>
    <hr />
    &copy; Copyright 2022 Bookstore of the Students!
    <br />
    <span>All images either created by me, or taken from Canva, while giving
      credits to the creator!</span>
    <br>
    Tsewang D Sherpa <br>
    IT202 - 001 <br>
    Nov 10, 2022 <br>
    Semester Phase 2<br>
  </footer>
</body>

</html>

<!-- 
INSERT INTO bookCategories VALUES
(1,'Fiction'),
(2,'Non Fiction'),
(3,'Drama'),
(4,'Poetry'),
(5,'Horror'),
(6,'History'),
(7,'Mathametics'),
(8,'Other'); -->
<!-- 
INSERT INTO books VALUES
-- bookID bookCategoryID bookCode bookName description price dateAdded
(1,1,'JDD9UKWAIN', "Fict's Cat", "A person named Fict has a Cat who goes blind, but is blinded by light!", 23.99,
'2015-11-01 3:23:44' ),
(2,2,'390TU2NDNQ', "All about Air", "Know the truth about Air that you breath, trust me, you will be surprised!", 5.99,
'2020-7-11 1:13:44' ),
(3,3,'VBNH1SRHJM',"LOOK at her EYES!", "Her Drama, her eyes, read it and it will consume you too!", 10.99, '2019-11-11
13:23:44' ); -->
<!-- -- customerID firstName lastName emailAddress streetAddress city state zipCode reference dateAdded
INSERT INTO customers VALUES
(1,"Tsewang", "Sherpa", "tds22@njit.edu" , "8 Newark Avenue" , "Jersey City" , "NJ" , 07305, "Google", '2019-11-11
13:23:44'),
(2,"Norsang", "Nyandak", "nt23@njit.edu" , "82 Newark Avenue" , "East Rutheford" , "NJ" , 07125, "Google", '2022-08-11
5:23:44'),
(3,"Ruffy", "Abreau", "ra28@njit.edu" , "82 Bayone Street" , "Hudson" , "NJ" , 07306, "Google", '2015-09-12
5:03:44'); -->