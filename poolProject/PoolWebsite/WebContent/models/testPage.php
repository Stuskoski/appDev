<?php
echo "<a href='../cart'>Back</a><br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<script type="text/javascript" src="assets/js/detailBox.js"></script>
</head>
<body>
<div class="messagepop pop">
  <form method="post" id="new_message" action="/messages">
    <p><label for="email">Your email or name</label><input type="text" size="30" name="email" id="email" /></p>
    <p><label for="body">Message</label><textarea rows="6" name="body" id="body" cols="35"></textarea></p>
    <p><input type="submit" value="Send Message" name="commit" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>
  </form>
</div>

<a href="/contact" id="contact">Contact Us</a>

</body>
</html>
<?php 
?>