<div id="orderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="orderModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Order</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <form action="" method="GET">
        <div class="modal-body">
          <?php getOrder(); ?>
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            CHECKOUT
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
