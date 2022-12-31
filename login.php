<?php
    $page=["title" => "Track Calorie - Login"];
    include_once("includes/header.php");
?>

<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Login Page</h1>
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

                <a href="register.php">register?</a>
            </div>
        </div>
    </div>

</main>

<footer>

</footer>


<?php
    include_once("includes/footer.php");
?>