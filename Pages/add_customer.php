<!-- Tsewang D Sherpa
IT202 - 001 
Nov 26, 2022
Phase 3 -->


<?php
$firstName = filter_input(INPUT_POST, "first_name");
$lastName = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$street = filter_input(INPUT_POST, 'Address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zipCode = filter_input(INPUT_POST, 'zipcode');
$reference = filter_input(INPUT_POST, 'hear');


$validStates = array(
    "AK",
    "AL",
    "AR",
    "AS",
    "AZ",
    "CA",
    "CO",
    "CT",
    "DC",
    "DE",
    "FL",
    "GA",
    "GU",
    "HI",
    "IA",
    "ID",
    "IL",
    "IN",
    "KS",
    "KY",
    "LA",
    "MA",
    "MD",
    "ME",
    "MI",
    "MN",
    "MO",
    "MS",
    "MT",
    "NC",
    "ND",
    "NE",
    "NH",
    "NJ",
    "NM",
    "NV",
    "NY",
    "OH",
    "OK",
    "OR",
    "PA",
    "PR",
    "RI",
    "SC",
    "SD",
    "TN",
    "TX",
    "UT",
    "VA",
    "VI",
    "VT",
    "WA",
    "WI",
    "WV",
    "WY"
);

if (!in_array($state, $validStates))
    $error_message = $state . " is not a valid State!";

if (
    $firstName == null || $firstName == false || $lastName == null || $lastName == null || $email == null || $email == false ||
    $street == null || $street == false || $city == null || $city == null || $state == null || $state == false ||
    $zipCode == null || $zipCode == false || $reference == null || $reference == null
) {
    $error = 'Invalid Field data. Check Fields.';
}

if ($error_message != '') {
    include('JoinMailing.php');
    exit();
}



require_once('database.php');

$query = 'INSERT INTO customers 
        (firstName, lastName, emailAddress, streetAddress, city ,state, zipCode, reference ,dateAdded)
        VALUES (:firstName, :lastName, :emailAddress, :streetAddress ,:city, :state, :zipCode, :reference,  NOW())';
$statement = $db->prepare($query);
$statement->bindValue(":firstName", $firstName);
$statement->bindValue(":lastName", $lastName);
$statement->bindValue(":emailAddress", $email);
$statement->bindValue(":streetAddress", $street);
$statement->bindValue(":city", $city);
$statement->bindValue(":state", $state);
$statement->bindValue(":zipCode", $zipCode);
$statement->bindValue(":reference", $reference);

$statement->execute();
$statement->closeCursor();
?>

<html>

<script>
    alert("Successfully Added " + <?php echo '"' .$firstName. '"' ?> + " to the Database!");
    window.location.href = "Books.php";

</script>


</html>