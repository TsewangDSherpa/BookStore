<!-- Tsewang D Sherpa
IT202 - 001 
Nov 26, 2022
Phase 3 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Join MailList</title>
    <script type="text/javascript" language="javascript" src="../javascript/form.js"></script>
    <link rel="stylesheet" href="../styles/joinMail.css">
</head>

<body class="form-body">

    <div class="form-box">
        <h1>Join our Mailing List</h1>
        <hr>
        <form method="post" action="add_customer.php" id="mailList">


            <div>
                <label for="first_name">First Name: </label>
                <input type="text" name="first_name" id="First Name" placeholder="First Name" maxlength="255"
                    minlength="1" />

                <div>
                    <label for="last_name">Last Name: </label>
                    <input type="text" name="last_name" id="Last Name" placeholder="Last Name" maxlength="255"
                        minlength="1" required />
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="Email" maxlength="255" size="30" />
                </div>
                <div>
                    <label for="Address">Address: </label>
                    <input type="text" name="Address" id="Address" maxlength="255" minlength="2" size="30" />
                </div>
                <div>
                    <label for="city">City: </label>
                    <input type="text" name="city" id="City" maxlength="255" minlength="2" />
                </div>
                <div>
                    <label for="state">State: </label>
                    <input type="text" name="state" id="State" pattern="[A-Z]{2}" title="2 letter State" />
                    <!-- <div id="stateError" class="hidden">
                    </div> -->
                </div>
                <div>
                    <label for="zipcode">Zip Code: </label>
                    <input type="number" name="zipcode" id="Zipcode" />
                    <!-- <div id="zipcodeError" class="hidden">

                    </div> -->
                </div>
                <div>
                    <label for="hear">How did you hear about us?:</label>
                    <select name="hear" id="hear">
                        <option value="Google">Google Search</option>
                        <option value="Friend">Friend</option>
                        <option value="College">College</option>
                        <option value="Highschool">Highschool</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <button type="submit">Submit</button>
        </form>

    </div>
    <div id="Errors">
        <div id="stateError" class="hidden">
        </div>
        <div id="zipcodeError" class="hidden">
        </div>
        <div id="errors" class="hidden">
        </div>
        <div id="errorsFromPhp" class="visible">
            <?php
            echo $error_message;
            ?>
        </div>



    </div>

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