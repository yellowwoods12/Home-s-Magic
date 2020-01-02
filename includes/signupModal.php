<div id="signupModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sign Up</h3>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="signupForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter last Name">
          </div>

          <div class="form-group">
            <label for="mail">Email-id:</label>
            <input type="email" class="form-control" id="mail" placeholder="Enter Email Id">
          </div>

          <div class="form-group">
            <label for="phone">Phone number:</label>
            <input type="number" class="form-control" id="phone" placeholder="Phone Number">
          </div>

          <div class="form-group">
            <label for="Address">Address:</label>
            <textarea name="address" id="address" class="form-control" cols="25" rows="5" placeholder="Enter your address"></textarea>
          </div>

          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter Password">
          </div>

          <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" id="cpwd" placeholder="Enter Password Again">
          </div>

          <div id="status"></div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="register_details()">
            SIGN UP
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
