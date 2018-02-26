<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hey there!</h2>

        <div>
            <p>It looks like you wanted to reset your password. Click the link below to go to a page where you can choose a new password. Please be aware that this reset link expires in 12 hours.</p>

            <p><a href="{{ URL::to('resetpassword/' . $email . '/' . $reset_token) }}">Click here to reset your password.</a></p>

        </div>

    </body>
</html>