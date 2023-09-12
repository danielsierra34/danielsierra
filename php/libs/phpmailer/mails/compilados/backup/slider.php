<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <!-- This code is part of a tutorial from Email on Acid: https://www.emailonacid.com/blog/article/email-development/build-an-interactive-carousel-for-email -->
	<title>Interactive Carousel</title>
	<!--[if !mso]><!-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!--<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
<style>body {
margin: 0px; padding: 0px;
}
@media only screen and (max-width: 480px) {
  .wrapper {
    min-width: 0px !important;
  }
  .shrink {
    width: 320px !important; min-width: 0px !important;
  }
  .hide {
    display: none !important; visibility: none !important; overflow: hidden !important;
  }
  #CarouselWrapper {
    width: 320px !important; height: 895px !important;
  }
  .CarouselMain {
    width: 320px !important; height: 895px !important;
  }
  .slide1-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .slide2-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .slide3-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .button {
    max-height: 32px !important; width: 32px !important; border: none; padding: 8px 0px 8px 0px;
  }
  .slide1 {
    top: 0px; left: 20px;
  }
  .slide1-content {
    left: 0px; width: 100%;
  }
  #slide-1:checked + span + table .swoosh {
    left: 0px !important;
  }
  .slide1:before {
    content: "1";
  }
  .slide2 {
    top: 0px; left: 61px;
  }
  .slide2-content {
    left: 320px; width: 100%;
  }
  #slide-2:checked + span + table .swoosh {
    left: -320px !important;
  }
  .slide2:before {
    content: "2";
  }
  .slide3 {
    top: 0px; left: 103px;
  }
  .slide3-content {
    left: 640px; width: 100%;
  }
  #slide-3:checked + span + table .swoosh {
    left: -640px !important;
  }
  .slide3:before {
    content: "3";
  }
}
@media (max-device-width: 480px) {
  .wrapper {
    min-width: 0px !important;
  }
  .shrink {
    width: 320px !important; min-width: 0px !important;
  }
  .hide {
    display: none !important; visibility: none !important; overflow: hidden !important;
  }
  #CarouselWrapper {
    width: 415px !important; height: 895px !important; position: relative; display: block; overflow: hidden;
  }
  .CarouselMain {
    width: 600px !important; height: 1400px !important;
  }
  .button {
    visibility: visible !important; max-height: 46px !important; width: 86px !important; padding: 7px 0px 6px 0px; display: block !important; position: absolute !important; text-align: center; z-index: 7; background-color: #262626; box-sizing: content-box; color: #ffffff !important; font-family: Arial, Helvetica, sans-serif; font-size: 13px !important; line-height: 16px !important; font-weight: bold; cursor: pointer; -webkit-transition: 0.1s ease-in; -moz-transition: 0.1s ease-in; -ms-transition: 0.1s ease-in; -o-transition: 0.1s ease-in;
  }
  .swoosh {
    position: relative; transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -moz-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out;
  }
  .slide1-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide2-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide3-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  #CarouselWrapper {
    width: 320px !important; height: 895px !important;
  }
  .CarouselMain {
    width: 320px !important; height: 895px !important;
  }
  .slide1-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .slide2-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .slide3-content {
    top: 0px; width: 320px !important; height: 1350px !important; background-repeat: no-repeat;
  }
  .button {
    max-height: 32px !important; width: 32px !important; border: none; padding: 8px 0px 8px 0px;
  }
  .slide1 {
    top: 0px; left: 20px;
  }
  .slide1-content {
    left: 0px; width: 100%;
  }
  #slide-1:checked + span + table .swoosh {
    left: 0px !important;
  }
  .slide1:before {
    content: "1";
  }
  .slide2 {
    top: 0px; left: 61px;
  }
  .slide2-content {
    left: 320px; width: 100%;
  }
  #slide-2:checked + span + table .swoosh {
    left: -320px !important;
  }
  .slide2:before {
    content: "2";
  }
  .slide3 {
    top: 0px; left: 103px;
  }
  .slide3-content {
    left: 640px; width: 100%;
  }
  #slide-3:checked + span + table .swoosh {
    left: -640px !important;
  }
  .slide3:before {
    content: "3";
  }
}
@media only screen and (-webkit-min-device-pixel-ratio: 1) {
  #CarouselWrapper {
    width: 415px !important; height: 895px !important; position: relative; display: block; overflow: hidden;
  }
  .CarouselMain {
    width: 600px !important; height: 1400px !important;
  }
  .button {
    visibility: visible !important; max-height: 46px !important; width: 86px !important; padding: 7px 0px 6px 0px; display: block !important; position: absolute !important; text-align: center; z-index: 7; background-color: #262626; box-sizing: content-box; color: #ffffff !important; font-family: Arial, Helvetica, sans-serif; font-size: 13px !important; line-height: 16px !important; font-weight: bold; cursor: pointer; -webkit-transition: 0.1s ease-in; -moz-transition: 0.1s ease-in; -ms-transition: 0.1s ease-in; -o-transition: 0.1s ease-in;
  }
  .swoosh {
    position: relative; transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -moz-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out;
  }
  .slide1-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide2-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide3-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide1 {
    top: 10px; left: 321px;
  }
  .slide1-content {
    left: 0px;
  }
  .slide1:hover {
    background-color: #37B330;
  }
  #slide-1:checked ~ .slide1 {
    background-color: #37B330 !important;
  }
  #slide-1:checked + span + table .swoosh {
    left: 0px !important;
  }
  .slide2 {
    top: 66px; left: 321px;
  }
  .slide2-content {
    left: 600px;
  }
  .slide2:hover {
    background-color: #37B330;
  }
  #slide-2:checked ~ .slide2 {
    background-color: #37B330 !important;
  }
  #slide-2:checked + span + table .swoosh {
    left: -600px !important;
  }
  .slide3 {
    top: 122px; left: 321px;
  }
  .slide3-content {
    left: 1200px;
  }
  .slide3:hover {
    background-color: #37B330;
  }
  #slide-3:checked ~ .slide3 {
    background-color: #37B330 !important;
  }
  #slide-3:checked + span + table .swoosh {
    left: -1200px !important;
  }
}
@media (min--moz-device-pixel-ratio: 1) {
  #CarouselWrapper {
    width: 415px !important; height: 895px !important; position: relative; display: block; overflow: hidden;
  }
  .CarouselMain {
    width: 600px !important; height: 1400px !important;
  }
  .button {
    visibility: visible !important; max-height: 46px !important; width: 86px !important; padding: 7px 0px 6px 0px; display: block !important; position: absolute !important; text-align: center; z-index: 7; background-color: #262626; box-sizing: content-box; color: #ffffff !important; font-family: Arial, Helvetica, sans-serif; font-size: 13px !important; line-height: 16px !important; font-weight: bold; cursor: pointer; -webkit-transition: 0.1s ease-in; -moz-transition: 0.1s ease-in; -ms-transition: 0.1s ease-in; -o-transition: 0.1s ease-in;
  }
  .swoosh {
    position: relative; transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -moz-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out;
  }
  .slide1-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide2-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide3-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide1 {
    top: 10px; left: 321px;
  }
  .slide1-content {
    left: 0px;
  }
  .slide1:hover {
    background-color: #37B330;
  }
  #slide-1:checked ~ .slide1 {
    background-color: #37B330 !important;
  }
  #slide-1:checked + span + table .swoosh {
    left: 0px !important;
  }
  .slide2 {
    top: 66px; left: 321px;
  }
  .slide2-content {
    left: 600px;
  }
  .slide2:hover {
    background-color: #37B330;
  }
  #slide-2:checked ~ .slide2 {
    background-color: #37B330 !important;
  }
  #slide-2:checked + span + table .swoosh {
    left: -600px !important;
  }
  .slide3 {
    top: 122px; left: 321px;
  }
  .slide3-content {
    left: 1200px;
  }
  .slide3:hover {
    background-color: #37B330;
  }
  #slide-3:checked ~ .slide3 {
    background-color: #37B330 !important;
  }
  #slide-3:checked + span + table .swoosh {
    left: -1200px !important;
  }
}
@media (max-width: 480px) {
  #CarouselWrapper {
    width: 415px !important; height: 895px !important; position: relative; display: block; overflow: hidden;
  }
  .CarouselMain {
    width: 600px !important; height: 1400px !important;
  }
  .button {
    visibility: visible !important; max-height: 46px !important; width: 86px !important; padding: 7px 0px 6px 0px; display: block !important; position: absolute !important; text-align: center; z-index: 7; background-color: #262626; box-sizing: content-box; color: #ffffff !important; font-family: Arial, Helvetica, sans-serif; font-size: 13px !important; line-height: 16px !important; font-weight: bold; cursor: pointer; -webkit-transition: 0.1s ease-in; -moz-transition: 0.1s ease-in; -ms-transition: 0.1s ease-in; -o-transition: 0.1s ease-in;
  }
  .swoosh {
    position: relative; transition: all 0.3s ease-out; -webkit-transition: all 0.3s ease-out; -moz-transition: all 0.3s ease-out; -ms-transition: all 0.3s ease-out; -o-transition: all 0.3s ease-out;
  }
  .slide1-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide2-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
  .slide3-content {
    display: block; position: absolute; top: 0px; left: 0px; width: 600px; height: 520px; background-color: #FFFFFF;
  }
}
</style></head>

<body style="margin: 0px; padding: 0px;" bgcolor="#6c6c6c">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#6c6c6c" style="width: 100% !important; table-layout: fixed; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
		<tr>
			<td valign="top" align="center" style="border-collapse: collapse;">
				<div class="wrapper" style="min-width: 640px;">
					<table id="CarouselWrapper" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="shrink" style="width: 600px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: 0 auto;">
						<tr>
							<td style="border-collapse: collapse;">
								<table class="CarouselMain" width="600" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
									<tr>
										<td valign="top" style="border-collapse: collapse;">
											<table border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
												<tr>
													<td style="line-height: 1px; font-size: 0px; border-collapse: collapse;">
														<!--[if mso]><p style="display: none;"><![endif]-->
														<form action="foo">
														<input class="yahoo" type="radio" name="action" checked="checked" id="slide-1" style="display: none !important; max-height: 0; visibility: hidden;" />
														<span style=""></span>
														<!--[if mso]></p><![endif]-->
														<table border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tr>
																<td style="line-height: 1px; font-size: 0px; border-collapse: collapse;">
																	<!--[if mso]><p style="display: none;"><![endif]-->
																	<input class="yahoo" type="radio" name="action" id="slide-2" style="display: none !important; max-height: 0; visibility: hidden;" />
																	<span style=""></span>
																	<!--[if mso]></p><![endif]-->
																	<table border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																		<tr>
																			<td style="line-height: 1px; font-size: 0px; border-collapse: collapse;">
																				<!--[if mso]><p style="display: none;"><![endif]-->
																				<input class="yahoo" type="radio" name="action" id="slide-3" style="display: none !important; max-height: 0; visibility: hidden;" />
																				<span style=""></span>
																				
																				<!--[if mso]></p><![endif]-->
																				<table border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																					<tr>
																						<td style="border-collapse: collapse;">
																							<table class="swoosh" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																								<tr>
																									<td class="slide1-content" style="border-collapse: collapse;">
																										<table width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td valign="top" height="320" style="border-collapse: collapse;">
																													<img src="https://www.emailonacid.com/images/emails/carousel/image3.jpg" width="320" />
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td height="10" style="line-height: 1px; font-size: 1px; display: block; border-collapse: collapse;"> </td>
																								</tr>
																								<tr>
																									<td class="slide2-content" style="border-collapse: collapse;">
																										<table width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td valign="top" height="320" style="border-collapse: collapse;">
																													<img src="https://www.emailonacid.com/images/emails/carousel/image2.jpg" width="320" />
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td height="10" style="line-height: 1px; font-size: 1px; display: block; border-collapse: collapse;"> </td>
																								</tr>
																								<tr>
																									<td class="slide3-content" style="border-collapse: collapse;">
																										<table width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td valign="top" height="320" style="border-collapse: collapse;">
																													<img src="https://www.emailonacid.com/images/emails/carousel/image4.jpg" width="320" />
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td height="10" style="line-height: 1px; font-size: 1px; display: block; border-collapse: collapse;"> </td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																				<label class="button slide3" for="slide-3" style="display: none; max-height: 0; visibility: hidden; font-size: 1px; line-height: 1px;">
																				<span class="hide" style="color: #ffffff;">Three</span>
																				</label>
																			</td>
																		</tr>
																	</table>
																	<label class="button slide2" for="slide-2" style="display: none; max-height: 0; visibility: hidden; font-size: 1px; line-height: 1px;">
																	<span class="hide" style="color: #ffffff;">Two</span>
																	</label>
																</td>
															</tr>
														</table>
														<label class="button slide1" for="slide-1" style="display: none; max-height: 0; visibility: hidden; font-size: 1px; line-height: 1px;">
														<span class="hide" style="color: #ffffff;">One</span>
														</label>
													</form></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
