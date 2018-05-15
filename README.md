# EngineersWithoutBordersUCSC
Technical Team Code

HOW IT WORKS:

1. Arduino periodically gets a single sensor's data
2. All the sensor's data is concatenated to a single string and seperated by SEMICOLONS. This, as well as current time, and SensorID is passed to the Fona 808 
3. The which sends a GET request to our the backend website hosted at UCSC. 
4. The main.php script takes the SensorID and sends it to the correct sensor config file to parse the $data. 
5. An array comprised of [Columns[], Values[]] is returned by the correct config file, and is sent to UpdateDatabase.php along with table name
6. UpdateDatabase.php adds all Values[] to appropriate Columns[] in $table.

GETTING STARTED:

1. Download phpstorm
2. Hit ctrl+alt+s and go to 'Version Control' tab
3. Press github and click the 'Create API Token'. Enter email and password (Assuming you have github)
4. Go back to main screen
4a. Create new php project. Name it whatever you want.
5. On toolbar, click VCS > Enable Version Control Integration and select Git on the popup
6. Click VCS again > Git > Remotes. Press the + button and paste https://github.com/PhilipCanete/EngineersWithoutBordersUCSC.git
7. Click VCS again > Git > Pull. Git Root should be set to your project folder name you set in step 4, remote should be set as well. Click the checkbox next to origin/master and click pull
8. To simulate test, open TestWebsite.html and press any of the browser icons floating when your cursor goes to the top right of the screen

HOW TO ADD MORE SENSORS:


0. If the same exact sensor config file already exists, just add another case to the main.php file. Reference the same function, but use a different $table
1.Use _SensorName.php naming convention and create new sensor file in Sensor Configs folder
2a. If sensor only returns one piece of data, copy/paste the singleData.example file 
2b. If sensor returns multiple pieces of data, copy/paste multiData.example file 
3. Add new table on phpmyadmin under arboretum_data. Required columns are Time Recieved and Time Sent, then add another column(s) for the new sensor data. 3a. Set all data types to TEXT 
4. Change ShortSensorID function name to the new sensor name. This is on line 3 of the example files
5. Chance the value in the quotes of the $column variable. This should be on line 7. 5a. If following multiData example, add as many values as necessary, seperated by commas. 
6. If following multiData example, replace the number on line 13 with the number of values the sensor returns, minus one. Sensor returns 3 values > replace with 2 
7. Go to main.php and add include '_sensorName.php'; to the top of the file.
8 Uncomment the example case and be sure it is above the default case. Change "TABLE" to the table name you defined in phpadmin in step 3. Include single quotes.
9. Download .PrivateParts.ini from Team Drive > Technical team > Sensor node and place in same folder as Main.php and updateDatabase.php.
10. Update Sensor Decoder spreadsheet in same folder with new SensorID you added.
