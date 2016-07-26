AmCharts graphs using Withings Body Metric Service API
============

### What is this ?
This is more an example on how to use the php-withings api written by Zn4rK than anything.
But it also could be an example on how to use amcharts.

I use it myself to have a better graph of my weight data than those provided by withings.

This assumes that you have been tracking your weight prior to acquirering your withings scale, and are able to provide this data in json format.
This will then allow you to ignore withings-data priori to your acquisition of you scale (even if you imported some data into your withings account using their badly-designed import tool) and replace them with the data you provide as json.

### How to use it ?
You'll need your own webserver and php interpreter for this.
* somewhere in your web root, clone the repository using `git clone https://github.com/toxic0berliner/withings-charts.git`
* load your non-withings data into the static data-google.json
* edit the index.php file to fill in the following details : 
* about line 43 : your withing api authentication codes: identifier and secret (get them from https://healthmate.withings.com/partners)
* about line 43 : your callback url (change the domain and leave the 'callback.php' at the end.
* about line 12 : $userIdjson is the withings userId of the person for which you will be including the static json data (get it from withings api)
* about line 13: $jsonStartDate is wrongly named and is actually the last date of your non-withigs-data contained in json. All data coming from withings prior to this date will be ignored for the user specified above.

You're all set !  Browse to the page on your server and enjoy !



### Todo

* Cleanup html/js/php
* nicer ui

### Note
This is only a quick and dirty hack, I'm mostly tring out my githib account...

### Credits
[A big thanks to all the contributors](https://github.com/toxic0berliner/withings-charts/graphs/contributors)
