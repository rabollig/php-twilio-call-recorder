# php-twilio-call-recorder
A simple API script to record phone calls with Twilio.com

I wrote this just out of necessity to record some old voice mails
for a friend whose voice mail box was always full because they
didn't want to delete messages.

# Installation

- Install the scripts on a PHP enabled web server.  The script should work
on anything PHP 5.5.0 or higher - I'm not using anything fancy, but some of the
libraries might require at least this version.  5.5 is pretty old, so the minimum
may go up on future commits

- Run ```composer install``` to install external libraries

- Create an account with Twilio.com, purchase a phone number, and point
voice calls to the URL for the script

- Copy config-template.php to config.php.  Add your Caller ID string and email
address

# Operation

Call your Twilio phone number.  If your Caller ID doesn't work, it will play the
greeting in your config file so as to not give away what the service is.

Enter the number you want to call.  It will start recording automatically.

Hang up the call to end the recording.  You should receive an email with a
link to your recording; but if email isn't working, you can also obtain the
recording from your Twilio interface.

Make sure you download and save your recording as Twilio links will not remain
active forever.

# Tips

Mute your phone if you are recording voicemails or other one-way sound so that
you don't pick up ambient noise - your recordings will be cleaner

# Legal notes

The recording conversations is regulated in many areas.  It happens that my area
only requires one party to a conversation to consent (that would be me).

Many areas have greater requirements incuding notice to parties, consent of
parties, tones indicating that recording is taking place, etc.

This program makes no attempt to comply with these laws.  *_It is your
responsibility to comply with the law._*