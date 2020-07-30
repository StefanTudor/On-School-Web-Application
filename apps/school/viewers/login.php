<!DOCTYPE html>
<html lang="ro">

<head>

    <title> Login </title>
    <?php include("_parts/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/modals.css">

</head>

<body class="body-login">
    <h1 class="text-light text-center w-100 pad-2 pad-bot-5 text-uppercase">
        <?php echo $_SESSION["scoala"] ?>
    </h1>
    <div class="full-screen-container horizontal-centered">
        <div class="h-100">
            <div class="user_card">
                <div class="horizontal-centered">
                    <div class="brand_logo_container">
                        <img src="<?php echo BASE_URL; ?>/assets/img/user.png" class="brand_logo" alt="User">
                    </div>
                </div>
                <div class="pad-2 form_container">

                    <form id="form-login" action="<?php echo BASE_URL; ?>/" method="post">

                        <?php if (count($errors) > 0) : ?>
                            <div class="alert alert-danger" data-aos="fade-right">
                                <?php foreach ($errors as $error) : ?>
                                    <?php echo $error; ?>  
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="field-email" class="form-control" id="field-email" placeholder="E-mail" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="field-pass" class="form-control" id="field-pass" placeholder="Parolă" required>
                        </div>

                        <div class="form-group pad-bot-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Salvează datele</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button id="btn-login" name="btn-login" type="submit" class="btn login_btn">
                                Trimite
                            </button>
                        </div>

                    </form>
                </div>

                <div class="mt-4">
                    <div class="links text-center">
                        <a href="#">Ai uitat parola?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("_parts/modals.php"); ?>
    <?php include("_parts/footer.php"); ?>

    <script>
        AOS.init({
            duration: 800
        });
    </script>

</body>