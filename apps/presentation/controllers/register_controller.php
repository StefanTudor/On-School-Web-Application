<?php

include FOLDER_APP_MODELS . "/model.php";

$errors = [];
$name = "";
$email = "";
$phone = "";
$namespace = "";

$show_modal = false;

// extragere judete din db
$judete = getListaJudete();


if (isset($_POST['btn-register'])) {
    $name = $_POST['field-nume'];
    $email = $_POST['field-email'];
    $phone = $_POST['field-tel'];
    $passRegister = $_POST['field-pass'];
    $passwordConfirmed = $_POST['field-pass2'];
    $namespace = $_POST['field-namespace'];
    $id_scoala = $_POST['field-id'];

    // validation
    if (empty($name)) {
        $errors['name'] = 'Introdu un nume.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'E-mail invalid.';
    }

    if (empty($email)) {
        $errors['email'] = 'Introdu aresa de e-mail.';
    }

    if (empty($passRegister)) {
        $errors['password'] = 'Introdu parola.';
    }

    if ($passRegister !== $passwordConfirmed) {
        $errors['password'] = 'Cele două parole nu corespund.';
    }

    if (empty($namespace)) {
        $errors['namespace'] = 'Introdu namespacel.';
    }

    $emailQuery = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = 'Acest e-mail este deja folosit.';
    }

    $namespaceQuery = "SELECT * FROM scoala WHERE namespace=? LIMIT 1";
    $stmt = $conn->prepare($namespaceQuery);
    $stmt->bind_param('s', $namespace);
    $stmt->execute();
    $result = $stmt->get_result();
    $namespaceCount = $result->num_rows;
    $stmt->close();

    if ($namespaceCount > 0) {
        $errors['namespace'] = 'Acest namespace este deja folosit.';
    }

    if (count($errors) === 0) {
        // criptare parolă
        $passRegister = password_hash($passRegister, PASSWORD_DEFAULT);
        // inserare utilizator
        $insert = " INSERT INTO `user` (nume, email, telefon, parola, tip_cont, id_scoala) 
            VALUES (?, ?, ?, ?, ?, ?) ";
        // setare namespace scoala
        $update = " UPDATE `scoala` SET namespace=? WHERE id_scoala=? ";
        $stmt1 = $conn->prepare($insert);
        $stmt2 = $conn->prepare($update);
        $tip_cont = ADMINISTRATOR;

        //var_dump($name, $email, $phone, $passRegister, $tip_cont, $id_scoala, $namespace, $id_scoala); die();

        $stmt1->bind_param('ssssii', $name, $email, $phone, $passRegister, $tip_cont, $id_scoala);
        $stmt2->bind_param('si', $namespace, $id_scoala);

        if ($stmt1->execute() && $stmt2->execute()) {
            // golire câmpuri
            $show_modal = true;
            $name = '';
            $email = '';
            $phone = '';
            $namespace = '';
        } else {
            $errors['db_error'] = 'Eroare baza de date: înregistrare eșuată!';
        };
        $stmt1->close();
        $stmt2->close();
    }
}
