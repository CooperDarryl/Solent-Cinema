<?php
session_start();
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link href="SC.css" rel="stylesheet" type="text/css">
        <title> Solent Cinemas </title>
    </head>

    <body>
        <header>
            <div class="logo">
                <img class="logo" alt="SClogo" src="Images/SolentCinemas.png" />
                <fieldset>
                    <legend>Login Here</legend>
                    <form class="log" method="post" action="login.php">
                        <input type="text" name="user" placeholder="Username" required/>
                        <input type="password" name="pass" placeholder="Password" required/>
                        <input type="submit" name="submit" value="Go!" />
                </fieldset>
                </form>
            </div>
        </header>
        <h1 class="filml">Please login to see our screenings and to book. </h1>
        <h2 class="cs">Coming soon to Solent Cinemas</h2>
        <iframe src="https://www.youtube.com/embed/eX_iASz1Si8" allowfullscreen></iframe>
        <footer>
            <p>Copyright© SolentCinemas 2016</p>
        </footer>
    </body>

    </html>
    <footer>
        <p>Copyright© SolentCinemas 2016</p>
    </footer>
    </body>

    </html>