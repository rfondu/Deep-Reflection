<html>
<head>
<title>Form Processing</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<center>
<%
'-----EDIT THE MAILING DETAILS IN THIS SECTION-----
dim fromName, botCheck, recipientName, recipientAddress, subject, body, sentTo
Dim ans(23)
ans(0) = Request.Form("Q1")
ans(1) = Request.Form("Q2")
ans(2) = Request.Form("Q3")
ans(3) = Request.Form("Q4")
ans(4) = Request.Form("Q5")
ans(5) = Request.Form("Q6")
ans(6) = Request.Form("Q7")
ans(7) = Request.Form("Q8")
ans(8) = Request.Form("Q9")
ans(9) = Request.Form("Q10")
ans(10) = Request.Form("Q11")
ans(11) = Request.Form("Q12")
ans(12) = Request.Form("Q13")
ans(13) = Request.Form("Q14")
ans(14) = Request.Form("Q15")
ans(15) = Request.Form("Q16")
ans(16) = Request.Form("Q17")
ans(17) = Request.Form("Q18")
ans(18) = Request.Form("Q19")
ans(19) = Request.Form("Q20")

For Each item In ans
	body = body & vbCrLf & item
Next

fromName = "anonymous"
botCheck = Request.Form("bot_check")
recipientName = "Deep Reflection"
recipientAddress= "deepreflection@fondulis.net"
subject = "Deep Reflection Questionnaire"




'-----YOU DO NOT NEED TO EDIT BELOW THIS LINE-----

sentTo = "NOBODY"
Set Mailer = Server.CreateObject("SMTPsvg.Mailer")
Mailer.FromName = fromName

if botCheck = "cat" then
	Mailer.FromAddress = "anonymous@some.net"
end if

Mailer.RemoteHost = "mrelay.perfora.net"
if Mailer.AddRecipient (recipientName, recipientAddress) then
	sentTo=recipientName & " (" & recipientAddress & ")"
end if
Mailer.Subject = subject
Mailer.BodyText = body

if botCheck <> "cat" then
    Response.Write "NO BOTS!!!"
elseif Mailer.SendMail then
Response.Write "Your message was sent to <b>" & recipientName & "</b><p>Thank you for helping us make an awesome product!</p>"
else
Response.Write "Mail send failure. Error was " & Mailer.Response &  "<p><a href='#' onclick='history.go(-1);return false;' style='color: #cc0000'>Try again?</a></p>"
end if
%>

</head>

<body>
    
</body>

</html>