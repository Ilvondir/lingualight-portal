# LinguaLight

LinguaLight Portal is a web application designed for publishing and enrolling in foreign language courses. The frontend of the application was built primarily using the Bootstrap framework. The backend of the application is written in PHP, specifically utilizing the Laravel framework.

The portal allows us to log in with three user roles: client, trainer, and administrator. The client role can only enroll in courses and make payments for them. The simulated payment system was developed using the Stripe platform, specifically the Stripe-PHP library.

Users with the trainer role can create course offers, edit them, and pseudo-delete them. However, in order to gain access to these functionalities, they must first confirm their qualifications by submitting a request to the administration through a dedicated form along with supporting documents verifying their identity.

Administrators have full access to the application's resources. They can edit and delete all course offers, as well as confirm or reject requests for trainer verification, as mentioned before. Additionally, they have access to a panel that allows them to edit and delete user accounts. As an administrator, you can also create additional accounts with the administrator role.

## Used Tools
- HTML 5
- CSS 3
- JavaScript ES6
- PHP 8.1.5
- Laravel 10.9.0
- Bootstrap 5.3.0
- Anime.js 3.0.1
- Stripe-PHP 10.13.0

## Requirements

For running the application you need:

- [XAMPP](https://www.apachefriends.org/pl/index.html)
- [composer](https://getcomposer.org)

## How to run

1. Execute command `git clone https://github.com/Ilvondir/lingualight-portal`.
2. Open XAMPP and start SQL server.
3. Run `start.bat` file.
4. If you want payment simulations to work, you need to add the STRIPE_SECRET key with the value of your secret payment key obtained from the Stripe portal to the `.env.example` file and run `start.bat` file.
5. Log in to the selected account to discover various functionalities.

| Account       	| Login	      |   Password 	|
|:---------------:|:-----------:|:-----------:|
| Administrator   | admin      	|  admin   	  | 
| Trainer 	      | trainer 	  |  1234       |
| User          	| user      	|  user       |


## First Look

![firstlook](storage/app/public/img/firstlook.png?raw=true)
