<?php

return [

	"user" => [

		"register" => [
			"title" => "Register",
			"note" => "Create an Account",
			"sub_note" => "Enter your personal details to create account",
			"name" => "Name",
			"name_placeholder" => "Enter name",
			"name_invalid_feedback" => "Please enter your name!",
			"email" => "Email",
			"email_placeholder" => "Enter email",
			"email_invalid_feedback" => "Please enter your email!",
			"password" => "Password",
			"password_placeholder" => "Enter password",
			"password_invalid_feedback" => "Please enter your password!",
			"confirm_password" => "Confirm Password",
			"confirm_password_placeholder" => "Enter confirm password",
			"confirm_password_invalid_feedback" => "Please enter your confirm password!",
			"submit_btn" => "Create Account",
			"submit_btn_loading_text" => "Creating Account...",
			"login_note" => "Already have an account?",
			"login_btn" => "Login",
			"register_failed" => "Create account failed. Please try again.",
			"register_success" => "Registration Success"
		],

		"login" => [
			"title" => "Login",
			"note" => "Login to Your Account",
			"sub_note" => "Enter your email & password to login",
			"email" => "Email",
			"email_placeholder" => "Enter email",
			"email_invalid_feedback" => "Please enter your email!",
			"password" => "Password",
			"password_placeholder" => "Enter password",
			"password_invalid_feedback" => "Please enter your password!",
			"remember_me" => "Remember me",
			"submit_btn" => "Login",
			"submit_btn_loading_text" => "Logging In...",
			"register_note" => "Don't have account?",
			"register_btn" => "Create an account",
			"invalid_credentials" => "Invalid Email / Password.",
			"login_success" => "Login Success.",
			"password_space_validation_message" => "Space are not allowed in passwords.",
			"forgot_password" => "Forgot Password ?"
		],

		"logout" => [
			"title" => "Logout",
			"logout_confirmation" => "Are you sure you want to logout from the current session?",
			"submit_btn_loading_text" => "Logging Out...",
			"logout_success" => "Logout Success.",
			"cancel" => "Cancel"
		],

		"header" => [
			"profile" => "Profile",
			"logout" => "Logout",
		],

		"sidebar" => [
			"home" => "Home",
			"profile" => "Profile",
			"logout" => "Logout",
		],

		"home" => [
			"title" => "Home"
		],

		"profile" => [
			"title" => "Profile",
			"overview" => "Overview",
			"edit_profile" => "Edit Profile",
			"about" => "About",
			"details" => "Profile Details",
			"name" => "Name",
			"mobile" => "Mobile",
			"email" => "Email",
			"avatar" => "Avatar",
			"save_changes" => "Save Changes",
			"update_profile_submit_btn_loading_text" => "Saving Changes...",
			"name_invalid_feedback" => "Please enter your name!",
			"email_invalid_feedback" => "Please enter your email!",
			"updation_failed" => "Profile updation failed. Please try again.",
			"updation_success" => "Profile updated.",
			"avatar_updation_failed" => "Avatar updation failed. Please try again.",
			"delete_account_password" => "Password",
			"delete_account_password_invalid_feedback" => "Please enter the password.",
			"delete_account" => "Delete Account",
			"delete_account_submit_btn_loading_text" => "Deleting...",
			"delete_account_note" => "Note : Once you proceed with the deletion of your account, please be aware that all associated data will be permanently lost and cannot be recovered. This includes your profile information, settings, files, and any other data linked to your account.",
			"delete_account_failed" => "Account deletion failed. Please try again.",
			"delete_account_success" => "Account has been deleted.",
			"not_found" => "Profile not found (:email)"
		],

		"common" => [
			"na" => "N/A",
			"enabled" => "Enabled",
			"disabled" => "Disabled",
			"failed" => "Failed",
			"success" => "Success",
			"no_data_found" => "No Data Found."
		],

		"errors" => [
			"too_many_attempts" => "Too many attempts. Please wait for a minute and try again."
		],

		"subscription_plans" => [
			'title' => 'Subscription Plans',
			'amount' => 'Amount',
			'price' => 'Price',
			'checkout' => "Checkout",
			"subscribe" => "Subscribe",
			"checkout_success" => "Payment success.",
			"checkout_failed" => "Payment failed.",
			"webhook_event_error" => "Stripe webhook event received (:event)",
			"not_found" => "Subscription plan not found (:api_id)"
		],

		"payments" => [
			"title" => "Payments",
			"amount" => "Amount",
			"payment_id" => "Payment ID",
			"status" => "Status",
			"paid_at" => "Paid At",
			"expire_at" => "Expire At",
			"subscription_plan" => "Subscription Plan",
			"action" => "Action",
			"view" => "View",
			"details" => "Payment Details"
		]
	]
];