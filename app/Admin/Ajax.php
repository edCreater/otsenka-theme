<?php

namespace App\Admin;

class Ajax {
	public function __construct() {

		add_action( 'wp_ajax_send_mail', [ $this, 'get_send_mail_handler' ] );
		add_action( 'wp_ajax_nopriv_send_mail', [ $this, 'get_send_mail_handler' ] );

	}

	function get_send_mail_handler() {


		$siteurl    = $_SERVER['HTTP_HOST'];
		$requesturl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$eol        = "\r\n";

		$headers = array(
			'From: Me Myself <no-reply@' . $siteurl . '>',
			'content-type: text/html',
		);

		// Формирование заголовка письма
		if ( isset( $_POST['subject'] ) ) {
			$subject = $_POST['subject'];
		} else {
			$subject = "Новая заявка";
		}

		$msg = "<html><body style='font-family:Arial,sans-serif;'>";
		$msg .= '<h2 style="font-weight:bold;border-bottom:1px dotted #ccc;">' . $subject . '</h2>' . $eol;


		if ( isset( $_POST['number'] ) ) {
			$msg .= '<p><strong>Кадастровый номер:</strong>' . $_POST['number'] . '</p>' . $eol;
		}
		if ( isset( $_POST['email'] ) ) {
			$msg .= '<p><strong>От кого:</strong>' . $_POST['email'] . '</p>' . $eol;
		}
		if ( isset( $_POST['phone'] ) ) {
			$msg .= '<p><strong>Телефон:</strong>' . $_POST['phone'] . '</p>' . $eol;
		}
		if ( isset( $_POST['name'] ) ) {
			$msg .= '<p><strong>Имя:</strong>' . $_POST['name'] . '</p>' . $eol;
		}

		if ( ! empty( $requesturl ) ) {
			$msg .= '<p><strong>url:</strong>' . $requesturl . '</p>' . $eol;
		}


		if ( isset( $_POST['message'] ) ) {
			$msg .= '<p><strong>Сообщение:</strong>' . nl2br( $_POST['message'] ) . '</p>' . $eol;
		}


		$msg .= "</body></html>";


		$docs    = $_FILES['docs'];
		$docsArr = array();

		$upload_dir = wp_upload_dir();

		if ( is_array( $docs['name'] ) ) {
			$countDocs = count( $docs['name'] );
			for ( $i = 0; $i < $countDocs; $i ++ ) {

				$docDate = new \DateTime();
				$newPath = $upload_dir['basedir'] . '/mailed/' . $docDate->format( "m-d-Y" ) . '_' . $docs['name'][ $i ];

				$docsArr[ $i ] = array(
					'name'    => $docs['name'][ $i ],
					'tmpName' => $docs['tmp_name'][ $i ],
					'error'   => $docs['error'][ $i ],
					'type'    => $docs['type'][ $i ],
					'size'    => $docs['size'][ $i ],
					'newPath' => $newPath
				);
			}
		}

		$attachments = array();
		if ( is_array( $docsArr ) ) {
			foreach ( $docsArr as $doc ) {
				if ( ! empty( $doc['tmpName'] ) ) {


					if ( ( $doc["error"] > 0 ) ) {

						$myPath = home_url( '/' ) . 'share/?upload=error';
						wp_redirect( $myPath );
						exit;

					} else {
						if ( move_uploaded_file( $doc['tmpName'], $doc['newPath'] ) ) {
							$attachments[] = $doc['newPath'];
						}
					}

				}
			}
		}

		$mailed = wp_mail( 'argentrussia@gmail.com', $subject, $msg, $headers, $attachments );

		if ( $mailed ) {
			echo( 'true' );
		} else {
			echo 'false';
		}


		wp_die();

	}

}
