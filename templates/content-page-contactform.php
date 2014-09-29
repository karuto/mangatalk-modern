<?php
/*
 * Template Name: Contact Form
 */
?>



<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	//Check to make sure that the name field is not empty
	if(trim($_POST['contactName']) === '') {
		$nameError = '请输入您的名字。';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) === '')  {
		$emailError = '请输入您的联系邮件。';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = '您输入的邮件格式不正确。';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	//Check to make sure comments were entered	
	if(trim($_POST['comments']) === '') {
		$commentError = '请输入内容。';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

  if(!isset($hasError)) {
    $wpdb->insert( 'mt_comments', 
      array( 
    		'name' => $name, 
    		'email' => $email,
    		'type' => "comment",
        'date' => date('Y-m-d H:i:s'),
        'comment' => $comments
    	), 
  	  array( 
  		  '%s', '%s', '%s', '%s', '%s' 
  	  ) 
    );
  }
		
  // //If there is no error, send the email
  // if(!isset($hasError)) {
  //     echo "<h1>got in</h1>";
  //   $emailTo = 'hi@mangatalk.net';
  //   $subject = '[留言反馈] 来自 ' . $name;
  //   $sendCopy = trim($_POST['sendCopy']);
  //   $body = "名字：$name \n\n邮件：$email \n\n附言：$comments";
  //   $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
  //
  //   wp_mail($emailTo, $subject, $body, $headers);
  //
  //     echo "<h1>sent! + ". $body ." + " . $headers ."</h1>";
  //
  //   if($sendCopy == true) {
  //     $subject = ' 您在漫言（http://mangatalk.net）的留言副本';
  //     $headers = 'From: 漫言 MangaTalk <hi@mangatalk.net>';
  //     wp_mail($email, $subject, $body, $headers);
  //   }
  //
  //   $emailSent = true;

  // }
} ?>


<!--
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script>
-->

<header class="article-front">
    <section class="article-header article-header-no-cover">
      <h2 class="h2 entry-title"><?php the_title(); ?>
      </h2>
    </section>
</header>

<div class="entry-content page-content article-content-container">
  
<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h3>感谢你的联络，<?=$name;?></h3>
		<p>我们会抽空仔细阅读你的留言，谢谢！</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error">There was an error submitting the form.<p>
		<?php } ?>
	
		<form action="<?php the_permalink(); ?>" id="contactForm" role="form" method="post">

			<div class="form-group">
				<label for="contactName">名字</label>
				<input class="form-control requiredField" type="text" 
        name="contactName" id="contactName" placeholder="您的名字"
        value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" />
				<?php if($nameError != '') { ?>
					<label class="error"><?=$nameError;?></span> 
				<?php } ?>
			</div>

			<div class="form-group">
				<label for="email">联系方式（Email）</label>
				<input class="form-control requiredField email" type="text" 
        name="email" id="email" placeholder="您的邮件"
        value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
				<?php if($emailError != '') { ?>
					<label class="error"><?=$emailError;?></span> 
				<?php } ?>
			</div>

			<div class="form-group">
				<label for="commentsText">来信内容</label>
				<textarea class="form-control requiredField" name="comments" id="commentsText" rows="10">
				  <?php 
          if(isset($_POST['comments'])) { 
            if(function_exists('stripslashes')) { 
              echo stripslashes($_POST['comments']); 
            } 
            else { 
              echo $_POST['comments']; 
            } 
          } ?>
				</textarea>
				<?php if($commentError != '') { ?>
					<label class="error"><?=$commentError;?></span> 
				<?php } ?>
			</div>

      <!-- <div class="checkbox">
        <label>
          <input type="checkbox" name="sendCopy" id="sendCopy" value="true"
          <?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> >
           同时将副本发至我的邮箱
        </label>
      </div> -->
      
				<!-- <li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li> -->
				<input type="hidden" name="submitted" id="submitted" value="true" />
        <button type="submit" class="btn btn-default">发送</button>
			</ol>
		</form>
	
		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

</div>
	