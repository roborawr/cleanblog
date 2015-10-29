<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="{{config('app.url')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{config('app.url')}}/assets/css/login.css">
    
</head>
<body>
    <div class="container">
        <div class="card card-container">
             @if (count($errors) > 0)
                <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action="{{config('app.url')}}/auth/login" class="form-signin" method="post">
            {!! csrf_field() !!}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="email" value="{{old('email')}}"class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox" name="remember">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>