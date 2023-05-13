<style>
    @import url('https://fonts.googleapis.com/css?family=Merriweather:300|Oswald');

/* Form fields */ 
#booking-form {
 font-family: 'Merriweather', serif;
max-width: 540px;
margin: 40px auto;
}
#booking-form ul {
padding-left: 0;
}
#booking-form li {
list-style: none;
}
#booking-form input, 
#booking-form textarea,  
#booking-form select {
font-size: 18px;
padding: 0 28px;
width: 100%;
box-sizing: border-box;
border: 1px solid rgb(233,233,233);
text-align: left;
border-radius: 35px;
color: #000000;

letter-spacing: normal;
height: 50px;
line-height: 50px;
font-family: 'Merriweather', serif;
background: #fff;
margin-bottom: 20px;
}
#booking-form select {
background: url('https://seashineadventures.com/wp-content/uploads/2017/08/grey-chevron.png') no-repeat;
-webkit-appearance: none;
appearance: none;
background-size: 15px;
background-position: 97% 50%;

}
#booking-form textarea {
height: 120px;
line-height: 1.5;
padding: 15px 28px;
}
#booking-form input:focus, 
#booking-form textarea:focus, 
#booking-form select:focus {
outline: 0;
border: 1px solid rgb(211,211,211);
}
#booking-form label {
font-size: 18px;
font-weight: 300;
display: block;
margin-bottom: 10px;
}

/* Buttons */
#booking-form .next-btn,
#booking-form .submit-btn {
background: #82CCC8;
padding: 13px 20px;
color: #fff;
font-family: oswald, sans-serif;
text-transform: uppercase;
font-size: 18px;
line-height: 24px;
letter-spacing: 1px;
min-width: 400px;
display: inline-block;
text-align: center;
font-weight: 400;
border-radius: 0;
border: 0;
transition-property: background-color;
transition-duration: 0.5s;
width: 100%;
cursor: pointer;
}

#booking-form .next-btn:hover,
#booking-form .submit-btn:hover {
background-color: #444b5d;
color: #fff;
}

/* Progress Bar */
.progress-wrap {
margin: auto;
display: table;
}
.line-progress-bar {
display: flex;
margin: auto;
width: 100%;
}
.line {
height: 1px;
width: 250px;
border-bottom-style: solid;
border-bottom-width: 1px;
border-bottom-color: rgb(217, 217, 217);
position: absolute;
margin-top: 8px;
}
.progress-wrap div ul {
display: flex;
width: 250px;
list-style: none;
padding: 0px;
margin: initial;
justify-content: space-between;
z-index: 1;
}
.progressbar-dots {
display: inline-flex;
border: #949494 solid 4px;
background: #333333;
height: 20px;
width: 20px;
border-radius: 50%;
text-align: center;
justify-content: center;
align-items: center;
font-weight: bold;
color: #d4d4d4;
font-size: 20px;
margin-left: 0px;
color: #d4d4d4;
border: 0px solid rgb(217,217,217);
background: rgb(217, 217, 217);
}
.progressbar-dots span {
font-size: 12px;
line-height: 12px;
position: absolute;
margin-top: 60px;
/* width: 75px; */
float: left;
margin-left: -30px;
display: none;
}
.progressbar-dots.active {
color: #fff;
border: 0px solid rgb(38,163,134);
background: #82CCC8;
}

/*  Tab */
.tab-pane {
display: none;
}
.tab-pane:first-child {
display: block;
}

/* Error */
span.error {
font-size: 12px;
font-family: "helvetica neue", arial, sans-serif;
color: #D6041D;
text-transform: uppercase;
display: block;
margin-bottom: 10px;
}
  </style>
<form action="#" id="booking-form">
    
<div class="tab-content">
    <div class="tab-pane" id="step1">
        <ul>
            <li>
    <label>How many guests in your group?</label>
    <div class="errorTxt"></div>
    <select name="bf_totalGuests" required>
      <option value="">Select</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="More">More</option>
            </select>
         </li>
         <li style="list-style: none; display: inline">
                <button class="next-btn next-btn1" type="button">Next</button>
            </li>
        </ul>
    </div>
    <div class="tab-pane" id="step2">
        <ul>
            <li>
                <label>Which date and time are you looking to book on?</label>
    <div class="errorTxt"></div>
                <input type="text" class="datepicker" name="bf_date">
            </li>
            <li>
    <label>Which time of day?</label>
    <div class="errorTxt"></div>
    <select name="bf_time">
      <option value="">Select</option>
      <option value="Morning">Morning</option>
      <option value="Midday">Midday</option>
      <option value="Late afternoon, ending with a sunset">Late afternoon, ending with a sunset</option>
              </select>
          </li>
            <li>
    <label>How many hours would you like to charter for?</label>
    <div class="errorTxt"></div>
    <select name="bf_hours">
      <option value="">Select</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="Overnight (24 hours)">Overnight (24 hours)</option>
              </select>
            </li>
            <li>
                <button class="next-btn next-btn2" type="button">Next</button>
            </li>
        </ul>
    </div>
    <div class="tab-pane" id="step3">
        <ul>
            <li>
    <label>What is your first and last name?</label>
    <div class="errorTxt"></div>
    <input type="text" name="bf_fullname">
  </li>
            <li>
    <label>Which email address should we send your free estimate to?</label>
    <div class="errorTxt"></div>
    <input type="email" name="bf_email">
  </li>
            <li>
    <label>Do you have any questions or a message? (Optional)</label>
              <textarea name="bf_message"></textarea>
            </li>
            <li>
                <button class="submit-btn" type="submit">Request My Free Estimate</button>
            </li>
        </ul>
    </div>
</div>



<div id="loader" style="display: none;">
    <img src="//d2erq0e4xljvr7.cloudfront.net/assets/img/ring.svg">
</div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<script>
var v = $("#booking-form").validate({
    rules: {
      bf_totalGuests: {
        required: true
      },
      bf_date: {
        required: true
      },
      bf_time: {
        required: true
      },
      bf_hours: {
        required: true
      },
      bf_fullname: {
        required: true
      },
      bf_email: {
        required: true,
        email: true
      }

    },
    errorElement: "span",
    errorClass: "error",
    errorPlacement: function(error, element) {
          error.insertBefore(element); 
    }
});

$(".next-btn1").click(function() {
  if (v.form()) {
    $(".tab-pane").hide();
    $("#step2").fadeIn(1000);
    $('.progressbar-dots').removeClass('active');
    $('.progressbar-dots:nth-child(2)').addClass('active');
  }
});
$(".next-btn2").click(function() {
  if (v.form()) {
    $(".tab-pane").hide();
    $("#step3").fadeIn(1000);
    $('.progressbar-dots').removeClass('active');
    $('.progressbar-dots:nth-child(3)').addClass('active');
  }
});

$(".submit-btn").click(function() {
if (v.form()) {
  $("#loader").show();
   setTimeout(function(){
     $("#booking-form").html("<h2>Your message was sent successfully. Thanks! We'll be in touch as soon as we can, which is usually like lightning (Unless we're sailing or eating tacos!).</h2>");
   }, 1000);
  return false;
}
});
</script>