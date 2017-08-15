	body.is-touch #full {
		background-attachment: scroll;
	}

	#full {
		padding: 12em 0 8em 0;
		background-attachment: fixed;
		background-image: url("images/overlay.png"), url("../../images/pic01.jpg");
		background-position: center top;
		background-size: cover;
		line-height: .75;
		text-align: center;
	}
		#full:last-child {
			margin-bottom: 0;
		}

		#full h2 {
			color: #ffffff;
			display: inline-block;
			font-size: 3.5em;
			line-height: 1.35;
			margin-bottom: 0.5em;
		}

		#full p {
			color: #aaa;
			font-size: 1.5em;
			margin-bottom: 1.75em;
			text-transform: uppercase;
		}

		@media screen and (max-width: 1280px) {

			#full {
				padding: 10em 0 5em 0;
			}

				#full h2 {
					font-size: 3em;
				}

		}

		@media screen and (max-width: 980px) {

			#full {
				padding: 7em 0 4em 0;
			}

		}

		@media screen and (max-width: 736px) {

			#full {
				padding: 4em 1em 4em 1em;
			}

				#full br {
					display: none;
				}

				#full h2 {
					font-size: 2.25em;
				}

				#full p {
					font-size: 1.25em;
				}

		}

		@media screen and (max-width: 480px) {

			#full {
				padding: 2em .5em 2em .5em;
			}

		}	