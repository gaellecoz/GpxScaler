# GpxScaler
Extend GPX timestamps to match a particular duration
# Usage
1. Edit the script _GpxScaler.php_, set the following parameters to the correct value:
  * __$start__ = The start time in EPOCH format
  * __$stopSource__ = The source stop time in EPOCH format
  * __$stopTarget__ = The target stop time in EPOCH format
  * __$fileName__ = The file name of the GPX file
1. Run 
```php
php GpxScaler.php > NewGpxFile.gpx
```
