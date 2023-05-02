#!/bin/bash
/opt/anaconda/bin/ogr2ogr -f "GeoJSON" /var/www/html/invspec/geo_userdata.geojson /var/www/html/invspec/geo_datacsv.vrt
