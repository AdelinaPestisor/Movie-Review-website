<?php include "includes/header.php";
?>
<!-- Continut Pagina-->
<div class="container contactPage-centrare ">

  <h1>Contact Us!</h1>

  <div class="row">
  
    <div class="col-12  col-md-6 col-lg-4 ">
      <div class="img">

        <img class="envelope-round" src="envelope.png" alt="envelope img">

      </div>
      <div class="txt">
        If you have questions or just want to get in touch, use the form below. We look forward to hear from you!
      </div>

    </div>

    <div class="col-12 col-md-6 col-lg-8">

      <div class="contact-form">
        <form>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Your Name</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="type your full name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type a message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="button" class="btn btn-lg">Send</button>
        </form>
      </div>

    </div>
  </div>
</div>

<?php
include "includes/footer.php";
?>