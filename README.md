# Ecom

Prerequisites:

Install XAMPP which includes PHP and MySQL: Download it from https://www.apachefriends.org/index.html

Setup:

1. Clone/Download project repository. Make sure to store the entire project folder inside the htdocs directory of your XAMPP installation.

2. Open your terminal or command prompt, navigate to the project folder inside htdocs (exactly basic-ecom, not basic_eCom) and run: npm install

3. Start MySQL database. Open XAMPP control panel. Start the MySQL and Apache service.

4. Open the file db.php in the project folder and update the password to match your MySQL password.
Example:
$password = 'your_mysql_password_here';
