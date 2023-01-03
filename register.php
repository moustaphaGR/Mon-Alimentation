<?php
require_once('includes/config.php');

$page = ["title" => "Track Calorie - Register"];
include_once("includes/header.php");



$conn = null;
?>

<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Register Page</h1>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="mb-3">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            placeholder="Enter First Name">
                    </div>
                    <div class="mb-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your Age">
                    </div>
                    <label for="gender">
                        Gender<select class="form-select" aria-label="Default select example" name="gender">
                            <option selected>Select your gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </label>
                    <div class="mb-3">
                        <label for="height" class="form-label mt-2">Height</label>
                        <input type="range" class="form-range" min="120" max="230" step="1"
                            oninput="sliderChangeHeight(this.value)" id="height" name="height">
                        <output id="output">187</output>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label mt-2">Weight</label>
                        <input type="range" class="form-range" min="40" max="250" step="0.1"
                            oninput="sliderChangeWeight(this.value)" id="weight" name="weight">
                        <output id="outputWeight">80</output>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="login.php">Signin?</a>
            </div>
        </div>
    </div>
</main>

<footer>

</footer>


<?php
include_once("includes/footer.php");
?>