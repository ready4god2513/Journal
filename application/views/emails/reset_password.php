<h2>Reset Your Password</h2>
<p>To reset your <?=html::anchor(url::site(), 'To Journal')?> password, please visit <?=html::anchor('passwords/reset/' . $user->email . '/' . $user->password)?></p>