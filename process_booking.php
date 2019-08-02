
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}

$qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('form.php');
    $frm=new formBuilder;      
	
	$nu_seats=$_POST['seats'];
	$amount=$_POST['amount'];
if(!isset($amount))
{
	header('location:booking.php');
}	
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
	 <div id="payment-box" class="col-md-6">	
		<h3>Checkout</h3>

	  
        <img src="<?php echo $movie['image']; ?>" />
	</div>		
	 <div id="payment-box" class="col-md-6">		
        <h4 class="txt-title"><?php echo $movie['movie_name']; ?></h4>
        <div class="txt-price">Amount : $<?php echo $amount; ?></div>
	 	
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
            method="post" target="_top">
            <input type='hidden' name='business'
                value='kaurnavdeepsarao@gmail.com'>
				<input type='hidden'
                name='item_name' value='<?php echo $_SESSION['movie'] ?>'> <input type='hidden'
                name='item_number' value='CAM#N1'> <input type='hidden'
                name='amount' value='<?php echo $amount; ?>'> <input type='hidden'
                name='no_shipping' value='<?php echo $nu_seats; ?>'> <input type='hidden'
                name='currency_code' value='USD'> <input type='hidden'
                name='notify_url'
                value='http://localhost/book-ticket//notify.php'>
            <input type='hidden' name='cancel_return'
                value='http://localhost/book-ticket/cancel.php'>
            <input type='hidden' name='return'
                value='http://localhost/book-ticket/complete_payment.php'>
            <input type="hidden" name="cmd" value="_xclick">
  <input type="image" name="submit" src="images/paypal.png" border="0" alt="Submit"  />

		
        </form>
    </div>
</div>
</div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
<?php include('footer.php');?>
</div>
<?php
    session_start();
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    header('location:bank.php');
?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Name is required and can\'t be empty'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of alphabets'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Card Number is required and can\'t be empty'
                    },stringLength: {
                    min: 16,
                    max: 16,
                    message: 'The Card Number must 16 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid Card Number'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Expire Date is required and can\'t be empty'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The cvv is required and can\'t be empty'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'The cvv must 3 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid cvv'
                    } } }}
            });
            });

</script>