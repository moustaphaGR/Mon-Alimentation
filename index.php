<?php
// Connexion à la BDD
require_once("includes/config.php");
// User est connecté

// On stocke les informations du user dans une variable
$user = [
    "id" => 1,
    "name" => "Moufa",
    "age" => 420,
    "gender" => "Male",
    "height" => 187,
    "weight" => 80,
    "imc" => 22.9,
    "email" => "haduken@gmail.com",
    "isLogged" => true
];

if (!$user["isLogged"]) {
    header("location: login.php");
    exit;
}

$page = ["title" => "Track Calorie - Accueil"];
include_once("includes/header.php");

// Check if the form has been submitted
if (isset($_POST['inputRepas']) && isset($_POST['inputCalories'])) {
    // Get the form data
    $meal = $_POST['inputRepas'];
    $calories = $_POST['inputCalories'];

    // Set the default time zone to France
    date_default_timezone_set('Europe/Paris');

    // Get the current timestamp
    $timestamp = time();
    $dateTime = date('Y-m-d H:i:s', $timestamp);

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO meal (name, calorie, time, user_id) VALUES (:meal, :calories, :dateTime, :user_id)");

    // Bind the parameters
    $stmt->bindParam(':meal', $meal);
    $stmt->bindParam(':calories', $calories);
    $stmt->bindParam(':dateTime', $dateTime);
    $stmt->bindParam(':user_id', $user["id"]);

    // Execute the statement
    $stmt->execute();

    // Close the connection
    $conn = null;

    // Redirect the user to a confirmation page
    //header('location:confirmation.php');
    header('location:index.php');
    exit;
}

// Select the meal from the database
$stmt = $conn->prepare("SELECT name, calorie, date_format(time, '%H:%i') as hm FROM meal WHERE user_id = :id And date_format(time, '%Y-%m-%e') = CURDATE() ORDER BY time DESC");

$stmt->bindParam(':id', $user["id"]);
$stmt->execute();

// Fetch the meal
$meal = $stmt->fetchAll(PDO::FETCH_ASSOC);

//count calories
$totalCalories = 0;
foreach ($meal as $key => $value) {
    $totalCalories += $value['calorie'];
}

// Close the connection
$conn = null;
?>

<div class="containerApp">
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <div class="title">Track Calories</div>
                </div>

                <div class="col-auto">
                    <div class="profile">
                        <i class="bi bi-person"></i>
                        <?php
                        echo $user["name"];
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="dataUser">

            <div class="doughnut">
                <canvas id="myChart"></canvas>
                <div class="kcal"><?php echo $totalCalories ?></div>
            </div>

            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <?php
                        echo number_format($user['weight'] / pow(($user['height'] / 100), 2), 2);
                        ?>
                    </div>
                    <div class="col">
                        <?php
                        echo $user["weight"];
                        ?>
                        Kg
                    </div>
                </div>
            </div>

            <div class="custom-shape-divider-bottom-1671193354">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25" class="shape-fill"></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5" class="shape-fill"></path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <section class="date">
            <div class="text-center py-3">
                <?php
                // Set the locale to French
                $locale = 'en_FR';

                // Get the current date and time
                $date = new DateTime();

                // Create a formatter for the French short format
                $formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE);

                $formattedDate = $formatter->format($date);

                // Output the date
                echo $formattedDate;
                ?>

            </div>
        </section>

        <section class="list">

            <?php
            foreach ($meal as $key => $value) {
                include 'includes/meal-template.php';
            }
            ?>

        </section>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add your meal </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formMeal" method="POST">
                            <div class="mb-3"><input type="text" class="form-control" id="inputRepas" name="inputRepas"
                                    placeholder="Enter your meal"></div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="inputCalories" name="inputCalories"
                                    placeholder="Enter your meal's calories">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="formMeal" class="btn btn-primary">Add</button>

                    </div>
                </div>
            </div>
        </div>





    </main>

    <footer>
        <div class="text-center">
            <!-- The trigger button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Add a Meal
            </button>

    </footer>
</div>

<?php
include_once("includes/footer.php");
?>