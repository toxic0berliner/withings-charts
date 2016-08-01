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
* copy the `config-sample.php` to a file named `config.php`
* edit this newly created `config.php` file and fill in the proper values. 
* load your non-withings data into the `resources/data.json` file (you can look at the `resources/data-example.json` file to get an idea of the format)

You're all set !  Browse to the page on your server and enjoy !



### Todo

* Cleanup html/js/php

### Note
This is only a quick and dirty hack, I'm mostly tring out my githib account...

### Credits
[A big thanks to all the contributors](https://github.com/toxic0berliner/withings-charts/graphs/contributors)
