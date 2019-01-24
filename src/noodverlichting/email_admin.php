<?php namespace noodverlichting; //EDIT THE NAMESPACE

function email_admin($data) {
  extract($data);
  $body = "<html>\n"; 
  $body .= "<body style=\"background-color:#f3f3f3; margin:0; padding-top:0; padding-right:0; padding-bottom:0; padding-left:0\">\n"; 
	$body .= "<table height=\"100%\" width=\"100%\">
                    <tr>
                        <td align=\"center\" style=\"padding:10px\">
                            <table class=\"of_wrap\" style=\"background-color:#fff; width:600px\">
                                <tr>
                                    <td style=\"padding-top:20px; padding-right:20px; padding-bottom:0; padding-left:20px \"><img src=\"". INSPECTIES_ASSETS_URL ."/images/hoppenbrouwers.jpg\" height=\"40\" width=\"233\" /></td>
                                </tr>
                                <tr><td style=\"color:#191919; font-family:sans-serif; font-size:12px; line-height:20px; padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:20px\"><p style=\"margin-top:1em; margin-right:0; margin-bottom:1em; margin-left:0; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; text-align:left\">Beste,</p>
<p style=\"margin-top:1em; margin-right:0; margin-bottom:1em; margin-left:0; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; text-align:left\">Via de website is er een offerte opgemaakt.<br>
  Hieronder staan de gegevens van deze offerte.
</p>
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"margin-bottom:30px; margin-top:30px\">
<tr>
<th style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Bedrijfsnaam</th>
<td style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($bedrijfsnaam)."</td>
</tr>
<tr>
<th style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Naam</th>
<td style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($naam)."</td>
</tr>
<tr>
<th style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Telefoonnummer</th>
<td style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($telefoon)."</td>
</tr>
<tr>
<th style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">E-mailadres</th>
<td style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\"><a href=\"mailto:".clean_string($email)."\">".clean_string($email)."</a></td>
</tr>
<tr>
<th style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Adres</th>
<td style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($adres)." ".clean_string($huisnummer)."</td>
</tr>
<tr>
<th style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Postcode</th>
<td style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($postcode)."</td>
</tr>
<tr>
<th style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Plaats</th>
<td style=\"background-color:#ffffff; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($woonplaats)."</td>
</tr>
<tr>
<th style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left; font-weight:bold\">Aantal armaturen</th>
<td style=\"background-color:#f6f6f6; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; padding:5px; text-align:left\">".clean_string($armaturen)." stuks</td>
</tr>
</table>
</td></tr>
<tr>
  <td style=\"color:#191919; font-family:sans-serif; font-size:12px; line-height:20px; padding-top:-15px; padding-right:20px; padding-bottom:5px; padding-left:20px\">
  <p style=\"margin-top:1em; margin-right:0; margin-bottom:1em; margin-left:0; color:#191919; font-family:sans-serif; font-size:15px; line-height:150%; text-align:left\">Met vriendelijke groet,<br>
    Hoppenbrouwers Techniek B.V.
  </p></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>";
	$body .= "</body>\n"; 
  $body .= "</html>\n"; 

  apply_filters( 'wp_mail_from_name', 'Offerte Noodverlichting ' . $naam );
  add_filter( 'wp_mail_content_type', 'noodverlichting\set_html_mail_content_type' ); // Make sure you edit the proper namespace for callbacks
  $admin_email = get_option('noodverlichting-admin-email', 'mvdbrand@hoppenbrouwers.nl'); //MAKE THIS THE SAME AS THE ONE IN THE SETTINGS PAGE
  \wp_mail($admin_email, "Offerte Hoppenbrouwers Techniek - Noodverlichting", $body, '', file_path($postcode, $huisnummer));
    
  remove_filter( 'wp_mail_content_type', 'noodverlichting\set_html_mail_content_type' );  // Edit the callback namespace
}
