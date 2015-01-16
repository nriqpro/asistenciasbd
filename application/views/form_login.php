    <div class="container col-md-offset-5" style="padding-right: 15px;
                                    padding-left: 15px;
                                    margin-right: auto;
                                    margin-left: auto; width: 25%">

      <form class="form-signin">
        <h2 class="form-signin-heading">Iniciar sesion:</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <form action="<?php echo base_url();?>index.php/login/login_form" method="post" name="login">
            <input type="text" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="pass" class="form-control" placeholder="Password" required="">

              <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
        </form>
      </form>

    </div> <!-- /container -->
