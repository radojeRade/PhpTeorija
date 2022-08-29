<header>
    <div class="header-content">
        <button id="login-button" class="btn btn-primary">Login</button>
        <button id="register-button" class="btn btn-primary">Register</button>
    </div>
    <hr>
</header>

<script type="text/javascript">
    document.getElementById("login-button").onclick = function() {
        location.href = "login.php";
    };
    document.getElementById("register-button").onclick = function() {
        location.href = "register.php";
    };
</script>