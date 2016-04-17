<div class="container ">
    <div class="content">
    	<div class="row">
    		<div class="col-md-12 login_intro">
    			<h2>
        			Une question, ou un besoin spécifique ?
    				<br />
    				Contactez-nous dès maintenant !
    			</h2>
                <h3>Connection</h3>
                <form id="contactform" method="post" action="mailer.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your email message"></textarea>
                    </div>

                    <br>
                    <div class="g-recaptcha" data-sitekey="6Lc8ox0TAAAAAP8xFjwJEfM88OfvS84spvKPM35-"></div>
                    <br>

                    <div id="formresult">

                    </div>

                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
			</div>
		</div>
	</div>
</div>


</div> <!-- Container gradient end -->