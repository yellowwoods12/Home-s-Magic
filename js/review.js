var rating=0;

$('document').ready(function(){
      $('.stars').mouseenter(
        function()
        {
          var index = $('.stars').index(this);
          if(rating==0)
          {
            for(i=0;i<=index;i++)
            {
            $('.stars:eq('+i+')').removeClass('fa-star-o');
            $('.stars:eq('+i+')').addClass('fa-star');
            }
          }
        }
      );

      $('.stars').mouseleave(
        function()
        {
          var index = $('.stars').index(this);
          if(rating==0)
          {
            for(i=0;i<=index;i++)
            {
            $('.stars:eq('+i+')').addClass('fa-star-o');
            $('.stars:eq('+i+')').removeClass('fa-star');
            }
          }
        }
      );

       $('.stars').on('click',
        function()
        {
          var index = $('.stars').index(this);
          rating = Number(index)+1;
          for(i=0;i<=index;i++)
          {
          $('.stars:eq('+i+')').removeClass('fa-star-o');
          $('.stars:eq('+i+')').addClass('fa-star');
          }
          for(i=index+1;i<=4;i++)
            {
            $('.stars:eq('+i+')').removeClass('fa-star');
            $('.stars:eq('+i+')').addClass('fa-star-o');
            }
        }
      );
  }) ;


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
