<?php


if(isset($_POST["Submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $rating = $_POST["rating"];
 
    $query = "INSERT INTO feedbackform VALUES('$name','$email','$phno','$rating')";
    
    echo
    "
    <script>alert('Data inserted successfully')</script>
    ";
  }

?>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
        <script  type="text/javascript">
            (function ($) {

$.fn.rating = function (method, options) {
    method = method || 'create';
    // This is the easiest way to have default options.
    var settings = $.extend({
        // These are the defaults.
        limit: 5,
        value: 0,
        glyph: "glyphicon-star",
        coloroff: "gray",
        coloron: "gold",
        size: "1.3em",
        cursor: "pointer",
        onClick: function () {
        },
        endofarray: "idontmatter"
    }, options);
    var style = "";
    style = style + "font-size:" + settings.size + "; ";
    style = style + "color:" + settings.coloroff + "; ";
    style = style + "cursor:" + settings.cursor + "; ";


    if (method == 'create') {
        //this.html('');	//junk whatever was there

        //initialize the data-rating property
        this.each(function () {
            attr = $(this).attr('data-rating');
            if (attr === undefined || attr === false) {
                $(this).attr('data-rating', settings.value);
            }
        });

        //bolt in the glyphs
        for (var i = 0; i < settings.limit; i++) {
            this.append('<span data-value="' + (i + 1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
        }

        $('.ratingicon').mouseover(function () {
            var starValue = $(this).data('value');
            var ratingIcons = $('.ratingicon');
            for (var i = 0; i < starValue; i++) {
                $(ratingIcons[i]).css('color', settings.coloron);
            }
        }).mouseout(function () {
            var currentRate = $(this).parent().attr('data-rating');
            var ratingIcons = $('.ratingicon');
            for (var i = ratingIcons.length; i >= currentRate; i--) {
                $(ratingIcons[i]).css('color', settings.coloroff);
            }
        });

        //paint
        this.each(function () {
            paint($(this));
        });

    }
    if (method == 'set') {
        this.attr('data-rating', options);
        this.each(function () {
            paint($(this));
        });
    }
    if (method == 'get') {
        return this.attr('data-rating');
    }
    //register the click events
    this.find("span.ratingicon").click(function () {
        rating = $(this).attr('data-value');
        $(this).parent().attr('data-rating', rating);
        paint($(this).parent());
        settings.onClick.call($(this).parent());
    });
    function paint(div) {
        rating = parseInt(div.attr('data-rating'));
        div.find("input").val(rating);	//if there is an input in the div lets set it's value
        div.find("span.ratingicon").each(function () {	//now paint the stars

            var rating = parseInt($(this).parent().attr('data-rating'));
            var value = parseInt($(this).attr('data-value'));
            if (value > rating) {
                $(this).css('color', settings.coloroff);
            }
            else {
                $(this).css('color', settings.coloron);
            }
        })
    }
};
}(jQuery));
        </script>        

        <script type="text/javascript">
            $(document).ready(function(){
				$("#stars-default").rating('create',
                   {
                        coloron: 'red',
                        onClick: function () {
                           alert('rating is ' + this.attr('data-rating'));
						   
                        }
                    });
                });
        </script> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" >
        <style>
            #f2
            {
                margin-top:100px;
                border: 3px solid #ccc;
                margin-right: 1200px;
            }
            ::placeholder {
                color: red;
              
                }
                b
                {
                    color: #063970;
                }
                body
        </style> 
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-sm-offset-3 col-md-offset-4 col-lg-offset-4 " id="f2">
                <form method="post" action="">
                  <h1 style="font-size: 25px;color:#063970;">Feedback Form</h1>
                   <hr>
                  
             <div class="form-group">
                   <b>Name:</b><br>
                   <div class="input-group">
                   <input type="text" name="name" Size="32" placeholder="Enter Your name here..."><br>
            </div>
            </div>
            <div class="form-group">
                   <b>Email:</b><br>
                   <div class="input-group">
                   <input type="email" name="email" Size="32" placeholder="Enter Your name here..."><br>
                   </div>
            </div>
                   <div class="form-group">
                   <b>Contact no:</b><br>
                   <div class="input-group">
                   <input type="text" name="phno" Size="32" placeholder="Enter Your Phonenumber here....."><br>
                   </div>
            </div>
                   <div class="form-group">
                   <b>Comment:</b><br>
                   <div class="input-group">
                   <textarea rows="6" name="comment" cols="34" Size="32" placeholder="Enter Your Comment here....."></textarea><br>
                   </div>
            </div>
                   
                   <b>Default stars</b><br>
                   <div id="stars-default">
								<input type="hidden" value="1" name="rating"/>
							</div>
                   
                   <br>
                   
                   <!-- <button type="button" name="submit" class="btn btn-primary" style="font-size:20px;margin-left:70px;">Submit</button>
                    -->
                    <input type="submit" name="Submit" required value="Submit">
                   
                   <br><br>
                   <form method="post" action="">
                </div>
            </div>
         </div>
    </body>
</html>