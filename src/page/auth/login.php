<?php 

$name = getenv('WEBSITE_NAME');

?>

<style>
     body{overflow-y:hidden;}
</style>

<dib class="register">
     <main class="form-signin">
     <form>
     <h1 class="h3 mb-3 fw-normal"><b>LOGIN</b></h1>

     <div class="form-floating">
          <input type="email" class="form-control" id="floatingPassword" placeholder="email" required>
          <label for="floatingPassword">email</label>
     </div>
     <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="password" required>
          <label for="floatingPassword">password</label>
     </div>
     <!--
     <div class="checkbox mb-3">
          <label>
          <input type="checkbox" value="remember-me"> Remember me
          </label>
     </div>
     -->
     <br>
     <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <p class="mt-5 mb-3 text-muted" style="width:100%; text-align:center;">&copy; 2023 Tüm Hakları Saklıdır. <?php echo $name?> Inc.</p>
     </form>
     </main>
</dib>
<div class="fill"></div>