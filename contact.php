<?php htmlspecialchars(include 'src/inc/header.php'); ?>

<head>
    <title>Contact Me</title>
    <style> <?php htmlspecialchars(include 'css/contact.css') ?></style>
</head>

<main>
    <div class="application_main">
        <div class="form_container">
            <form action="./src/forms/contactMe.php" method="post"  class="form"> 
                <div class="inputs_container">
                    <h1 class="headline">Contact Me</h1>
                    <input type="text" name="name" class="form_input form_input_1" placeholder="Give your Name">
                    <br>
                    <input type="text" name="email" class="form_input form_input_2" placeholder="Email">
                    <br>
                    <input type="text" name="title" class="form_input form_input_3" placeholder="Enter your Title">
                    <br>
                    <textarea name="body" cols="60" rows="8" class="form_input form_input_4" placeholder="Message"></textarea>
                    <br>
                    <input type="submit" value="submit" class=" form_input submit_btn">
                <div>
            </form>
        </div>
    </div>
<main>

<?php htmlspecialchars(include 'src/inc/footer.php') ?>