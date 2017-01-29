# Hoodie Voting

This is the hoodie voting application source code from December 2016, in case anyone wants to learn from my trainwreck of legacy code.

## Where to start

Most of the application is Laravel boilerplate, the interesting stuff happens in `app/Http/Controllers/VoteController.php`. Unfortunately, it isn't very well commented (shame on @markspolakovs) and some of it gets fairly messy. Also, some interesting things may be found in `resources/assets/js`, where you can see my React components. If you want to see how we did our beautiful minimalist styling, it's in `resources/assets/sass/app.scss`.

Also, ignore anything that contains the word "facebook". Before we settled on emails, we considered using Facebook to prevent duplicate voting.

## Architecture

In production, the app ran in AWS Elastic Beanstalk, with an RDS MySQL database. Email sending was handled by Amazon SES, and the logo images were stored in S3/CloudFront.
