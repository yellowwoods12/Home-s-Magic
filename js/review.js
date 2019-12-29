var rating = 0;

// review ratng events
$('.stars').mouseenter(event => {
    if (rating == 0)
        fillStars($(event.target).index());
});

$('.stars').mouseleave(event => {
    if (rating == 0)
        fillStars(-1);
});

$('.stars').click( event => {
    var index = $(event.target).index();

    fillStars(index);
    rating = Number(index) + 1;
});

// utility function to fill in solid stars
function fillStars(index) {
    for (i = 0; i <= index; i++) {
        $('.stars:eq(' + i + ')').addClass('fas');
        $('.stars:eq(' + i + ')').removeClass('far');
    }

    for (i = index + 1; i < 5; i++) {
        $('.stars:eq(' + i + ')').addClass('far');
        $('.stars:eq(' + i + ')').removeClass('fas');
    }
}



function submit_review(rest_id)
 {
    var title = $('#review-title').val();
    var descr = $('#review-desc').val();
    var restaurant_id = rest_id;

  if(title=="")
  {
    $("#review-status").html('<p class="alert alert-warning" role="alert"><b>Please add title</b></p>');
    $("#review-title").focus();
  }

  else if(rating==0)
  {
    $("#review-status").html('<p class="alert alert-warning" role="alert"><b>Please add rating</b></p>');
  }
  
  else if(descr=="")
  {
    $("#review-status").html('<p class="alert alert-warning" role="alert"><b>Please Enter Description</b></p>');
    $("#review-desc").focus();
  }

  else
  {
    var response;
    var dataString = 'title='+ title + '&descr=' + descr + '&rating=' + rating +'&rest_id=' + restaurant_id;
    $.ajax(
    {
      type: "post",
      url: "addreview.php",
      data: dataString,
      cache:false,
      beforeSend:function()
      {
        $("#review-status").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>&nbsp;&nbsp;Submitting.....</p>")
      },
      success:function(msg){
        response = String(msg);
        if(response=="Success")
        {
        $("#review-status").html("<p class='alert alert-success' role='alert'>Review recorded successfully</p>");
        setTimeout(function(){location.reload();},2000);
        }

        else
        {
          $("#review-status").html("<p class='alert alert-danger' role='alert'>" + msg + "</p>");
        }

      }
    }
    );

  } 
}      
