<?php
    $page=["title" => "Track Calorie - Register"];
    include_once("includes/header.php");
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
                <form>
                    <div class="mb-3">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                    </div>
                    <div class="mb-3">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                    </div>
                    <laber for="gender">
                        Gender<select class="form-select" aria-label="Default select example">
                            <option selected>Select your gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </laber>
                    <div class="mb-3">
                        <label for="height" class="form-label mt-2">Height</label>
                        <input type="range" class="form-range" min="120" max="230" step="1"
                            oninput="sliderChangeHeight(this.value)" id="height">
                        <output id="output">187</output>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label mt-2">Weight</label>
                        <input type="range" class="form-range" min="40" max="250" step="0.1"
                            oninput="sliderChangeWeight(this.value)" id="weight">
                        <output id="outputWeight">80</output>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="login.php">login?</a>
            </div>
        </div>
    </div>
</main>

<footer>

</footer>


<?php
    include_once("includes/footer.php");
?>