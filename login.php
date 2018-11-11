<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <?php if($_POST) include 'aksi.php'; ?>
                <form class="form-signin" action="?m=login" method="post">
                <input name="user" type="text" class="form-control" placeholder="Username" required autofocus>
                <input name="pass" type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    <span class="fa fa sign-in"></span> Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
