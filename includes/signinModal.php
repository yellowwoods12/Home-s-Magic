<div id="signinModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="signinModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sign In</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <form id="LoginForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="login_email">Email address:</label>
            <input type="email" class="form-control" id="login_email" placeholder="Email">
          </div>
          
          <div class="form-group">
            <label for="login_pwd">Password:</label>
            <input type="password" class="form-control" id="login_pwd" placeholder="Password">
          </div>
         
          <div id="loginStatus"></div>
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="login()">
            LOG IN
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
