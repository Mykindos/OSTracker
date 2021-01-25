# OSTracker

OSTracker is a laravel based API designed to track and store data for scripts on OSBot. API is not dependent on OSBot to operate, however the client side implementation in this repository is designed around the OSBot API. If you would like to implement it on another client e.g. RuneLite, you will have to create your own implementation.

## Client-side installation
Integration with your OSBot script is relatively simple. Simply copy the contents of the client directory in this repo into your scripts code base.

In your scripts onStart, you should initialise OSTracker like so.

```java
private Tracker tracker;

@Override
public void onStart(){
        try {
		tracker = new Tracker(getBot(), getName(), "BASE_API_URL", "YOUR_TOKEN")
				.setUpdateInterval(30) // Defaults to an hour
				.start();
		tracker.getSessionTracker().setVersion(getVersion());
		
	} catch (Exception e) {
		if (tracker != null) {
			tracker.stop();
		}
		e.printStackTrace();
	}
}
```

And end the tracker in your scripts onExit like so
```java
@Override
public void onExit(){

	if(tracker != null){
		tracker.stop();
	}
}
```

Your token will be created when deploying the laravel API to your server, or it will be provided to you if you are choosing to integrate with somebody elses API.

From here, OSTracker will automatically handle experience, loot, and script runtime tracking, and by default will submit this data to the API once per hour. Data will also be submitted when the script is stopped.

## API Installation
### Requirements
* A Linux based or Windows OS VPS / Dedicated server. (for this installation, I used a Centos 7 VPS)
* PHP 7.2+
* Apache
* Composer
* Git
* MySQL Server

I would recommend following this tutorial, as it encompasses most of the requirements. You will need to replace Step 4 with this repository however.
https://tecadmin.net/install-laravel-framework-on-centos/

### Steps
1. Clone this repository to your desired location, e.g. '/var/www', you can do this by running ```git clone https://github.com/tomhoogstra/OSTracker.git``` in the repository of choice.
2. Once cloned, navigate to the <b>api</b> subdirectory.
3. Run ```composer install``` and wait for all the dependencies to downloaded, this can take a few minutes.
4. After composer has finished doing its thing, you will need to create a copy of the '.env.example' file and name it '.env'.
5. Run the following commands ```php artisan key:generate```
6. With MySQL, create a new scheme with whatever name you want, and give your user access to it.
7. After the schema has been created, you will need to update the '.env' file with your database credentials, e.g.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ostracker
DB_USERNAME=myusername
DB_PASSWORD=mypassword
```
8. Run the following commands to create all the necessary tables with default data
```
php artisan migrate
php artisan db:seed
```
9. Update the file read / write permissions if you are on a linux based system
```
chown -R apache.apache /var/www/OSTracker/api
chmod -R 755 /var/www/OSTracker/api
chmod -R 755 /var/www/OSTracker/api/storage
```
10. Update the apache config to point to the base directory of the API (on Centos 7, the config can be found at '/etc/httpd/conf/httpd.conf')

To do this, add this to the bottom of the config (change the paths where necessary)
```
<VirtualHost *:80>
       DocumentRoot /var/www/OSTracker/api/public

       <Directory /var/www/OSTracker/api>
              AllowOverride All
       </Directory>
</VirtualHost>
```

11. Restart the apache service (On Centos 7 you can do this with ```service httpd restart```)
12. Installation should now be complete, and you should be able to access the Laravel default page by going to your hostname in any web browser

![alt text](https://i.imgur.com/Xp4fZu1.png "Example page")

## Post-installation instructions
After installation, you will need to create your first user to get an API token which will be used in your script and for future data retrieval.

You can do this by calling the register endpoint of your newly deployed API. This can be easily done in Postman, or anywhere of your choosing.
![postman](https://i.imgur.com/qH4m1vJ.png)

Once the user has been created and you have your API token, you will need to do some work in the MySQL database to allocate any scripts to this user. 

Start off by adding your own scripts / service to the ```scripts``` table. e.g.

![scripts](https://i.imgur.com/MufD3Qd.png)

Once your scripts have been created, you can give your user access by adding the userID to scriptID mapping in the ```userscripts``` table.
If i want to allocate these 9 scripts to the user we just created 'Tom', I would goto the ```users``` table and get the ID for the user first, then insert it into userscripts like so.

Given that Tom is the first user I have created, the ID is '1'.

![userscripts](https://i.imgur.com/HpMku3F.png)

Tom now has access to submit data for these 9 scripts

## Submitting data
Currently there is 4 endpoints which you can use to submit data for users of your script or service, these are:
* items
* experience
* runtime
* log

In order to submit data, you will need to include the API token you were provided when you created your user as the bearer token in any post request you make.
The OSTracker client will handle this for you, but you can do this in Postman under the Authorization tab, and selecting 'Bearer Token' as the type.

Here are some example requests for each of these endpoints. You can also import this collection into postman using the following link: https://www.getpostman.com/collections/e85ebdc84ea9ae380546


### Items
![items](https://i.imgur.com/BJrbTMt.png)

Note: The JSON format seperating each item received, lost, or spent.

### Experience
![experience](https://i.imgur.com/eKaJBxQ.png)

### Runtime
![runtime](https://i.imgur.com/sqp9Gyl.png)

### Log
![log](https://i.imgur.com/6yjn1uD.png)

## Retrieving Data

### getDataByUser

Currently there is a single endpoint that allows you to fetch the totals of all data for a certain user.

![dataByUser](https://i.imgur.com/1zv0dQe.png)


