"use strict";

$(function(){

	$.validator.addMethod( "phoneAU", function( phone_number, element ) {
		// phone_number = phone_number.replace( /\s+/g, "" );
		return this.optional( element ) || phone_number.match( /^(000|112|106)|((1300|1800|190[0-9])([- ]?[0-9]){6})|((13|18)([- ]?[0-9]){4})|(((\+61[- ]?\(?0?[- ]?[23478]\)?)|(\(?0[- ]?[23478]\)?))([- ]?[0-9]){8})$/ );
	}, "Please specify a valid Australian phone number" );

	// Activate validation for the contact form
	$("#checkout").validate({
		rules: {
			firstname: {
				required: true,
				minlength: 2
			},
			lastname: {
				required: true,
				minlength: 2
			},
			address: {
				required: true,
				minlength: 10
			},
			phone: {
				required: true,
				phoneAU: true
			},
			email: {
				required: true,
				email: true
			},
			creditcard: {
				digits: true,
				required: true,
				minlength: 12
			},
			nameOnCard: {
				required: true,
				minlength: 2
			},
			expiry: {
				required: true,
				minlength: 4
			},
			csv: {
				digits: true,
				required: true,
				minlength: 3
			}
		},

		messages: {
			firstname: {
				required: "Please enter your firstname",
				minlength: "Please enter two or more characters"
			},
			lastname: {
				required: "Please enter your lastname",
				minlength: "Please enter two or more characters"
			},
			address: {
				required: "Please enter your address",
				minlength: "Please enter 10 or more characters"
			},
			phone: {},
			email: {
				required: "Please enter your email address",
				email: "Please enter a valid email address"
			},
			creditcard: {
				digits: "Only digits allowed",
				required: "Please enter your credit card number",
				minlength: "Please enter 12 or more characters"
			},
			nameOnCard: {
				required: "Please enter your name on card",
				minlength: "Please enter two or more characters"
			},
			expiry: {
				required: "Please enter the expiry of your credit card",
				minlength: "Please enter four or more characters"
			},
			csv: {
				digits: "Only digits allowed",
				required: "Please enter the csv of your credit card",
				minlength: "Please enter two or more digits"
			}
		}
	});

});