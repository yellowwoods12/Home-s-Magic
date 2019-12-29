<div id="reviewModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reviewModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Write a review</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body">
        <form id="ReviewForm" method="POST">
          <div class="form-group">
            <label for="review-title">Title:</label>
            <input type="text" class="form-control" id="review-title" placeholder="Title">
          </div>
          
          <div class="form-group">
            <label for="rating">Rating:</label>
            <span id="rating">
              <?php
                  for ($i = 1; $i <= 5; $i++)
                      echo "<i class='far fa-star stars'></i>";
              ?>
            </span>
          </div>

          <div class="form-group">
            <label for="review-desc">Description:</label>
            <textarea class="form-control" id="review-desc" rows="10" cols="20" placeholder="Description"></textarea> 
          </div>

          <div id="review-status"></div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="submit_review(<?php echo $_GET['rest_id_url'];?>)">
          Submit Review
        </button>
      </div>
    </div>
  </div>
</div>
